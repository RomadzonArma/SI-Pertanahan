let table;
$(() => {
    // $('#table-data').on('click', '.btn-delete', function () {
    //     let data = table.row($(this).closest('tr')).data();

    //     let { id, name } = data;

    //     Swal.fire({
    //         title: 'Anda yakin?',
    //         html: `Anda akan menghapus menu "<b>${name}</b>"!`,
    //         footer: 'Data yang sudah dihapus tidak bisa dikembalikan kembali!',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Ya, Hapus!',
    //         cancelButtonText: 'Batal'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.post(BASE_URL + 'manajemen-menu/delete', {
    //                 id,
    //                 _method: 'DELETE'
    //             }).done((res) => {
    //                 showSuccessToastr('sukses', 'Menu berhasil dihapus');
    //                 table.ajax.reload();
    //             }).fail((res) => {
    //                 let { status, responseJSON } = res;
    //                 showErrorToastr('oops', responseJSON.message);
    //             })
    //         }
    //     })
    // })

    // $('#form-update-menu').on('submit', function (e) {
    //     e.preventDefault();

    //     var data = new FormData(this);

    //     $.ajax({
    //         url: $(this).attr('action'),
    //         type: $(this).attr('method'),
    //         data: data,
    //         dataType: 'json',
    //         contentType: false,
    //         processData: false,
    //         beforeSend: () => {
    //             clearErrorMessage();
    //             $('#modal-update-menu').find('.modal-dialog').LoadingOverlay('show');
    //         },
    //         success: (res) => {
    //             $('#modal-update-menu').find('.modal-dialog').LoadingOverlay('hide', true);
    //             $(this)[0].reset();
    //             clearErrorMessage();
    //             table.ajax.reload();
    //             $('#modal-update-menu').modal('hide');
    //         },
    //         error: ({ status, responseJSON }) => {
    //             $('#modal-update-menu').find('.modal-dialog').LoadingOverlay('hide', true);

    //             if (status == 422) {
    //                 generateErrorMessage(responseJSON, true);
    //                 return false;
    //             }

    //             showErrorToastr('oops', responseJSON.msg)
    //         }
    //     })
    // })

    $('#table-data').on('click', '.btn-update', function () {
        let data = table.row($(this).closest('tr')).data();

        $('#form-update-custom')[0].reset();
        clearErrorMessage();

        let { id, judul, title_header, alamat, email, telp, foto_header,foto_footer  } = data;

        $('#update-id').val(id);
        $('#update-judul').val(judul);
        $('#update-title').val(title_header);
        $('#update-alamat').val(alamat);
        $('#update-email').val(email);
        $('#update-telp').val(telp);
        $('#update-fotoh').val(foto_header);
        $('#update-fotof').val(foto_footer);

        $('#modal-update-custom').modal('show');
    })

    $('#form-custom').on('submit', function (e) {
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: data,
            dataType: 'json',
            contentType: false,
            processData: false,
            beforeSend: () => {
                clearErrorMessage();
                $('#modal-custom').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-custom').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $('#modal-custom').modal('hide');
            },
            error: ({ status, responseJSON }) => {
                $('#modal-custom').find('.modal-dialog').LoadingOverlay('hide', true);

                if (status == 422) {
                    generateErrorMessage(responseJSON);
                    return false;
                }

                showErrorToastr('oops', responseJSON.msg)
            }
        })
    })


    $('.btn-tambah').on('click', function () {
        $('#form-custom')[0].reset();
        clearErrorMessage();
        $('#modal-custom').modal('show');
    });

    table = $('#table-data').DataTable({
        language: dtLang,
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + 'custom-front/data',
            type: 'get',
            dataType: 'json'
        },
        order: [[6, 'desc']],
        columnDefs: [{
            targets: [0, 6],
            orderable: false,
            searchable: false,
            className: 'text-center align-top'
        },{
            targets: [8],
            visible: false,
        }],
        columns: [{
            data: 'DT_RowIndex'
        }, {
            data: 'judul',

        }, {
            data: 'title_header',
        }, {
            data: 'alamat',

        }, {
            data: 'email',

        },
        {
            data: 'logo_header',

        },
        {
            data: 'logo_footer',

        },
        {
            data: 'id',
            render: (data, type, row) => {
                const button_edit = $('<button>', {
                    class: 'btn btn-primary btn-update',
                    html: '<i class="bx bx-pencil"></i>',
                    'data-id': data,
                    title: 'Update Data',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                const button_delete = $('<button>', {
                    class: 'btn btn-danger btn-delete',
                    html: '<i class="bx bx-trash"></i>',
                    'data-id': data,
                    title: 'Delete Data',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                return $('<div>', {
                    class: 'btn-group',
                    html: () => {
                        let arr = [];

                        if (permissions.update) {
                            arr.push(button_edit)
                        }
                        if (permissions.delete) arr.push(button_delete)

                        return arr;
                    }
                }).prop('outerHTML');
            }
        }, {
            data: 'created_at'
        }]
    });
})

