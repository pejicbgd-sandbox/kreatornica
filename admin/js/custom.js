(function($) {

    function encodeEntities(value) {
        return $('<div/>').text(value).html();
    }

    function clearForm() {
        var $modal = $('#member-update');
        $modal.find('form').trigger('reset');
        delete(member_data.member_id);
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
            $('#about-text').val(encodeEntities(response['aboutUs']));
        });
    });

    $('#save-about-us').on('click', function(e) {
        e.preventDefault();
        var $holder = $('#about-form'),
            info = {
                action: 'saveAboutUs',
                title: $holder.find('#title').val(),
                subtitle: $holder.find('#subtitle').val(),
                text: $('#about-text').val(),
                lang: $holder.find('#language-chooser').val()
        };

        $.ajax({
            method: "POST",
            url: 'helper.php',
            dataType: "JSON",
            data: info
        }).done(function(response) {

        });
    });

    var member_data = {};
    $('.member-update').on('click', function() {
        member_data.member_id = $(this).data('member');
    });

    $('#member-update').on('show.bs.modal', function() {
        var $wrapper = $('.modal-content');
        var data = {action: 'getMemberInfo', member_id: member_data.member_id};
        $.ajax({
            method: "POST",
            url: 'helper.php',
            dataType: "JSON",
            data: data
        }).done(function(response) {
            var name = encodeEntities(response.member_name);
            var text_sr = encodeEntities(response.text_sr);
            var text_sk = encodeEntities(response.text_sk);
            var text_en = encodeEntities(response.text_en);
            var email = response.email;
            var phone = response.telefon;

            $wrapper.find('#exampleInputFullName').val(name);
            $wrapper.find('#exampleInputEmail').val(email);
            $wrapper.find('#exampleInputPhone').val(phone);
            $wrapper.find('textarea').val(text_sr);
            $wrapper.find('input[name="member_id"]').val(member_data.member_id);

            member_data.text_sr = text_sr;
            member_data.text_sk = text_sk;
            member_data.text_en = text_en;
        });
    }).on('hidden.bs.modal', function() {
        clearForm();
    });

    $('#bio-language').on('change', function() {
        var lang = 'text_' + $(this).val();
        $('.modal-content').find('textarea').val(member_data[lang]);
    });

    $('#update-member-form').on('submit', function (e) {
        e.preventDefault();
        $modal = $('#member-update');
        $modal.find('.loader').removeClass('hidden');
        var data = new FormData(this);

        $.ajax({
            method: "POST",
            url: 'helper.php',
            dataType: "JSON",
            contentType: false,
            processData:false,
            data: data
        }).done(function(response) {
            $modal.find('.loader').addClass('hidden');
            $modal.modal('toggle');
            window.location.reload();
        });
    });

    $('#add-member').on('click', function() {
        $('#member-update').modal('show');
    });

    $('.member-delete').on('click', function() {
        member_data.member_id = $(this).data('member');
    });

    $('#delete-member').on('click', function(e) {
        e.preventDefault();
        var $modal = $('#member-delete');
        var data = {action: 'deleteMember', member_id: member_data.member_id};

        $.ajax({
            method: "POST",
            url: 'helper.php',
            dataType: "JSON",
            data: data
        }).done(function(response) {
            $modal.modal('toggle');
            window.location.reload();
        });

    });

    $('#project-title, #project-text, #project-content').on('keyup', function() {
        $('#project-form').find('input[name=action]').val('saveProjectInfo');
    });

    $('#exampleInputFile3').on('change', function() {
        $('#project-form').find('input[name=action]').val('saveProjectInfo');
    });
    
})(jQuery);