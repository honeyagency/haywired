jQuery(document).ready(function($) {
    var myLazyLoad = new LazyLoad({
        // example of options object -> see options section
        threshold: 500,
        throttle: 30,
        show_while_loading: false,
    });
    $trig = $('.menu--trigger');
    $trig.on('click touchstart', function(event) {
        event.preventDefault();
        $('body').toggleClass('navopen');
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