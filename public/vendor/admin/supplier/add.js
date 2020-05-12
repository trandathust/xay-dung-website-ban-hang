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


$('.btn-submit-supplier').on('click',function(event){
  $('.sub_error').hide();
  event.preventDefault();
  var _token = $("input[name='_token']").val();
  var name = $('#name').val();
  var email = $('#email').val();
  var phone_number = $('#phone_number').val();
  var address = $('#address').val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,name:name,email:email,phone_number:phone_number,address:address},
    success: function(data){
      if (data.code == 200) {

        Swal.fire(
          'Thêm thành công',
          );
        var id = data.id;
        var html = '<tr>';
        html += '<td>'+name+'</td>';
        html += '<td>'+email+'</td>';
        html += '<td>'+phone_number+'</td>';
        html += '<td>'+address+'</td>';
        html += '<td> <a href="/admin/supplier/edit/'+id+'" class="btn btn-primary btn-sm" >Sửa</a>'+'<a href="" data-url ="/admin/supplier/delete/' + id +'" type="button" class="btn btn-danger btn-sm action_delete">Xóa</a></td></tr>' 
        $('#example2').prepend(html);
        $('#insert_supplier')[0].reset();
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