var form_update = $('#form-update');
form_update.on('submit', function (e) {
    e.preventDefault();
    var data = new FormData(this);
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: () => {
            form_update.LoadingOverlay('show');
        }
    }).then((res) => {
        form_update.LoadingOverlay('hide', true);
        if (res.status == true) {
            showSuccessToastr('', res.msg);
            setTimeout(() => {
                location.href = BASE_URL + 'pertanahan';
            }, 1000);
        } else {
            showErrorToastr('oops', res.msg);
        }
    }).fail((error) => {
        form_update.LoadingOverlay('hide', true);
        showErrorToastr('oops', 'Server error');
    });
});

$('.delete-button').on('click', function () {
    var photoId = $(this).data('photo-id');
    var imageContainer = $(this).closest('.image-container');

    // Implement AJAX request to delete the image from the server
    $.ajax({
        url: '/delete-photo/' + photoId, // Replace with your actual delete endpoint
        method: 'DELETE',
        success: function (response) {
            // If deletion is successful, remove the image container
            imageContainer.remove();
        },
        error: function (error) {
            console.error('Error deleting photo:', error);
        }
    });
});

$("#myDropzone").dropzone({
    paramName: "foto", // Menggunakan "foto" sebagai nama parameter
    maxFilesize: 2, // MB
    maxFiles: null, // No limit on the number of files
    acceptedFiles: "image/jpeg,image/gif,image/png",
    dictDefaultMessage: "Drop files here or click to upload.",
    addRemoveLinks: true, // Show remove link on each file preview
});
