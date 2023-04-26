(function ($) {
  'use strict';
  var $this = $(".todo-list .todo-item");
  $(".todo-list .todo-item:not(.edit-mode)").append('<div class="edit-icon"><i class="mdi mdi-pencil"></i></div>');

  $(".edit-icon").on("click", function () {
    $(this).parent().addClass("edit-mode");
    $(".todo-list .todo-item button[type='reset']").on("click", function () {
      $(this).closest(".todo-item").addClass("edit-mode");
    });
  });

})(jQuery);


// * Author Name: MH RONY.
// * GigHub Link: https://github.com/dev-mhrony
// * Facebook Link:https://www.facebook.com/dev.mhrony
// * Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
// for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
// * Visit My Website : developerrony.com