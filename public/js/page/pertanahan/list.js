let table;
$(() => {
    $('#form-pertanahan-update').on('submit', function (e) {
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
                clearErrorMessage();
                $('#modal-pertanahan-update').find('.modal-dialog').LoadingOverlay('show');
            },
            success: (res) => {
                $('#modal-pertanahan-update').find('.modal-dialog').LoadingOverlay('hide', true);
                $(this)[0].reset();
                clearErrorMessage();
                table.ajax.reload();
                $('#modal-pertanahan-update').modal('hide');
            },
            error: ({ status, responseJSON }) => {
                $('#modal-pertanahan-update').find('.modal-dialog').LoadingOverlay('hide', true);

                if (status == 422) {
                    generateErrorMessage(responseJSON, true);
                    return false;
                } else if(status == 200){
                    $(this)[0].reset();
                    clearErrorMessage();
                    table.ajax.reload();
                    $('#modal-pertanahan-update').modal('hide');
                }

                if(typeof responseJSON!='undefined') showErrorToastr('oops', responseJSON.msg)
            }
        })
    })

    $('#table-data').on('click', '.btn-update', function () {
        var tr = $(this).closest('tr');
        var data = table.row(tr).data();

        clearErrorMessage();
        $('#form-pertanahan-update')[0].reset();

        $.each(data, (key, value) => {
            $('#update-' + key).val(value);
        })

        $('#modal-pertanahan-update').modal('show');
    })

    table = $('#table-data').DataTable({
        language: dtLang,
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + 'pertanahan/data',
            type: 'get',
            dataType: 'json'
        },
        order: [[1, 'desc']],
        // columnDefs: [{
        //     targets: [0, 5],
        //     orderable: false,
        //     searchable: false,
        //     className: 'text-center align-top'
        // }, {
        //     targets: [1, 2],
        //     className: 'text-left align-top'
        // }, {
        //     targets: [3],
        //     className: 'text-center align-top'
        // }, {
        //     targets: [5],
        //     visible: false,
        // }],
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex'
        },
        {
            data: 'pengg_seka',
            name: 'pengg_seka'
        }, {
            data: 'pengg_sertif',
            name: 'pengg_sertif'
        },
        {
            data: 'no_hp',
            name: 'no_hp'
        },
        {
            data: 'luas',
            name: 'luas'
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

                const button_detail = $('<button>', {
                    class: 'btn btn-warning btn-detail',
                    html: '<i class="bx bx-file"></i> Detail',
                    'data-id': data,
                    title: 'Detail',
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

                const button_reset_password = $('<button>', {
                    class: 'btn btn-secondary btn-reset-password',
                    html: '<i class="bx bx-key"></i>',
                    'data-id': data,
                    title: 'Reset Password',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                const button_update_role = $('<button>', {
                    class: 'btn btn-success btn-update-role',
                    html: '<i class="bx bx-user"></i>',
                    'data-id': data,
                    title: 'Peran Pengguna',
                    'data-placement': 'top',
                    'data-toggle': 'tooltip'
                });

                return $('<div>', {
                    class: 'btn-group',
                    html: () => {
                        let arr = [];

                        // arr.push(button_detail)
                        if (permissions.update) {
                            // arr.push(button_update_role)
                            // arr.push(button_reset_password)
                            arr.push(button_edit)
                        }
                        // if (UPDATE) arr.push(button_edit)
                        // if (permissions.delete) arr.push(button_delete)

                        return arr;
                    }
                }).prop('outerHTML');
            }
        },
        // {
        //     data: 'created_at'
        // }
    ]
    })
    
})
