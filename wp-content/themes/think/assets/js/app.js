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
                    $('body').removeClass('stop');
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

        // Mobile Sizes ========================================================
        if (window.matchMedia("(orientation: portrait)").matches) {
            var navigationHeight = $('.navigation').outerHeight();
            var paneHeight = $('.pane').outerHeight();
            var heroHeight = $('.hero').outerHeight();
            $('.navigation').css('height', navigationHeight + 'px');
            $('.pane').css('height', paneHeight + 'px');
            $('.hero').css('height', heroHeight + 'px');
        }

    });

})(jQuery);
