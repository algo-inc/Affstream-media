<div class="post-card">
    <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">
		<?php the_post_thumbnail('medium'); ?>
    </a>
    <div class="inner-content">
		<?php
		$terms = wp_get_post_terms(get_the_ID(), 'affstream_tags');
		if ($terms && !is_wp_error($terms)) {
			echo '<div class="tags">';
			foreach ($terms as $term) {
				$tag_link = get_term_link($term);
				$tag_name = esc_html($term->name);
				echo '<a class="tag" href="' . $tag_link . '" aria-label="' . $tag_name . '">' . $tag_name . '</a>'; // Додати aria-label до посилань на теги
			}
			echo '</div>';
		}
		?>
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <div class="post-description">
			<?php the_excerpt(); ?>
        </div>
    </div>
</div>
