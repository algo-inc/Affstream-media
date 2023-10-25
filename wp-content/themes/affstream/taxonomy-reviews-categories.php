<?php
get_header( 'media' );
?>

<div class="posts-section reviews" ">
    <div class="title-container">
        <h1 class="">Affstream reviews</h1>
    </div>

    <div class="category-navigation">
		<?php
		$categories = get_terms( array(
			'taxonomy'   => 'reviews-categories',
			'hide_empty' => false
		) );

		$current_slug = '';
		$current_category = get_queried_object();

		if ( $current_category && ! is_wp_error( $current_category ) ) {
			$current_slug = $current_category->slug;
		}

		if ( $categories ) {
			foreach ( $categories as $category ) {
				$class = ( $category->slug === $current_slug ) ? 'category-link active' : 'category-link';
				echo '<a href="' . esc_url( get_term_link( $category ) ) . '" class="' . esc_attr( $class ) . '" data-category-slug="' . $category->slug . '">' . $category->name . '</a>';
			}
		}
		?>
    </div>
    <div class="container">
		<?php
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
			'post_type'      => 'reviews',
			'posts_per_page' => 15,
			'paged'          => $paged,
		);

		if ( ! empty( $current_slug ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'reviews-categories',
					'field'    => 'slug',
					'terms'    => $current_slug,
				),
			);
		}
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post(); ?>
                <div class="post-card">
                    <a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'medium' ); ?>
                    </a>
                    <div class="inner-content">
						<?php
						custom_display_tags(get_the_ID());
						?>
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <div class="post-description">
							<?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>

			<?php
			endwhile;
			wp_reset_postdata();
		else :
			echo 'Немає записів для відображення.';
		endif;
		?>

    </div>
	<?php
	if ( $query->max_num_pages > 1 ) {
		echo '<div class="pagination">';
		echo paginate_links( array(
			'total'   => $query->max_num_pages,
			'current' => $paged,
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
		) );
		echo '</div>';
	}
	?>
</div>

<?php
get_footer( 'media' );
?>
