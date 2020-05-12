$(function () {
  $('#example2').DataTable({
    "paging": false,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "info": false
});
});


$("select[name='select_name']").change(function(){
  var id = $('#id').val();
  var select = $(this).val();
  var _token = $("input[name='_token']").val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    method: 'POST',
    data: {
      id:id,
      select: select,
      _token: _token
  },
  success: function(data) {
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



function actionDelete(event){
  event.preventDefault();
  let urlRequest = $(this).data('url');
  var id = $('#id').val();
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
            data: {
              id:id,
          },
          success:function (data){
              if (data.code == 200){
                Swal.fire(
                  'Đã Xóa!',
                  'Xóa đơn hàng thành công.',
                  'success'
                  ).then((result) => {if (result.value) {window.location.replace("http://localhost:8000/admin/order/view");}})
            }
        },
        error: function(){
        }

    });
      }
  });
};

$(function(){
  $(document).on('click', '.action_delete', actionDelete);

});
