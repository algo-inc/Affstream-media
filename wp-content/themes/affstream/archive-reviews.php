<?php
/*
Template Name: Media Reviews
*/
?>
<?php
get_header('media');
?>
<div class="posts-section reviews"  >
	<div class="title-container">
		<h2 class="section-title"> <?php the_title() ?></h2>
		<?php the_excerpt(); ?>
	</div>
    <div class="category-navigation">
		<?php
		$categories = get_terms(array(
			'taxonomy' => 'reviews-categories',
			'hide_empty' => false
		));
		if ($categories) {
			foreach ($categories as $category) {
				$category_link = get_term_link($category);
				echo '<a href="' . esc_url($category_link) . '" class="category-link" data-category-id="' . $category->term_id . '" data-category-slug="' . $category->slug . '">' . $category->name . '</a>';
			}
		}
		?>
    </div>
	<div class="reviews-container">
		<?php
            the_content();
		?>
	</div>
<!--	--><?php
//	if ( $posts_query->max_num_pages > 1 ) {
//		echo '<div class="pagination">';
//		echo paginate_links( array(
//			'total'   => $posts_query->max_num_pages,
//			'current' => $paged,
//			'prev_text' => '&laquo',
//			'next_text' => '&raquo',
//		) );
//		echo '</div>';
//	}
//	?>
</div>
<?php
get_footer('media');
?>

