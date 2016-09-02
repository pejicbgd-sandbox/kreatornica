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
    });

    $('#about-us-lang').on('change', function() {
        $.ajax({
            method: 'GET',
            url: endPoint,
            data: 'action=getAboutUsData&lang=' + $(this).val()
        }).done(function(res) {
            var $form = $('#about-form'),
                response = JSON.parse(res);

            $form.find('#title').val(response.title);
            $form.find('#subtitle').val(response.subtitle);
            $form.find('#about-text').val(response.text);
        });
    });
})(jQuery);