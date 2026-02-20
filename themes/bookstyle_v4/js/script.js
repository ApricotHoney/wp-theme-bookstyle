jQuery(document).ready(function ($) {
    // Open Modal
    $('.lightbox').on('click', function (e) {
        e.preventDefault();
        var $btn = $(this);
        var imgUrl = $btn.attr('href');
        var $article = $btn.closest('article');
        var title = $article.find('.cover-title').text();
        var date = $article.find('.cover-date').text();
        var tags = $article.find('.cover-tags').text();

        // Populate Modal
        $('#modal-img').attr('src', imgUrl);
        $('#modal-title').text('No.' + title); // Assumption from design "No.xxx"
        // $('#modal-date').text(date); // If needed
        $('.modal-tags').text(tags);

        // Check if this is a gallery item
        if ($btn.closest('.gallery').length > 0) {
            $('#book-modal').addClass('is-gallery-modal');
        } else {
            $('#book-modal').removeClass('is-gallery-modal');
        }

        // Show Modal
        $('#book-modal').fadeIn();
        $('body').css('overflow', 'hidden'); // Prevent background scroll
    });

    // Close Modal
    $('.modal-close, .modal-overlay').on('click', function () {
        $('#book-modal').fadeOut();
        $('body').css('overflow', '');
    });

    // Cat Image Scroll Behavior
    var $catImage = $('.footer .cat-image');
    var $footer = $('.footer');
    var scrollThreshold = $(window).height() * 0.5; // screens down

    $(window).on('scroll', function () {
        var scrollTop = $(window).scrollTop();
        var footerTop = $footer.offset().top;
        var windowHeight = $(window).height();
        var scrollBottom = scrollTop + windowHeight;

        // Show/Hide based on scroll depth
        if (scrollTop > scrollThreshold) {
            // If near footer (docking)
            // 70px is the negative top margin of docked image. 
            // We dock when scrollBottom > footerTop - 70 (approx)
            // Actually, simplified: if footer is in view, we dock.

            // Check if footer is visible in viewport
            if (scrollBottom > footerTop) {
                $catImage.addClass('is-docked').removeClass('is-floating');
                // Reset leaving state if user scrolled back down
                if (!$catImage.hasClass('is-leaving-animation')) {
                    $catImage.removeClass('is-leaving');
                }
            } else {
                $catImage.addClass('is-floating').removeClass('is-docked');
                // Reset leaving state if user scrolled back up/down away from footer
                if (!$catImage.hasClass('is-leaving-animation')) {
                    $catImage.removeClass('is-leaving');
                }
            }
        } else {
            // Hide if near top
            // Keep is-floating to ensure smooth transition (fixed -> hidden fixed)
            $catImage.addClass('is-leaving is-floating').removeClass('is-docked');
        }
    });

    // Cat Image Click Behavior
    $catImage.on('click', function () {
        // Mark as leaving to trigger slide out animation
        $(this).addClass('is-leaving is-leaving-animation');

        // Smooth scroll to top
        $('html, body').animate({ scrollTop: 0 }, 800, function () {
            // Animation complete
            $catImage.removeClass('is-leaving-animation');
        });
    });
});
