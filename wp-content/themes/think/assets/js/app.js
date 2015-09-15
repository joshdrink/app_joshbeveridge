// =============================================================================

    // APP JS
    // Property of Norex
    // Authored by Josh Beveridge

// =============================================================================

(function($) {

    $(document).ready(function() {

        // Fixed Width =========================================================
        var documentWidth = $(document).outerWidth();

        $('html').css('width', documentWidth);
        $('body').css('width', documentWidth);

        // BuggyFill Initialization ============================================
        window.viewportUnitsBuggyfill.init({
            hacks: window.viewportUnitsBuggyfill.hacks
        });

        // Smooth Scrolling ====================================================
        $('a[href*=#]:not([href=#])').on('click',function() {

           if(!$(this).parent().hasClass('accordion-navigation')) {

               if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {

                 var target = $(this.hash);

                 target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

                 if (target.length) {
                   $('html,body').animate({
                     scrollTop: target.offset().top - $('.search-cta').outerHeight()
                   }, 650);
                   return false;
                 }

               }

           }

         });

        // Data Link Handler ===================================================
        $('[data-link-handler]').on('click touchend',function(e){
            if($('[data-link-target="'+$(this).attr('data-link-handler')+'"]').hasClass('active')) {
                $('[data-link-target="'+$(this).attr('data-link-handler')+'"]').removeClass('active');
            }
            else {
                $('[data-link-target="'+$(this).attr('data-link-handler')+'"]').addClass('active');
            }
            e.preventDefault();
        });

        // Navigation Handler ==================================================
        $('.menu .close').on('click', function(e) {
            if($(this).hasClass('active')) {
                e.preventDefault();
            }
            else {
                location.href = 'http://joshbeveridge.com';
            }
        });

        $('.close-area').on('click', function(e) {
            $('.navigation-content').removeClass('active');
            $('.navigation').removeClass('active');
            $('.menu button').removeClass('active');
            if($('.why').hasClass('active')) {
                // Nothing
            }
            else {
                $('body').removeClass('stop');
            }
            e.preventDefault();
        });

        $('.menu button').on('click', function(e) {
            if($(this).hasClass('disable')){
                e.preventDefault();
            }
            else {
                if($(this).hasClass('close') || $(this).hasClass('active')) {
                    $('.navigation-content').removeClass('active');
                    $('.navigation').removeClass('active');
                    $('.menu button').removeClass('active');
                    $(this).removeClass('active');
                    if($('.why').hasClass('active')) {
                        // Nothing
                    }
                    else {
                        $('body').removeClass('stop');
                    }
                    e.preventDefault();
                }
                else {
                    if($('.navigation').hasClass('active')) {
                        $('.navigation-content').removeClass('active');
                        var buttonID = $(this).attr('id');
                        var buttonClass = '.' + buttonID;
                        $('.menu button').removeClass('active');
                        $('#navClose').addClass('active');
                        $(this).addClass('active');
                        $(buttonClass).addClass('active');
                        e.preventDefault();
                    }
                    else {
                        var buttonID = $(this).attr('id');
                        var buttonClass = '.' + buttonID;
                        $('.navigation').addClass('active');
                        $('#navClose').addClass('active');
                        $(this).addClass('active');
                        $(buttonClass).addClass('active');
                        $('body').addClass('stop');
                        e.preventDefault();
                    }
                }
                e.preventDefault();
            }
            e.preventDefault();
        });

        // Hero Animation ======================================================
        $('#recent').on('click', function(e) {
            $('.hero').addClass('active');
            $('article').addClass('active');
        });

        if($('section').hasClass('hero')) {
            $(window).scroll(function(e) {
                if($(window).scrollTop() > 0) {
                    $('.hero').addClass('active');
                    $('article').addClass('active');
                }
                if($(window).scrollTop() == 0) {
                    $('.hero').removeClass('active');
                    $('article').removeClass('active');
                }
            });
        }
        else {
            $('article').addClass('active');
        }

        // Why Handler =========================================================
        $('#why').on('click', function(e) {
            $('.hero >.wrapper').addClass('hidden');
            $('#recent').addClass('hidden');
            $('body').addClass('stop');
            $('.why').addClass('active');
        });

        $('#whyClose').on('click', function(e) {
            $('.hero >.wrapper').removeClass('hidden');
            $('#recent').removeClass('hidden');
            $('body').removeClass('stop');
            $('.why').removeClass('active');
        });

        // Why Content Handler =================================================
        $(".why-menu button:not('#whyClose')").on('click', function(e) {
            $('.why-menu dd').removeClass('active');
            $('.why-content p').removeClass('active');
            var buttonID = $(this).attr('id');
            var buttonClass = '.' + buttonID;
            $(buttonClass).addClass('active');
            $(this).parent().addClass('active');
        });

        // Mobile Sizes ========================================================
        if (window.matchMedia("(orientation: portrait)").matches) {
            var navigationHeight = $('.navigation').outerHeight();
            var paneHeight = $('.pane').outerHeight();
            var heroHeight = $('.hero').outerHeight();
            var whyHeight = $('.why').outerHeight();
            $('.navigation').css('height', navigationHeight + 'px');
            $('.pane').css('height', paneHeight + 'px');
            $('.hero').css('height', heroHeight + 'px');
            $('.why').css('height', whyHeight + 'px');
        }

    });

    $(window).load(function(){

        if (window.matchMedia("(orientation: landscape)").matches) {

            var maxWhyHeight = 0;

            $('.why-content p').each(function() {
                if($(this).outerHeight(true) > maxWhyHeight) {
                    maxWhyHeight = $(this).outerHeight(true);
                }
                console.log(maxWhyHeight);
                $('.why-content').css('height', maxWhyHeight + 'px');
            });

        }

    });

})(jQuery);
