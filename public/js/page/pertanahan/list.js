var table;
$(() => {
    $('#filter-kec').trigger('change');
});

$('#filter-kec').on('change', (e) => {
    let kel = ref_kel.filter(o => { return o.id_kecamatan == e.target.value; });
    let select_kel = $('#filter-kel');
    select_kel.empty();
    select_kel.append(new Option('Semua Kelurahan', ''));
    for (const i of kel) {
        select_kel.append(new Option(i.nama, i.id_kelurahan));
    }
    select_kel.trigger('change');
    return;
});

$('#filter-kel').on('change', (e) => {
    if (typeof table != 'undefined') table.draw();
    else load_table();
    return;
});

const load_table = () => {
    table = $('#table-data').DataTable({
        language: dtLang,
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + 'pertanahan/data',
            type: 'get',
            dataType: 'json',
            data: function (d) {
                d.kode_kec = $('#filter-kec').val();
                d.kode_kel = $('#filter-kel').val();
            },
            beforeSend: function () {
                $("#table-data").LoadingOverlay('show');
            },
            complete: function () {
                $("#table-data").LoadingOverlay('hide', true);
            }
        },
        ordering: false,
        columns: [
            {
                data: 'DT_RowIndex',
            },
            {
                data: 'pengg_seka',
            },
            {
                data: 'pengg_sertif',
            },
            {
                data: 'no_hp',
            },
            {
                data: 'nama_kecamatan'
            },
            {
                data: 'nama_kelurahan'
            },
            {
                data: 'luas',
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

                    const button_foto = $('<button>', {
                        class: 'btn btn-warning btn-update-foto',
                        html: `<i class="bx bx-image" data-id="${data}"></i>`,
                        'data-id': data,
                        title: 'Foto',
                        'data-placement': 'top',
                        'data-toggle': 'tooltip',
                        type: 'button'
                    });

                    return $('<div>', {
                        class: 'btn-group',
                        html: () => {
                            let arr = [];

                            if (permissions.update) {
                                arr.push(button_edit)
                                arr.push(button_foto)
                            }
                            return arr;
                        }
                    }).prop('outerHTML');
                }
            }
        ]
    });
}

