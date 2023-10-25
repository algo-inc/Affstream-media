<?php
/* Template Name: blog */
get_header();
$currentTag      = $_GET['tag'] ?? '';
$currentCategory = $_GET['category'] ?? '';
?>
    <section class="archive-blog">
        <div class="intro-blog">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <div class="description"><?php the_excerpt(); ?> </div>
                <div class="category">
                    <div class="category-buttons">
                        <a class="category-button <?= $currentCategory === 'all' ? 'active' : '' ?>"
                           href="/blog/?category=all&tag=<?php $currentTag ?>"
                           data-category-id="all">All </a>
						<?php
						$categories = get_categories();
						if ( ! empty( $categories ) ) {
							foreach ( $categories as $category ) {
								$activeClass = $currentCategory == $category->term_id ? 'active' : '';
								echo '<a  href="/blog/?category=' . $category->term_id . '&tag=' . $currentTag . '" class="category-button ' . $activeClass . '" data-category-id="' . $category->term_id . '">' . $category->name . '</a>';
							}
						}
						?>
                    </div>
                </div>
                <div class="search-container">
                    <h2 class="blue-title">new</h2>
                    <input type="text" id="search-input" placeholder="Search by category">
                </div>
                <section class="post-container">
					<?php
					$args = array(
						'post_type' => 'post',  // Тип запису
						'orderby'   => 'date',  // Сортування за датою
						'order'     => 'DESC',  // Порядок сортування (від нових до старих)
					);

					if ( $currentCategory !== 'all' && $currentCategory ) {
						$args['cat']            = $currentCategory;
						$args['posts_per_page'] = - 1;
					} elseif ( $currentCategory === 'all' ) {
						$args['posts_per_page'] = - 1;

					} else {
						$args['posts_per_page'] = 2;
					}

					if ( isset( $_GET['tag'] ) ) {
						$args['tag_id'] = $_GET['tag'];
					}

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
                            <div class="post-card">
                                <a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( $post->ID, 'blog-previews' ); ?>
                                    <div class="tags">
										<?php
										$tags = get_the_tags();
										if ( $tags ) {
											foreach ( $tags as $tag ) {
												echo '<a href="?tag=' . $tag->term_id . '&category=' . ( ! ! $currentCategory ? $currentCategory : 'all' ) . '" class="tag">' . $tag->name . '</a>';
											}
										}
										?>
                                    </div>
                                    <h3><?php the_title(); ?></h3>
									<?php the_excerpt(); ?>

                                </a>
                            </div>
							<?php
						}
						wp_reset_postdata();
					}
					?>
                </section>
				<?php if ( ! $currentCategory ) {
					$title         = get_field( 'popular_articles_title' );
					$sliderId      = get_field( 'popular_articles' );
					$template_args = array(
						'title' => $title,
						'items' => $sliderId,
					);
					get_template_part( 'template-parts/template', 'blog-slider', $template_args );

					$title         = get_field( '_interview_title' );
					$sliderId      = get_field( 'interview' );
					$template_args = array(
						'title' => $title,
						'items' => $sliderId,
					);
					get_template_part( 'template-parts/template', 'blog-slider', $template_args );


				} ?>
                <section class="video-section">
                    <h2 class="blue-title">VIDEO</h2>
                    <div class="container">
	                        <?php
	                        $videoID = 'youtube_video_id';
	                        $args = array(
		                        'videoID' => $videoID,
	                        );
	                        get_template_part('template-parts/video-slider', null, $args);
	                        ?>
                        <div class="banner">
                            <img src="<?php the_field('banner_image'); ?>" alt="">
                        </div>
                    </div>
                </section>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            </div>
        </div>
    </section>
<?php
get_footer();
