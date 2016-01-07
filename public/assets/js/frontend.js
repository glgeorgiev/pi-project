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
            }
        });
    });
});
