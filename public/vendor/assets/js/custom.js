$(document).ready(function() {

    $('.deleteModal').on('click', function(){

        var form = document.getElementById('deleteCategoryForm');
        form.action = '/admin/categories/' + $(this).data('id') + '' ;

        $('#deleteModal').modal('show');

    });

    tinymce.init({
        selector: '.mytextarea',
        force_br_newlines : true,
        force_p_newlines : false,
        forced_root_block : '',
        menubar: "edit | insert | view | format | table | tools | help",
        statusbar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code',
            'autoresize textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | paste',
        paste_data_images: true
    });

    $(document).ready(function() {
        $('#datatable').DataTable({
            "ordering": true
        });
    } );

});

$('.tr-row-href').on('click', function() {
    window.location = $(this).data("href");
});
