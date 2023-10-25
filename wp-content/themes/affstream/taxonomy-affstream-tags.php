<?php
get_header('media');
?>
<div class="posts-section">
    <div class="title-container">
        <h2>Affstream media</h2>
    </div>
    <div class="tag-name-container">
        <h3 class="tag-name"><?php single_term_title(); ?></h3>
    </div>
    <div class="container">
		<?php
		$current_term = get_queried_object();
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$args = array(
			'post_type'      => 'any',
			'posts_per_page' => 15,
			'tax_query'      => array(
				array(
					'taxonomy' => 'affstream-tags',
					'field'    => 'id',
					'terms'    => $current_term->term_id,
				),
			),
			'paged'          => $paged, // Set the current page
		);

		$query = new WP_Query($args);

		if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post();
				get_template_part('template-parts/media-card');
			endwhile;
			wp_reset_postdata();
		else :
			echo 'Постів не знайдено.';
		endif;
		?>
    </div>
	<?php
	if ( $query->max_num_pages > 1 ) {
		echo '<div class="pagination">';
		echo paginate_links( array(
			'total'   => $query->max_num_pages,
			'current' => $paged,
			'prev_text' => '&laquo',
			'next_text' => '&raquo',
		) );
		echo '</div>';
	}
	?>
</div>
<?php
get_footer('media');
?>
