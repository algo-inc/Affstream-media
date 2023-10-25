<div class="post-card">
    <a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'media-card' ); ?>
    </a>
    <div class="inner-content">
		<?php
		custom_display_tags(get_the_ID());
		?>
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <div class="post-description">
            <p>
		        <?php
		        $text = get_the_excerpt();
		        $except = custom_trim_excerpt ($text, 100, '...'  );
		        echo $except;
		        ?>
            </p>
        </div>
    </div>
</div>
