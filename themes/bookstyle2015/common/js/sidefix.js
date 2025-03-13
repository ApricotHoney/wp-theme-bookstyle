//▼サイドバー固定
jQuery(function(jQuery) {
  var tab = jQuery('.sidePr_inner'), offset = tab.offset();
  jQuery(window).scroll(function () {
    if(jQuery(window).scrollTop() > offset.top) {
      tab.addClass('fixed_side');
    } else {
      tab.removeClass('fixed_side');
    }
  });
});