$(() => {
    $(".select2").select2({
        width: "100%",
    });

    $(".custom-file-input").on("change", function () {
        let fileName = $(this).val().split("\\").pop();
        $(this)
            .siblings(".custom-file-label")
            .addClass("selected")
            .html(fileName);
    });

    $("#add-form").on("submit", function (e) {
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: () => {
                clearErrorMessage();
                Swal.fire({
                    title: "Mohon Tunggu ...",
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
            },
            success: (res) => {
                swal.close();
                Swal.fire({
                    title: "Sukses",
                    text: "Berhasil menyimpan data",
                    icon: "success",
                });
                setTimeout(() => {
                    window.location.href = BASE_URL + "pengajuan";
                }, 2000);
            },
            error: ({ status, responseJSON }) => {
                swal.close();

                if (status == 422) {
                    generateErrorMessage(responseJSON);
                    return false;
                }

                showErrorToastr("oops", responseJSON.msg);
            },
        });
    });
});
