<div class="post-card">
    <a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'medium' ); ?>
    </a>
    <div class="inner-content">
		<?php
		$terms = wp_get_post_terms( get_the_ID(), 'affstream_tags' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			echo '<div class="tags">';
			foreach ( $terms as $term ) {
				echo '<a class="tag" href="' . get_term_link( $term ) . '">' . esc_html( $term->name ) . '</a>'; // Вивести посилання на теги
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

