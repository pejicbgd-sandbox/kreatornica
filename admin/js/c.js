(function($) {
    "use strict";
    var endPoint = 'http://localhost/kreatornica/admin/requests.php';

    $('#save-about-us').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: endPoint,
            data: $('#about-form').serialize()
        }).done(function(res) {

        });
    })
})(jQuery);