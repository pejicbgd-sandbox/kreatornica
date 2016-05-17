(function ($) {
    $('a.page-scroll').on('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    $(".fancybox").fancybox({
       helpers: {
            overlay: {
                css: {
                    'background': 'rgba(33, 40, 38, 0.7)'
                }
            }
        }
    });

    $('#btnOpen').click(function (e) {
        e.preventDefault();
        $('.fancybox-thumb:eq(0)').click();
    });

})(jQuery);

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar'
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
});

