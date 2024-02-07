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
        order: [[5, "desc"]],
        columnDefs: [
            {
                targets: [0, 5],
                orderable: true,
                searchable: false,
                className: "text-center align-top",
            },
            {
                targets: [1, 2, 4],
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
                render: (data, type, row) => {
                    const no_regBadge = row.no_reg
                        ? `<h5><span class="badge badge-secondary">No Registrasi : ${row.no_reg}</span></h5>`
                        : "";
                    const surveyBadge =
                        row.survey == "1"
                            ? `<h5><span class="badge badge-secondary">Survey : Ada</span></h5>`
                            : "";
                    return data + "<br>" + no_regBadge + surveyBadge;
                },
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
                data: "nama_status",
                render: (data, type, row) => {
                    const statusBadge = row.status
                        ? `<h5><span class="badge badge-primary">${row.nama_status}</span></h5>`
                        : "";
                    const alasanBadge = row.alasan
                        ? `<span class="badge badge-primary">Alasan: ${row.alasan}</span>`
                        : "";
                    return statusBadge + "<br>" + alasanBadge;
                },
            },
            {
                data: "encrypted_id",
                render: (data, type, row) => {
                    const button_ajukan_pemohon = $("<button>", {
                        class: "btn btn-success",
                        html: '<i class="bx bx-check-circle btn-ajukan-pemohon"></i>',
                        "data-id": data,
                        title: "Ajukan Pemohon",
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

                    const button_ajukan_operator = $("<button>", {
                        class: "btn btn-warning",
                        html: '<i class="bx bx-check-circle btn-ajukan-operator"></i>',
                        "data-id": data,
                        title: "Ajukan Operator",
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

                    const button_ajukan_lapangan = $("<button>", {
                        class: "btn btn-secondary",
                        html: '<i class="bx bx-check-circle btn-ajukan-lapangan"></i>',
                        "data-id": data,
                        title: "Ajukan Tim Lapangan",
                        "data-placement": "top",
                        "data-toggle": "tooltip",
                    });

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

                            arr.push(button_ajukan_pemohon);
                            arr.push(button_ajukan_operator);
                            arr.push(button_ajukan_lapangan);

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

        let { encrypted_id: id, nama } = data;

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

    $("#table-data").on("click", ".btn-ajukan-pemohon", function () {
        let data = table.row($(this).closest("tr")).data();
        let { encrypted_id: id } = data;

        $.ajax({
            url: BASE_URL + "pengajuan/ajukanpemohon",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            beforeSend: function () {
                Swal.fire({
                    title: "Mohon Tunggu",
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            },
            success: function (data) {
                swal.close();
                $("#modal_ajukanpemohon").modal("show");
                $(".getformpemohon").html(data.html);
            },
        });
    });

    $("#modal_ajukan_pemohon").on("hidden.bs.modal", function () {
        $(".getformpemohon").html("");
    });

    $("#table-data").on("click", ".btn-ajukan-operator", function () {
        let data = table.row($(this).closest("tr")).data();
        let { encrypted_id: id } = data;

        $.ajax({
            url: BASE_URL + "pengajuan/ajukanoperator",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            beforeSend: function () {
                Swal.fire({
                    title: "Mohon Tunggu",
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            },
            success: function (data) {
                swal.close();
                $("#modal_ajukanoperator").modal("show");
                $(".getformoperator").html(data.html);
            },
        });
    });

    $("#modal_ajukan_operator").on("hidden.bs.modal", function () {
        $(".getformoperator").html("");
    });

    $("#table-data").on("click", ".btn-ajukan-lapangan", function () {
        let data = table.row($(this).closest("tr")).data();
        let { encrypted_id: id } = data;

        $.ajax({
            url: BASE_URL + "pengajuan/ajukanlapangan",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id,
            },
            beforeSend: function () {
                Swal.fire({
                    title: "Mohon Tunggu",
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                    showConfirmButton: false,
                    showCancelButton: false,
                });
            },
            success: function (data) {
                swal.close();
                $("#modal_ajukanlapangan").modal("show");
                $(".getformlapangan").html(data.html);
            },
        });
    });

    $("#modal_ajukan_lapangan").on("hidden.bs.modal", function () {
        $(".getformlapangan").html("");
    });
});
