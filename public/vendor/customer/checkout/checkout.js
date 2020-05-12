$('.btn_checkout').on('click',function(event){
  $('.sub_error').hide();
  event.preventDefault();
  var _token = $("input[name='_token']").val();
  var name = $('#name').val();
  var phone_number = $('#phone_number').val();
  var address= $('#address').val();
  var message  = $('#message').val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,name:name,phone_number:phone_number,address:address,message:message},
    success: function(data){
      if (data.code == 200) {

        Swal.fire(
          'Cảm Ơn Bạn Đã Đặt Hàng! ',
          'Thông Tin Đơn Hàng Đã Được Gửi Đến Shop!',
          'success'
          ).then((result) =>{
            window.location.replace("http://localhost:8000");
          });
        
        
      }
    },
    error: function(err){
      if (err.status == 422) { // when status code is 422, it's a validation issue
        console.log(err.responseJSON);
            // $('#success_message').fadeIn().html(err.responseJSON.message);
            
            // you can loop through the errors object and show it to the user
            console.warn(err.responseJSON.errors);
            // display errors on each form field
            $.each(err.responseJSON.errors, function (i, error) {
              var el = $(document).find('[name="'+i+'"]');
              el.after($('<span class= "sub_error" style="color: red;">'+error[0]+'</span>'));
            });

          }
      if (err.status == 404) { // when status code is 422, it's a validation issue
        Swal.fire(
          'Giỏ Hàng Trống! ',
          'Hãy Chọn Thêm Các Mặt Hàng Trước Khi Thanh Toán',
          'warning'
          )

        }
      }


      });
});
