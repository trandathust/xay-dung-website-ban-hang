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
							'Xóa người dùng thành công',
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

function actionOff(event){
	event.preventDefault();
	let urlRequest = $(this).data('url');
	
	let that = $(this);
	Swal.fire({
		title: 'Xác nhận nghỉ làm?',
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
						window.location.reload();
						Swal.fire(
							'Đã Xong!',
							'Người này đã chuyển sang nghỉ làm',
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
	$(document).on('click', '.action_off', actionOff);
	
});





function actionRestore(event){
	event.preventDefault();
	let urlRequest = $(this).data('url');
	
	let that = $(this);
	Swal.fire({
		title: 'Xác nhận?',
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
						window.location.reload();
						Swal.fire(
							'Đã Xong!',
							'Người này đã đi làm trở lại',
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
	$(document).on('click', '.action_restore', actionRestore);
	
});