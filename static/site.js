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

                bgLazyLoad: 5,
                cellAlign: 'left',
                // contain: true,
                prevNextButtons: true,
                pageDots: false
            });
        }
});