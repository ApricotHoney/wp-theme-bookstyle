jQuery(document).ready(function($) {
    // Open Modal
    $('.lightbox').on('click', function(e) {
        e.preventDefault();
        var $btn = $(this);
        var imgUrl = $btn.attr('href');
        var $article = $btn.closest('article');
        var title = $article.find('.cover-title').text();
        var date = $article.find('.cover-date').text();
        
        // Populate Modal
        $('#modal-img').attr('src', imgUrl);
        $('#modal-title').text('No.' + title); // Assumption from design "No.xxx"
        // $('#modal-date').text(date); // If needed
        
        // Show Modal
        $('#book-modal').fadeIn();
        $('body').css('overflow', 'hidden'); // Prevent background scroll
    });
    
    // Close Modal
    $('.modal-close, .modal-overlay').on('click', function() {
        $('#book-modal').fadeOut();
        $('body').css('overflow', '');
    });
});
