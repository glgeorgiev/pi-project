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
            data: formData,
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    // For handling the progress of the upload
                    myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                }
                return myXhr;
            },
            success: function(data) {
                if (! data.hasOwnProperty('result') ||
                    data.result != 'OK') {
                    alert('There was an error');
                }
                if (! data.hasOwnProperty('image_id') ||
                    ! data.hasOwnProperty('image_title') ||
                    ! data.hasOwnProperty('image_url')) {
                    alert('There was an error');
                }
                $(':input[name="image_id"]').val(data.image_id);
                $('.selected-image').find('img').attr('src', data.image_url);
                $('#uploadImageModal').modal('hide');
                $('.progress-bar').css('width', '0%').html('0%');
                $('#upload-image-form').get(0).reset();
            },
            error: function() {
                alert('There was an error');
            }
        });
    });

    $('#select-image-form-submit-btn').on('click', function() {
        var $form = $('#select-image-form');
        var formData = new FormData($form.get(0));
        $.ajax({
            url: $form.attr('action'),
            type: 'GET',
            data: formData,
            success: function(data) {
                console.log(data);
            },
            error: function() {
                alert('There was an error');
            }
        });
    });

    $('a[href="#selectImageModal"]').on('click', function() {
        $('#select-image-form-submit-btn').trigger('click');
    });
});
