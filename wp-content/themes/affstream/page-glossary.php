<?php
/*
Template Name: Media Glossary
*/
?>
<?php
get_header('media');
$page_id = get_the_ID();
$title = get_the_title();
?>
<div class="glossary">
    <ul class="alphabet-list" style="background: black; color: white">
        <li><a href="#" data-letter="A">A</a></li>
        <li><a href="#" data-letter="B">B</a></li>
        <li><a href="#" data-letter="C">C</a></li>
    </ul>
    <div id="selected-letter" style="font-weight: bold;"></div>
    <div id="post-list">
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

<?php
get_footer('media');
?>
