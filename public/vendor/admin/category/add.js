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


$('.btn_category').on('click',function(event){
  $('.sub_error').hide();
  event.preventDefault();
  var _token = $("input[name='_token']").val();
  var name = $('#name').val();
  var parent_id = $('#parent_id').val();
  let urlRequest = $(this).data('url');
  $.ajax({
    url: urlRequest,
    type: 'POST',
    data: {_token:_token,name:name,parent_id:parent_id},
    success: function(data){
      if (data.code == 200) {

        Swal.fire(
          'Thêm thành công',
          );
        var id = data.id;
        var html = '<tr>';
        html += '<td>'+id+'</td>';
        html += '<td>'+name+'</td>';
        html += '<td> <a href="/admin/category/edit/'+id+'" class="btn btn-primary btn-sm" >Sửa</a>'+'<a href="" data-url ="/admin/category/delete/' + id +'" type="button" class="btn btn-danger btn-sm action_delete">Xóa</a></td></tr>' 
        $('#example2').prepend(html);
        $('#add_category')[0].reset();
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

