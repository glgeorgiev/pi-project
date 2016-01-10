jQuery(function($) {
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('input[type="file"]').fileinput({
        showUpload: false,
        previewFileType: ['image'],
        allowedFileTypes: ['image'],
        browseLabel: "Качи",
        removeClass: "btn btn-danger",
        removeLabel: "Премахни"
    });
    $('a[href="#destroyModal"]').on('click', function() {
        var $this = $(this);
        $('#modal-text').text($this.attr('data-text'));
        $('#destroy-form').attr('action', $this.attr('data-url'));
    });
    $('.sortable').sortable();
});
