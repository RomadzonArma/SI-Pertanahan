var table_foto;
var temp_jalan_id = null;
$('#table-data').on('click', '.btn-update-foto', function(e){
    e.preventDefault();
    temp_jalan_id = e.target.dataset.id;
    let modal_foto = $('#modal-foto');
    modal_foto.modal('show');

    var data = new FormData();
    data.append('id', e.target.dataset.id);
    $.ajax({
        url: BASE_URL + 'jalan-lingkungan/foto',
        type: 'POST',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: () => {
            modal_foto.find('.modal-body').LoadingOverlay('show');
        }
    }).then((res)=>{
        modal_foto.find('.modal-body').LoadingOverlay('hide', true);
        if(res.status==true){
            load_table_foto();
        } else{
            showErrorToastr('oops', res.msg);
        }
    }).fail((error)=>{
        modal_foto.find('.modal-body').LoadingOverlay('hide', true);
        showErrorToastr('oops', 'Server error');
    });
});

const load_table_foto = () =>{
    if(typeof table_foto!='undefined') {
        table_foto.draw();
    } else{
        table = $('#table-foto').DataTable({
            language: dtLang,
            stateSave: true,
            destroy: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: BASE_URL + 'jalan-lingkungan/data-foto',
                type: 'POST',
                dataType: 'json',
                data: function(d){
                    d.id = temp_jalan_id;
                },
                beforeSend: function() {
                    $("#table-foto").LoadingOverlay('show');
                },
                complete: function() {
                    $("#table-foto").LoadingOverlay('hide', true);
                }
            },
            ordering: false,
            columnDefs: [],
            columns: [{
                data: 'DT_RowIndex'
            }, {
                data: 'image_url',
                render: (data, type, row)=>{
                    return $('<img>', {
                        src: data,
                        style: 'max-width: 100%;'
                    }).prop('outerHTML');
                }
            }, {
                data: 'created_at'
            }, {
                data: 'id',
                render: (data, type, row) => {
                    const button_delete = $('<button>', {
                        class: 'btn btn-danger btn-delete-foto',
                        html: `<i class="bx bx-trash" data-id="${data}"></i>`,
                        'data-id': data,
                        title: 'Hapus',
                        'data-placement': 'top',
                        'data-toggle': 'tooltip',
                        type: 'button' 
                    });
    
                    return $('<div>', {
                        class: 'btn-group',
                        html: () => {
                            let arr = [];
    
                            if (permissions.update) {
                                arr.push(button_delete);
                            }
    
                            return arr;
                        }
                    }).prop('outerHTML');
                }
            }]
        });
    }
}

// dropzone
var form_upload_foto = $("#form-upload-foto");
Dropzone.autoDiscover = false;

initDropzones();
$(".dropzone-foto").each(function () {
    $(this).dropzone({
        autoProcessQueue: false,
        uploadMultiple: true,
        maxFiles: 100,
        maxFilesize: 25,
        addRemoveLinks: true,
        parallelUploads: 10,
        dictMaxFilesExceeded: "File anda terlalu besar",
        acceptedFiles: ".jpeg, .jpg, .png",
        dictInvalidFileType: "Hanya untuk tipe file yang telah ditentukan",
        paramName: "file_foto",
        init: function () {
            $(this.element).addClass("dropzone");
            var submitButton = document.querySelector("#btn-submit-upload-foto");
            myDropzone = this;

            submitButton.addEventListener("click", function () {
                myDropzone.processQueue();
            });

            this.on("success", function (file, response) {
                this.removeFile(file);

                if (response.status === true) {
                    toastr.success(response.msg, {
                        timeOut: 2000,
                        fadeOut: 2000,
                    });
                } else {
                    toastr.error(response.msg, {
                        timeOut: 2000,
                        fadeOut: 2000,
                    });
                }
            });

            this.on("complete", function (file, response) {
                load_table_foto();
            });

            this.on("sendingmultiple", function (data, xhr, formData) {
                formData.append('jalan_lingkungan_id', temp_jalan_id);
            });
        },
    });
});

function initDropzones() {
	$(".dropzone-foto").each(function () {
		let dropzoneControl = $(this)[0].dropzone;
		if (dropzoneControl) dropzoneControl.destroy();
	});
}

// delete
$('#table-foto').on('click', '.btn-delete-foto', function(e){
    e.preventDefault();
    var data = new FormData();
    data.append('id', e.target.dataset.id);
    $.ajax({
        url: BASE_URL + 'jalan-lingkungan/delete-foto',
        type: 'POST',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: () => {
            $('#table-foto').LoadingOverlay('show');
        }
    }).then((res)=>{
        $('#table-foto').LoadingOverlay('hide', true);
        if(res.status==true){
            showSuccessToastr('', res.msg);
            load_table_foto();
        } else{
            showErrorToastr('oops', res.msg);
        }
    }).fail((error)=>{
        $('#table-foto').LoadingOverlay('hide', true);
        showErrorToastr('oops', 'Server error');
    });
});