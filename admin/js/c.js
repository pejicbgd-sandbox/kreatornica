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

    $('#member-table').on('click', '.member-update', function() {
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
        });
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
        $projectForm.find('#project-name-wrapper').find('input').val('').end().hide();

        $.ajax({
            method: "POST",
            url: endPoint,
            data: new FormData($projectForm[0]),
            contentType: false,
            processData: false,
            success: function(res) {
                var response;

                if(typeof res !== undefined)
                {
                    response = JSON.parse(res);
                    if(response.length)
                    {
                        $projectForm.find('#project-title').val(response[0].title);
                        $projectForm.find('#project-text').val(response[0].text);
                        $projectForm.find('#project-content').val(response[0].content);
                    }
                    else
                    {
                        $projectForm.find('#project-title').val('');
                        $projectForm.find('#project-text').val('');
                        $projectForm.find('#project-content').val('');
                    }
                }
            }
        });
    });

    $('#project-form').on('submit', function(e) {

        var _this = $(this),
            _action = _this.find('input[name=action]');

        e.preventDefault();
        _this.find('.loader').show();
        if(_action.val() !== 'saveNewProject')
        {
            _action.val('saveProjectInfo');
        }

        $.ajax({
            method: "POST",
            url: endPoint,
            data: new FormData(_this[0]),
            contentType: false,
            processData: false,
            success: function(res) {
                if(_action.val() == 'saveNewProject')
                {
                    window.location.reload();
                }

                _this.find('.loader').show();
                _this.find('#project-image').html('');
                _this.find('#project').trigger('change');
            }
        });
    });

    $('#save-gallery').on('click', function(e) {
        var _galleryForm = $('#gallery-form'),
            createNew = (_galleryForm.find('input[name=action]').val() == 'createNewGallery');

        e.preventDefault();

        if(_galleryForm.find('#gallery').val() !== 0 || createNew)
        {
            _galleryForm.find('.loader').show();

            if(!createNew)
            {
                _galleryForm.find('#gallery-name-wrapper').find('input').val('').end().hide();
                _galleryForm.find('input[name=action]').val('setGalleryInfo');
            }

            $.ajax({
                method: "POST",
                url: endPoint,
                processData: false,
                contentType: false,
                data: new FormData(_galleryForm[0]),
                success: function(res) {
                    if(createNew)
                    {
                        window.location.reload();
                    }
                    _galleryForm.find('.loader').hide();
                    _galleryForm.find('#images-holder').html('');
                    $('#gallery').trigger('change');
                }
            });
        }
    });

    $('#save-project').on('click', function(e) {
        var _form = $('#project-form'),
            _action = _form.find('input[name=action]'),
            createNew = (_action.val() == 'saveNewProject');

        e.preventDefault();

        if(_form.find('#project').val() !== 0 || createNew)
        {
            _form.find('.loader').show();

            if(!createNew)
            {
                _action.val('saveProjectInfo');
                _form.find('#project-name-wrapper').find('input').val('').end().hide();
                _form.find('input[name=action]').val('saveProjectInfo');
            }

            $.ajax({
                method: "POST",
                url: endPoint,
                processData: false,
                contentType: false,
                data: new FormData(_form[0]),
                success: function(res) {
                    if(createNew)
                    {
                        window.location.reload();
                    }
                    _form.find('.loader').hide();
                    _form.find('#project-image').html('');
                }
            });
        }
    });

    $('#gallery-language,#gallery').on('change', function(e) {
        var _loader = $('.loader'),
            _form = $('#gallery-form'),
            _galleryImagesHtml = '';

        e.preventDefault();
        _form.find('input[name=action]').val('getSingleGalleryData');
        if(_form.find('#gallery').val() !== 0)
        {
            _loader.show();
            $.ajax({
                method: 'GET',
                url: endPoint,
                data: $('#gallery-form').serialize(),
                success: function(res) {
                    var response,
                        imagesArrayLength,
                        responseObject;

                    _loader.hide();
                    if(typeof res !== undefined)
                    {
                        response = JSON.parse(res);
                    }

                    responseObject = response.db[0];
                    _form.find('#gallery-title').val(responseObject.title);
                    _form.find('#gallery-text').val(responseObject.text);
                    _form.find('#gallery-content').val(responseObject.content);
                    _form.find('#gallery-image').val('');
                    _form.find('#gallery-images').val('');
                    _form.find('#gallery-name-wrapper').find('input').val('').end().hide();

                    imagesArrayLength = response.imagesArray.length;
                    if( imagesArrayLength > 0)
                    {
                        for(var i = 0; i < imagesArrayLength; i++)
                        {
                            _galleryImagesHtml += '<img src="../assets/img/gallery/gallery_id_' + _form.find('#gallery').val() + '/' + response.imagesArray[i] + '" class="gallery-img" alt="" width="150" />';
                        }
                        _form.find('#images-holder').show().html(_galleryImagesHtml);
                    }
                    else
                    {
                        _form.find('#images-holder').html('');
                    }
                }
            });
        }
    });


    $('#new-gallery').on('click', function(e) {
        var _form = $('#gallery-form');

        e.preventDefault();
        _form[0].reset();
        _form.find('#gallery-name-wrapper').show();
        _form.find('input[name=action]').val('createNewGallery');
        _form.find('#images-holder').html('');
    });

    $('#add-project').on('click', function(e) {
        var _form = $('#project-form');
        e.preventDefault();

        _form[0].reset();
        _form.find('#project-name-wrapper').show();
        _form.find('input[name=action]').val('saveNewProject');
        _form.find('#images-holder').html('');
    });

    $('#images-holder').on('click', '.gallery-img', function() {
        var _this = $(this),
            ajaxData = {action: 'deleteGalleryImage'},
            _loader = $('.loader'),
            pathParts = _this.prop('src').split('/');

        _loader.show();
        ajaxData.path = pathParts.slice(-2);

        $.ajax({
            method: "POST",
            url: endPoint,
            data: ajaxData,
            success: function(res) {
                _loader.hide();
                if(res == 'deleted')
                {
                    _this.remove();
                }
            }
        });
    });

    if($.fancybox)
    {
        $('.fancybox').fancybox({
    		'hideOnContentClick': true
    	});
    }

    $('.portfolio-link').on('click', function() {
        var projectId = $(this).data('projectId'),
            lang = $(this).data('lang'),
            _modal = $('#projectModal1');

            $.ajax({
                method: "POST",
                url: endPoint,
                data: 'action=getProjectPopupInfo&pId=' + projectId + '&lang=' + lang,
                success: function(res) {
                    var response;

                    if(typeof res !== undefined)
                    {
                        response = JSON.parse(res);
                        _modal.find('#project-title').text(response[0].project_name);
                        _modal.find('.project-subtitle').text(response[0].title);
                        _modal.find('.project-content').text(response[0].content);
                    }
                }
            });

    });

    $('#member-language').on('change', function() {
        var _this = $(this),
            lang = _this.val(),
            _memberTable = $('#member-table');

            $.ajax({
                method: "POST",
                url: endPoint,
                data: 'action=getMembersData&pId=' + '&lang=' + lang,
                success: function(res) {
                    var response,
                        tempHtml = '',
                        i, length, email, telefon;

                    if(res)
                    {
                        response = JSON.parse(res);
                        _memberTable.find('.single').remove();
                        for(i = 0, length = response.length; i < length; i++)
                        {
                            email = response[i].email || '';
                            telefon = response[i].telefon || '';

                            tempHtml += '<tr class="single">';
                            tempHtml += '<td>' + response[i].name + '</td>';
                            tempHtml += '<td>1' + response[i].created_date + '</td>';
                            tempHtml += '<td>' + response[i].text + '</td>';
                            tempHtml += '<td>' + email + '</td>';
                            tempHtml += '<td>' + telefon + '</td>';
                            tempHtml += '<td class="text-center">';
                            tempHtml += '<div class="btn-group">';
                            tempHtml += '<a href="#member-update" class="btn btn-primary member-update" data-toggle="modal" data-member="' + response[i].member_id + '" data-lang="' + lang + '"><i class="icon_plus_alt2"></i></a>';
                            tempHtml += '<a href="#member-delete" class="btn btn-danger member-delete" data-member="' + response[i].member_id + '" data-toggle="modal"><i class="icon_close_alt2"></i></a>';
                            tempHtml += '</div>';
                            tempHtml += '</td>';
                            tempHtml += '</tr>';
                        }
                        _memberTable.find('tbody').append(tempHtml);
                    }
                }
            });
    });

    $('.navbar-toggle').on('click', function() {
        $('.navbar-nav').slideToggle(700);
    });

})(jQuery);
