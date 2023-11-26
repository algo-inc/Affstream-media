//
// // Оновлений JavaScript-код
// function getPostsByCategory(categoryId) {
//   var data = {
//     'action': 'get_posts_by_category',
//     'category_id': categoryId
//   };
//
//   jQuery.post(myAjax.ajaxurl, data, function(response) {
//     jQuery('.post-container').html(response);
//   });
// }
//
// jQuery('.category-button').click(function() {
//   var categoryId = jQuery(this).data('category-id');
//   getPostsByCategory(categoryId);
// });