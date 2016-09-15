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
            data: 'action=getAboutUsData&lang=' + $(this).val(),
            success: function(res) {
                var $form = $('#about-form'),
                    response = JSON.parse(res);

                $form.find('#title').val(response.title);
                $form.find('#subtitle').val(response.subtitle);
                $form.find('#about-text').val(response.text);
            }
        });
    });

    $('.member-update').on('click', function() {
        var $this = $(this),
            memberId = $this.data('member'),
            $modal = $('#member-update'),
            lang = $this.data('lang');

        function getMemberInfo(memberId, lang, initial)
        {
            $.ajax({
                method: "GET",
                url: endPoint,
                data: "action=getMemberInfo&mid=" + memberId + "&lang=" + lang,
                success: function(res) {
                    var response = JSON.parse(res),
                        bio = '';

                    if(response.length > 0)
                    {
                        bio = response[0].text;
                    }

                    $modal.find('#member-bio').html(bio);
                    if(initial)
                    {
                        $modal.find('#bio-language').val(lang);
                        $modal.find('#member-name').val(response[0].name);
                        $modal.find('#member-email').val(response[0].email);
                        $modal.find('#member-phone').val(response[0].telefon);
                    }
                }
            });
        }

        $modal.find('#member-id').val(memberId);
        getMemberInfo(memberId, lang, true);

        $modal.find('#bio-language').on('change', function() {
            getMemberInfo(memberId, $(this).val());
        })
    });

    $('#update-member-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: endPoint,
            processData:false,
            contentType: false,
            data: new FormData(this),
            success: function(res) {
                if(res == 'inserted' || res == 'updated')
                {
                    window.location.reload();
                }
            }
        });
    });

    $('.member-delete').on('click', function(e) {
        var $this = $(this),
            memberId = $this.data('member');

        $('#member-delete').find('#member-id').val(memberId);
    });

    $('#delete-member').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: endPoint,
            data: $('#delete-member-form').serialize(),
            success: function(res) {
                if(res == 'deleted')
                {
                    window.location.reload();
                }
            }
        });
    });

    $('#project, #language').on('change', function() {
        var $projectForm = $('#project-form');
        $projectForm.find('input[name=action]').val('getProjectInfo');
        $projectForm.find('input[name=project_name]').hide();

        $.ajax({
            method: "POST",
            url: endPoint,
            data: new FormData($projectForm[0]),
            contentType: false,
            processData: false,
            success: function(res) {
                var response;

                if(typeof res != undefined)
                {
                    response = JSON.parse(res);
                    $projectForm.find('#project-title').val(response[0].title);
                    $projectForm.find('#project-text').val(response[0].text);
                    $projectForm.find('#project-content').val(response[0].content);
                }
            }
        });
    });

    $('#project-form').on('submit', function(e) {
        var $this = $(this);

        e.preventDefault();

        if($this.find('input[name=action]') !== 'saveNewProject')
        {
            $this.find('input[name=action]').val('saveProjectInfo');
        }

        $.ajax({
            method: "POST",
            url: endPoint,
            data: new FormData($this[0]),
            contentType: false,
            processData: false,
            success: function(res) {
                $this.find('input[name=project_name]').hide(600);
                $this.find('input[name=action]').val('saveProjectInfo');
            }
        });
    });

    $('#save-gallery').on('click', function(e) {
        var _galleryForm = $('#gallery-form');
        e.preventDefault();

        if(_galleryForm.find('#gallery').val() != 0)
        {
            _galleryForm.find('.loader').show();
            _galleryForm.find('input[name=action]').val('setGalleryInfo');

            $.ajax({
                method: "POST",
                url: endPoint,
                processData: false,
                contentType: false,
                data: new FormData(_galleryForm[0]),
                success: function(res) {
                    _galleryForm.find('.loader').hide();
                }
            });
        }
    });

    $('#gallery-language,#gallery').on('change', function(e) {
        var _loader = $('.loader'),
            _form = $('#gallery-form');

        e.preventDefault();
        _form.find('input[name=action]').val('getSingleGalleryData');
        if(_form.find('#gallery').val() != 0)
        {
            _loader.show();
            $.ajax({
                method: 'GET',
                url: endPoint,
                data: $('#gallery-form').serialize(),
                success: function(res) {
                    var response;

                    _loader.hide();
                    if(typeof res != undefined)
                    {
                        response = JSON.parse(res);
                    }

                    _form.find('#gallery-title').val(response[0].title);
                    _form.find('#gallery-text').val(response[0].text);
                    _form.find('#gallery-content').val(response[0].content);
                    _form.find('#gallery-image').val('');
                    _form.find('#gallery-images').val('');
                }
            });
        }
    });

})(jQuery);
