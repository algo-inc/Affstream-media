<div class="post-card">
	<?php $slide_id = get_the_ID();
	?>
	<a href="<?= get_permalink( $slide_id ) ?>">
		<?=
		get_the_post_thumbnail( $slide_id, '' );
		?>
	</a>
	<div class="inner-content">
		<?php
		custom_display_tags($slide_id, 3);
		?>
		<a href="<?= get_permalink( $slide_id ) ?>">
			<?php
			$post_title = get_the_title();
			$trimTitle = media_trim_title($post_title, 60);
			?>
			<h3><?= $trimTitle ?></h3>
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
