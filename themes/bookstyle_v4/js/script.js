jQuery(document).ready(function ($) {
    var modalSwiper = null;

    // Open Modal
    $('.lightbox').on('click', function (e) {
        e.preventDefault();
        var $btn = $(this);
        var imgUrl = $btn.attr('href'); // Fallback if no JSON
        var $article = $btn.closest('article');
        var title = $article.find('.cover-title').text();
        var date = $article.find('.cover-date').text();
        var tags = $article.find('.cover-tags').text();
        var commercialUrl = $article.find('.cover-commercial-url').text().trim();
        var imagesData = $article.find('.cover-images-data').text().trim();

        // Parse images
        var images = [];
        if (imagesData) {
            try {
                images = JSON.parse(imagesData);
            } catch (e) { console.error("Could not parse image data"); }
        }
        if (images.length === 0) {
            images.push(imgUrl); // Fallback to single image
        }

        // Populate Modal Sliders
        var $wrapper = $('#modal-swiper-wrapper');
        $wrapper.empty();
        images.forEach(function (url) {
            var slide = '<div class="swiper-slide"><img src="' + url + '" alt="Book Cover"></div>';
            $wrapper.append(slide);
        });

        // Initialize Swiper
        if (modalSwiper !== null) {
            modalSwiper.destroy(true, true);
        }
        modalSwiper = new Swiper('.modal-image-container.swiper', {
            loop: images.length > 1,
            autoplay: images.length > 1 ? {
                delay: 3000,
                disableOnInteraction: false,
            } : false,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            // Disable navigation if only 1 image
            watchOverflow: true,
        });

        $('#modal-title').text('No.' + title); // Assumption from design "No.xxx"
        // $('#modal-date').text(date); // If needed
        $('.modal-tags').text(tags);

        // Update Personal Use button
        var personalUrl = 'https://bookstyle.xyz/cover_personal/BC_' + title + '.png';
        $('#modal-btn-personal').attr('href', personalUrl);
        $('#modal-btn-personal').attr('onclick', "ga('send', 'event', 'bc_count', 'downlode', 'BC_" + title + "');");

        // Update Commercial Use button
        if (commercialUrl) {
            $('#modal-btn-commercial').attr('href', commercialUrl).show();
            $('#modal-btn-commercial').attr('target', '_blank').attr('rel', 'noopener noreferrer');
        } else {
            $('#modal-btn-commercial').hide();
            $('#modal-btn-commercial').attr('href', '#'); // Reset
        }

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

    // ==========================================
    // Page Transition Animation
    // ==========================================
    // Trigger fade-in on load
    $(window).on('load', function () {
        $('body').addClass('is-loaded');
        $('#wrapper').addClass('page-transition');
        setTimeout(function(){ $('#wrapper').removeClass('page-transition'); }, 700);
    });
    // Fallback if load event already fired or takes too long
    setTimeout(function () {
        if (!$('body').hasClass('is-loaded')) {
            $('body').addClass('is-loaded');
            $('#wrapper').addClass('page-transition');
            setTimeout(function(){ $('#wrapper').removeClass('page-transition'); }, 700);
        }
    }, 500);

    // Trigger fade-out on internal links
    $('a').on('click', function (e) {
        var href = $(this).attr('href');
        var target = $(this).attr('target');

        // Skip links that are for lightbox, anchors, tel/mailto, or external/blank target
        if ($(this).hasClass('lightbox') ||
            !href ||
            href.indexOf('#') === 0 ||
            href.indexOf('tel:') === 0 ||
            href.indexOf('mailto:') === 0 ||
            target === '_blank') {
            return;
        }

        // Check if internal (simplistic check: starts with '/', '.' or domain)
        var isInternal = href.indexOf(window.location.hostname) > -1 || href.indexOf('/') === 0 || href.indexOf('.') === 0;

        if (isInternal) {
            e.preventDefault();

            // Un-animate
            $('body').removeClass('is-loaded');

            setTimeout(function () {
                window.location.href = href;
            }, 400); // slightly before CSS transition finishes
        }
    });

    // ==========================================
    // SP Hamburger Menu Toggle
    // ==========================================
    $('.hamburger').on('click', function () {
        $(this).toggleClass('is-active');
        $('.sp-menu-overlay').toggleClass('is-active');
        if ($(this).hasClass('is-active')) {
            $('body').css('overflow', 'hidden'); // Prevent background scrolling
        } else {
            $('body').css('overflow', '');
        }
    });

});
