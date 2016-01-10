jQuery(function($) {
    $('input[type="file"]').fileinput({
        showUpload: false,
        previewFileType: ['image'],
        allowedFileTypes: ['image'],
        browseLabel: "Качи",
        removeClass: "btn btn-danger",
        removeLabel: "Премахни"
    });
    $('.like-dislike-forms').find('form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            method: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serialize(),
            success: function(data) {
                if (data.hasOwnProperty('likes') &&
                    data.hasOwnProperty('dislikes')) {
                    $('.article-likes').text(data.likes);
                    $('.article-dislikes').text(data.dislikes);
                }
            },
            error: function(error) {
                if (error.hasOwnProperty('responseJSON') &&
                    error.responseJSON.hasOwnProperty('message')) {
                    $('.article-likes-dislikes-error').text(error.responseJSON.message);
                }
            }
        });
    });
    $('.comment-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            method: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serialize(),
            success: function(html) {
                $('.article-comments-container').html(html);
                $(':input[name="comment"]').val('');
                $('.article-comment-error').text('Коментарът беше успешно публикуван!');
            },
            error: function(error) {
                if (error.hasOwnProperty('responseJSON') &&
                    error.responseJSON.hasOwnProperty('message')) {
                    $('.article-comment-error').text(error.responseJSON.message);
                }
            }
        });
    });
    $('.poll-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        $.ajax({
            method: $this.attr('method'),
            url: $this.attr('action'),
            data: $this.serialize(),
            success: function(html) {
                $this.get(0).outerHTML = html;
            },
            error: function(error) {
                if (error.hasOwnProperty('responseJSON') &&
                    error.responseJSON.hasOwnProperty('message')) {
                    $('.poll-error').text(error.responseJSON.message);
                }
            }
        });
    });
    $('.comment-form').validate({
        rules: {
            comment: {
                required: true
            }
        }
    });
    $('.register-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 255
            },
            name: {
                required: true,
                maxlength: 255
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                equalTo: 'input[name="password"]'
            }
        }
    });
    $('.login-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 255
            },
            password: {
                required: true,
                minlength: 6
            }
        }
    });
    $('.email-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 255
            }
        }
    });
    $('.reset-form').validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 255
            },
            password: {
                required: true,
                minlength: 6
            },
            password_confirmation: {
                equalTo: 'input[name="password"]'
            }
        }
    });
});
