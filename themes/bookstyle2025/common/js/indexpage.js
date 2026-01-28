// ▼フィルタリング・ソート
jQuery(function(){
 jQuery('#Container').mixItUp({
	animation: {
		duration: 400,
		effects: 'fade scale(0.01) stagger(30ms)',
		easing: 'cubic-bezier(0.175, 0.885, 0.32, 1.275)'
	}
});
});

// ▼ツールチップ
jQuery(function() {
  jQuery('.fukidashi').powerTip({ placement: 'se-alt' });
});

// ▼ヘッダー固定
jQuery(function(){
    var box = jQuery(".coverbtn__group");
    var boxTop = box.offset().top;
    jQuery(window).scroll(function(){
        if(jQuery(window).scrollTop() >= boxTop){
            box.addClass("fixed");
            jQuery("body").css("margin-top","40px");
        }else{
            box.removeClass("fixed");
            jQuery("body").css("margin-top","0px");
        }
    });
});
