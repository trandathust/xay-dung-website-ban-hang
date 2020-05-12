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
  var name = $('#name').val();
  var config_value = $('#config_value').val();
  var config_key = $('#config_key').val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,name:name,config_key:config_key,config_value:config_value},
    success: function(data){
      if (data.code == 200) {

        Swal.fire(
          'Thêm thành công',
          'Đã thêm thông tin liên hệ',
          'success'
          );
        var id = data.id;
        var html = '<tr>';
        html += '<td>'+name+'</td>';
        html += '<td>'+config_value+'</td>';
        html += '<td align="center"><i class="'+ config_key + '"></i></td>';
        html += '<td> <a href="/admin/setting/edit/'+id+'" class="btn btn-primary btn-sm" >Sửa</a>'+'<a href="" data-url ="/admin/setting/delete/' + id +'" type="button" class="btn btn-danger btn-sm action_delete">Xóa</a></td></tr>' 
        $('#example2').prepend(html);
        $('#insert_icon')[0].reset();
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
  var google_map= $('#google_map').val();
  var feeship = $('#feeship').val();
  var nameshop = $('#nameshop').val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,phone_number:phone_number,email:email,footer:footer,address:address,google_map:google_map,feeship:feeship,nameshop:nameshop},
    success: function(data){
      if (data.code == 200) {
        Swal.fire(
        'Xong!',
        'Đã cập nhật thông tin',
        'success'
        )
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