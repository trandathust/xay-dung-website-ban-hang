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


 $('.btn-submit-icon').on('click',function(event){
  $('.sub_error').hide();
  event.preventDefault();
  var _token = $("input[name='_token']").val();
  var id = $('#id').val();
  var name = $('#name').val();
  var config_value = $('#config_value').val();
  var config_key = $('#config_key').val();
  let urlRequest = $(this).data('url');

  var modal = $(this);
      modal.find('#name').val(name);
      modal.find('#config_value').val(config_value);
      modal.find('#config_key').val(config_key);

  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,id:id,name:name,config_key:config_key,config_value:config_value},
    success: function(data){
      if (data.code == 200) {
        $('#insert_icon').modal().hide();
          location.reload();

        Swal.fire(
          'Sửa thành công',
          );
        
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
    }
  });
  
});

$('.btn_submit_genaral').on('click',function(event){
  $('.sub_error').hide();
  event.preventDefault();
  var _token = $("input[name='_token']").val();
  var name = "fake_name";
  var config_key = "fake_configkey";
  var config_value = "fake_configvalue";
  var phone_number = $('#phone_number').val();
  var email = $('#email').val();
  var footer = $('#footer').val();
  var address = $('#address').val();
  var google_map = $('#google_map').val();
  var feeship = $('#feeship').val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,feeship:feeship,phone_number:phone_number,email:email,footer:footer,address:address,google_map:google_map},
    success: function(data){
      if (data.code == 200) {
        Swal.fire(
          'Sửa thành công',
          );
      }
    },
    error: function(err){
      if (err.status == 422) { // when status code is 422, it's a validation issue
            console.log(err.responseJSON);
            $('#success_message').fadeIn().html(err.responseJSON.message);

            // you can loop through the errors object and show it to the user
            console.warn(err.responseJSON.errors);
            // display errors on each form field
            $.each(err.responseJSON.errors, function (i, error) {
                var el = $(document).find('[name="'+i+'"]');
                el.after($('<span class= "sub_error" style="color: red;">'+error[0]+'</span>'));
            });
        }
    }
  });
});

$(document).ready(function(){

 $('#upload_form').on('submit', function(event){
  event.preventDefault();
  let urlRequest = $(this).data('url');
  $.ajax({
   url: urlRequest,
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    if (data.code == 200) {
        Swal.fire(
        'Xong!',
        'Đã cập nhật logo',
        'success'
        );
        window.location.reload();
      }
   }
  })
 });

});