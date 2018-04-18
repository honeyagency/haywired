jQuery(document).ready(function($) {
    $form = $('.trigger--form');
    $form.on('click touchstart', function(event) {
        event.preventDefault();
        $showForm = $(this).attr('data-target');

        function openForm(scrollPosition) {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            $('body').removeClass('tier--1');
            $('body').removeClass('tier--2');
            $('body').removeClass('tier--3');
            $('body').removeClass('tier--4');
            $('body').removeClass('media--form');
            $('body').addClass($showForm);
            var html = jQuery('html'); // it would make more sense to apply this to body, but IE7 won't have that
            html.data('scroll-position', scrollPosition);
            html.data('previous-overflow', html.css('overflow'));
            html.css('overflow', 'hidden');
            window.scrollTo(scrollPosition[0], scrollPosition[1]);
        }

        function closeForm(scrollPosition) {
            var scrollPosition = [
                self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
                self.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop
            ];
            $('body').removeClass('tier--1');
            $('body').removeClass('tier--2');
            $('body').removeClass('tier--3');
            $('body').removeClass('tier--4');
            $('body').removeClass('media--form');
            var html = jQuery('html');
            var scrollPosition = html.data('scroll-position');
            html.css('overflow', html.data('previous-overflow'));
            window.scrollTo(scrollPosition[0], scrollPosition[1])
        }
        if ($('body').hasClass($showForm)) {
            closeForm();
        } else {
            openForm();
        }
        $(document).keydown(function(event) {
            if (event.keyCode == 27) {
                closeForm();
            }
        });
        $('.trigger--close').on('click touchstart', function(event) {
            event.preventDefault();
            closeForm();
        });
    });
});