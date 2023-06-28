
function DeleteAlert(url){
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = url;
            } else {
                swal("Your imaginary file is safe!");
            }
        });
}
