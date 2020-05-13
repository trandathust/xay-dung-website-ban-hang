$(function () {
    $('#example2').DataTable({
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

function runScript(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        $(this).find('.btn_submit_search').prop('submited', $(this).prop('submited'));
    }
}


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
                            'Xóa đơn hàng thành công.',
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




$("select[name='select_id']").change(function () {
    var id = $('#id').val();
    var select = $(this).val();
    var _token = $("input[name='_token']").val();
    let urlRequest = $(this).data('url');
    $.ajax({
        url: urlRequest,
        method: 'POST',
        data: {
            id: id,
            select: select,
            _token: _token
        },
        success: function (data) {
            if (data.code == 200) {
                Swal.fire(
                    'Thành Công!',
                    'Trạng thái đơn hàng đã thay đổi',
                    'success'
                );
            }
        }
    });
});


