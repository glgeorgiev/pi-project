jQuery(function($) {
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
});
