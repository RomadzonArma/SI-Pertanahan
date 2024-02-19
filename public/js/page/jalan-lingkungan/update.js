var form_update = $('#form-update');
form_update.on('submit', function(e){
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
            form_update.LoadingOverlay('show');
        }
    }).then((res)=>{
        form_update.LoadingOverlay('hide', true);
        if(res.status==true){
            showSuccessToastr('', res.msg);
            setTimeout(() => {
                location.href = BASE_URL + 'jalan-lingkungan';
            }, 1000);
        } else{
            showErrorToastr('oops', res.msg);
        }
    }).fail((error)=>{
        form_update.LoadingOverlay('hide', true);
        showErrorToastr('oops', 'Server error');
    });
});