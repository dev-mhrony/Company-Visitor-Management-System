(function($) {
  'use strict';
  $(function() {
    $('.file-upload-browse').on('click', function() {
      var file = $(this).parent().parent().parent().find('.file-upload-default');
      file.trigger('click');
    });
    $('.file-upload-default').on('change', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });
})(jQuery);


// * Author Name: MH RONY.
// * GigHub Link: https://github.com/dev-mhrony
// * Facebook Link:https://www.facebook.com/dev.mhrony
// * Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
// for any PHP, Laravel, Python, Dart, Flutter work contact me at developer.mhrony@gmail.com
// * Visit My Website : developerrony.com