function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Xác nhận xóa?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Đã Xóa!',
                            'Xóa bài viết thành công.',
                            'success'
                        )
                    }
                },
                error: function () {
                }

            });
        }
    });
};


$(function () {
    $(document).on('click', '.action_delete', actionDelete);

});


$(function () {
    $('#table').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "info": false
    });
});



$("input:checkbox[name=status]").change(function () {
    var status = $(this).val();
    var _token = $("input[name='_token']").val();
    let urlRequest = $(this).data('url');
    let that = $(this);
    $.ajax({
        url: urlRequest,
        type: 'POST',
        data: { _token: _token, status: status },
        success: function (data) {
            if (data.code == 200) {

                Swal.fire(
                    'Thành công',
                    'Trạng thái bài viết đã thay đổi!',
                    'success'
                ).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                });
            }
        }
    });
});

$(document).ready(function () {
    $("#myInput_table").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#table_blog tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

