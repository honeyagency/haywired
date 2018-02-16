jQuery(document).ready(function($) {
    var myLazyLoad = new LazyLoad({
        // example of options object -> see options section
        threshold: 500,
        throttle: 30,
        show_while_loading: false,
    });

    function scroll() {}
    $trig = $('.menu--trigger');
    $trig.on('click touchstart', function(event) {
        event.preventDefault();
        $('body').toggleClass('navopen');
    });
    $search = $('.trigger--search');
    $search.on('click touchstart', function(event) {
        event.preventDefault();
   

        function openSearch(scrollPosition) {
                 var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
        ];
            $('body').addClass('letssearch');
            $('.search-field').focus();
            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }

        function closeSearch(scrollPosition) {
                 var scrollPosition = [
            self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
            self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
        ];
            $('body').removeClass('letssearch');
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        }
        if ($('body').hasClass('letssearch')) {
            closeSearch();
        } else {
            openSearch();
        }
        $(document).keydown(function(event) {
            if (event.keyCode == 27) {
                closeSearch();
            }
        });
    });
    if ($('.partner-slider').length > 0) {
        $('.partner-slider').flickity({
            // options
            cellAlign: 'left',
            // contain: true,
            prevNextButtons: true,
            pageDots: false
        });
    }
    if (window.matchMedia('(max-width: 767px)').matches) {
        var mob = true;
    } else {
        var mob = false;
    }
    if (mob == true) {
        $('.trigger--children').on('click touchstart', function(event) {
            event.preventDefault();
            $parent = $(this).parent();
            $child = $parent.find('.section--child-nav');
            $openChild = $('.section--child-nav.open');
            if ($parent.hasClass('children--visible')) {
                $parent.removeClass('children--visible');
                $child.removeClass('open');
            } else {
                $('.children--visible').removeClass('children--visible');
                $openChild.removeClass('open');
                $parent.addClass('children--visible');
                $child.addClass('open');
            }
        });
    }
});