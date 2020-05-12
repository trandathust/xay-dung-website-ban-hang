function actionDelete(event){
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
				success:function (data){
					if (data.code == 200){
						that.parent().parent().remove();
						Swal.fire(
							'Đã Xóa!',
							'Xóa slider thành công.',
							'success'
							)
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

$(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "info": false
    });
  });

  $("input:checkbox[name=status]").change(function(){
	var status = $(this).val(); 
	var _token = $("input[name='_token']").val();
	let urlRequest = $(this).data('url');
	let that = $(this);
	$.ajax({
		url: urlRequest,
		type: 'POST',
		data: {_token:_token,status:status},
		success: function(data){
			if (data.code == 200) {
				Swal.fire(
					'Thành công',
					'Trạng thái slider đã thay đổi!',
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
