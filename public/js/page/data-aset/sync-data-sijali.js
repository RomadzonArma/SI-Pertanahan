$('.btn-sync-jalan').on('click', (e)=>{
    $.ajax({
        url: BASE_URL + 'data-aset/sync-sijali',
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