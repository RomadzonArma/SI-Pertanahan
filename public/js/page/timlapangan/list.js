let table;
$(()=>{
    load_table();
});

const load_table = () =>{
    table = $('#table-data').DataTable({
        language: dtLang,
        destroy: true,
        serverSide: true,
        processing: true,
        ordering: false,
        ajax: {
            url: BASE_URL + 'timlapangan/data',
            type: 'get',
            dataType: 'json'
        },
        columns: [
            {
                data: 'id',
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            }, {
                data: 'name'
            }, {
                data: 'pekerjaan',
            }, {
                data: 'alamat',
            }, {
                data: 'no_telp',
            }, {
                data: 'id',
                render: (data, type, row) => {
                    const button_detail = $('<button>', {
                        class: 'btn btn-secondary btn-detail',
                        html: '<i class="bx bx-show"></i>',
                        'data-id': data,
                        title: 'Detail',
                        'data-placement': 'top',
                        'data-toggle': 'tooltip'
                    });
    
                    return $('<div>', {
                        class: 'btn-group',
                        html: () => {
                            let arr = [];
                            arr.push(button_detail);
                            return arr;
                        }
                    }).prop('outerHTML');
                }
            }
        ]
    });
}