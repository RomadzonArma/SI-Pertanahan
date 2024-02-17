$('.btn-sync-tanah').on('click', (e)=>{
    $.ajax({
        url: BASE_URL + 'data-aset/sync-sinta',
        type: 'GET',
        data: {},
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: () => {
            $('.card-body').LoadingOverlay('show');
        }
    }).then((res)=>{
        $('.card-body').LoadingOverlay('hide', true);
        showSuccessToastr('sukses', 'Data tanah berhasil diperbarui');
    }).fail(( error )=>{
        $('.card-body').LoadingOverlay('hide', true);
        return showErrorToastr('oops', 'Server error');
    });
});