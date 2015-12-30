jQuery(function($) {
    function progressHandlingFunction(e){
        if (e.lengthComputable){
            var percent = Math.round((e.loaded/ e.total)*100) + '%';
            $('.progress-bar').css('width', percent).html(percent);
        }
    }

    $('#upload-image-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        var formData = new FormData(this);
        $.ajax({
            url: $this.attr('action'),
            type: 'POST',
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    // For handling the progress of the upload
                    myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                }
                return myXhr;
            },
            success: function(data) {
                console.log(data);
            },
            error: function() {
                alert('There was an error');
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
    });
});
