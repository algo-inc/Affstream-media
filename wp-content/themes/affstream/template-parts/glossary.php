
<div class="glossary">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/styles/glossary.css'?>">
    <ul class="alphabet-list" style="background: black; color: white">
		<?php
		$args = array(
			'post_type' => 'glossary',
			'posts_per_page' => -1,
		);
		$query = new WP_Query($args);
		$unique_letters = array();
		if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post();
				$post_title = get_the_title();
				$first_letter = mb_strtoupper(mb_substr($post_title, 0, 1, 'UTF-8'));

				if (!in_array($first_letter, $unique_letters)) {
					$unique_letters[] = $first_letter;
				}
			endwhile;
			sort($unique_letters);
			foreach ($unique_letters as $letter) {
				echo '<li><a href="#" data-letter="' . $letter . '">' . $letter . '</a></li>';
			}
		endif;
		wp_reset_postdata();
		?>
    </ul>
    <div id="selected-letter" style="font-weight: bold;"></div>
    <div id="post-list">
	    <?php
	    $posts_per_page = 15;
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	    $args = array(
		    'post_type' => 'glossary',
		    'posts_per_page' => -1,
		    'paged' => $paged,
		    'orderby' => 'title',
		    'order' => 'ASC',
	    );
	    $posts_query = new WP_Query($args);
	    if ($posts_query->have_posts()) {
		    $current_letter = '';
		    while ($posts_query->have_posts()) {
			    $posts_query->the_post();
			    $post_title = get_the_title();
			    $first_letter = mb_strtoupper(mb_substr($post_title, 0, 1, 'UTF-8'));

			    if ($first_letter !== $current_letter) {
				    echo '<h2 class="letter-heading">'.  '#'  . $first_letter . '</h2>';
				    $current_letter = $first_letter;
			    }
			    ?>
                <div class="glossary-card">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
			    <?php
		    }
	    } else {
		    echo 'Публікації не знайдено.';
	    }
	    ?>
    </div>
</div>
	<script>
      jQuery(document).ready(function($) {
        $('.alphabet-list a').on('click', function(e) {
          e.preventDefault();
          var letter = $(this).data('letter');
          $('.alphabet-list a').removeClass('active');
          $(this).addClass('active');
          showPostsByLetter(letter);
        });

        function showPostsByLetter(letter) {
          $('#post-list').empty();
          $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
              action: 'filter_glossary',
              letter: letter,
              type: 'glossary'
            },
            success: function(response) {
              $('#post-list').html(response);
              $('#selected-letter').text('#' + letter);
            }
          });
        }
      });


	</script>
