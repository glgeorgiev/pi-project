jQuery(function($) {
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('input[name="file"]').fileinput({
        showUpload: false,
        previewFileType: ['image'],
        allowedFileTypes: ['image'],
        browseLabel: "Качи",
        removeClass: "btn btn-danger",
        removeLabel: "Премахни"
    });
});
