let table;
$(() => {
    // $('#form-pertanahan-update').on('submit', function (e) {
    //     e.preventDefault();

    //     var data = new FormData(this);

    //     $.ajax({
    //         url: $(this).attr('action'),
    //         type: $(this).attr('method'),
    //         data: data,
    //         dataType: 'json',
    //         processData: false,
    //         contentType: false,
    //         beforeSend: () => {
    //             clearErrorMessage();
    //             $('#modal-pertanahan-update').find('.modal-dialog').LoadingOverlay('show');
    //         },
    //         success: (res) => {
    //             $('#modal-pertanahan-update').find('.modal-dialog').LoadingOverlay('hide', true);
    //             $(this)[0].reset();
    //             clearErrorMessage();
    //             table.ajax.reload();
    //             $('#modal-pertanahan-update').modal('hide');
    //         },
    //         error: ({ status, responseJSON }) => {
    //             $('#modal-pertanahan-update').find('.modal-dialog').LoadingOverlay('hide', true);

    //             if (status == 422) {
    //                 generateErrorMessage(responseJSON, true);
    //                 return false;
    //             } else if(status == 200){
    //                 $(this)[0].reset();
    //                 clearErrorMessage();
    //                 table.ajax.reload();
    //                 $('#modal-pertanahan-update').modal('hide');
    //             }

    //             if(typeof responseJSON!='undefined') showErrorToastr('oops', responseJSON.msg)
    //         }
    //     })
    // })

    // $('#table-data').on('click', '.btn-update', function () {
    //     var tr = $(this).closest('tr');
    //     var data = table.row(tr).data();

    //     clearErrorMessage();
    //     $('#form-pertanahan-update')[0].reset();

    //     $.each(data, (key, value) => {
    //         $('#update-' + key).val(value);
    //     })

    //     $('#modal-pertanahan-update').modal('show');
    // })

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
        columns: [
            {
                // data: 'DT_RowIndex',
                // name: 'DT_RowIndex',
                className: 'dt-control',
                orderable: false,
                defaultContent: '<i class="fas fa-chevron-down"></i>'
            },
            {
                data: 'pengg_seka',
                name: 'pengg_seka'
            },
            {
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
                    const encryptedId = '{{ encrypt($data) }}';
                    const button_edit = $('<a>', {
                        class: 'btn btn-primary',
                        html: '<i class="bx bx-pencil"></i>',
                        'data-id': data,
                        title: 'Lengkapi Data',
                        'data-placement': 'top',
                        'data-toggle': 'tooltip',
                        href: BASE_URL + `pertanahan/update/${data}`
                    });

                    return $('<div>', {
                        class: 'btn-group',
                        html: () => {
                            let arr = [];

                            if (permissions.update) {
                                arr.push(button_edit)
                            }
                            return arr;
                        }
                    }).prop('outerHTML');
                }
            }
        ]
    });

    function format(d) {
        let nomorSertifikat = d.data_update && d.data_update.nomor_sertifikat ? d.data_update.nomor_sertifikat : '<span style="color: red; font-style: italic;">data belum tersedia</span>';
        let namaSertifikat = d.data_update && d.data_update.nama_sertifikat ? d.data_update.nama_sertifikat : '<span style="color: red; font-style: italic;">data belum tersedia</span>';
        let penggunaanSaatIni = d.data_update && d.data_update.penggunaan_saat_ini ? d.data_update.penggunaan_saat_ini : '<span style="color: red; font-style: italic;">data belum tersedia</span>';

        return (
            '<dl>' +
            '<dt>Nomor Sertifikat:</dt>' +
            '<dd>' +
            nomorSertifikat +
            '</dd>' +
            '<dt>Nama Sertifikat:</dt>' +
            '<dd>' +
            namaSertifikat +
            '</dd>' +
            '<dt>Penggunaan Saat Ini:</dt>' +
            '<dd>' +
            penggunaanSaatIni +
            '</dd>' +
            '</dl>'
        );
    }

    // Add event listener for opening and closing details
    table.on('click', 'td.dt-control', function (e) {
        let tr = $(this).closest('tr');
        let row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            // Ganti ikon ke bawah ketika tertutup
            $(this).html('<i class="fas fa-chevron-down"></i>');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            // Ganti ikon ke atas ketika terbuka
            $(this).html('<i class="fas fa-chevron-up"></i>');
        }
    });



})
