let table = true;
$(() => {
    $(".btn-tambah").on("click", function () {
        window.location.href = BASE_URL + "pengajuan/create";
    });

    function formatDateWithMonthName(dateString) {
        const months = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        const date = new Date(dateString);
        const day = ("0" + date.getDate()).slice(-2);
        const monthName = months[date.getMonth()];
        const year = date.getFullYear();
        const seconds = ("0" + date.getSeconds()).slice(-2);
        const minutes = ("0" + date.getMinutes()).slice(-2);
        const hours = ("0" + date.getHours()).slice(-2);

        return `${day} ${monthName} ${year} ${hours}:${minutes}`;
    }

    function formatDateWithMonth(dateString) {
        const months = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        const date = new Date(dateString);
        const day = ("0" + date.getDate()).slice(-2);
        const monthName = months[date.getMonth()];
        const year = date.getFullYear();
        const seconds = ("0" + date.getSeconds()).slice(-2);
        const minutes = ("0" + date.getMinutes()).slice(-2);
        const hours = ("0" + date.getHours()).slice(-2);

        return `${day} ${monthName} ${year}`;
    }

    table = $("#table-data").DataTable({
        language: dtLang,
        serverSide: true,
        processing: true,
        ajax: {
            url: BASE_URL + "pengajuan/data",
            type: "get",
            dataType: "json",
        },
        order: [[4, "desc"]],
        columnDefs: [
            {
                targets: [0, 4],
                orderable: true,
                searchable: false,
                className: "text-center align-top",
            },
            {
                targets: [1, 2],
                className: "text-left align-top",
                orderable: false,
                searchable: true,
            },
            {
                targets: [3],
                className: "text-center align-top",
                orderable: true,
                searchable: false,
            },
        ],
        columns: [
            {
                data: "DT_RowIndex",
            },
            {
                data: "nama",
            },
            {
                data: "pekerjaan",
            },
            {
                data: null,
                render: (data, type, row) => {
                    const tanggal = row.tanggal_pengajuan ?? "-";
                    const formatted = formatDateWithMonth(tanggal);
                    return `${formatted}`;
                },
            },
            {
                data: "id",
                render: (data, type, row) => {
                    const button_edit = $("<a>", {
                        class: "btn btn-primary",
                        html: '<i class="bx bx-pencil"></i>',
                        "data-id": data,
                        title: "Update Data",
                        href: BASE_URL + "pengajuan/edit/" + data,
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

                    const button_delete = $("<button>", {
                        class: "btn btn-danger btn-delete",
                        html: '<i class="bx bx-trash"></i>',
                        "data-id": data,
                        title: "Delete Data",
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

                    return $("<div>", {
                        class: "btn-group",
                        html: () => {
                            let arr = [];

                            if (permissions.update) {
                                arr.push(button_edit);
                            }
                            if (permissions.delete) arr.push(button_delete);

                            return arr;
                        },
                    }).prop("outerHTML");
                },
            },
        ],
    });

    $("#table-data").on("click", ".btn-delete", function () {
        let data = table.row($(this).closest("tr")).data();

        let { id, nama } = data;

        Swal.fire({
            title: "Anda yakin?",
            html: `Anda akan menghapus pengajuan "<b>${nama}</b>"!`,
            footer: "Data yang sudah dihapus tidak bisa dikembalikan kembali!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(BASE_URL + "pengajuan/delete", {
                    id,
                    _method: "DELETE",
                })
                    .done((res) => {
                        showSuccessToastr("Sukses", "Data berhasil dihapus");
                        table.ajax.reload();
                    })
                    .fail((res) => {
                        let { status, responseJSON } = res;
                        showErrorToastr("oops", responseJSON.message);
                    });
            }
        });
    });

    $(".btn-update").on("click", function () {
        var id;
        window.location.href = BASE_URL + "pengajuan/create";
    });
});
