(function($) {

    function encodeEntities(value) {
        return $('<div/>').text(value).html();
    }

    $('#language-chooser').on('change', function () {
        var lang = $(this).val();
        $.ajax({
            method: "GET",
            url: 'helper.php',
            dataType: "JSON",
            data: 'action=getAboutUsData&lang=' + lang
        }).done(function(response) {
            var $holder = $('#about-form');
            $holder.find('#title').val(encodeEntities(response['aboutUsTitle']));
            $holder.find('#subtitle').val(encodeEntities(response['aboutUsSubtitle']));
            $('#about-text').text(encodeEntities(response['aboutUs']));
        });
    });

    $('#save-about-us').on('click', function(e) {
        e.preventDefault();
        var $holder = $('#about-form'),
            info = {
                action: 'saveAboutUs',
                title: $holder.find('#title').val(),
                subtitle: $holder.find('#subtitle').val(),
                text: $('#about-text').html(),
                lang: $holder.find('#language-chooser').val()
        };

        $.ajax({
            method: "POST",
            url: 'helper.php',
            dataType: "JSON",
            data: info
        }).done(function(response) {
            alert(response);
        });
    });
})(jQuery);