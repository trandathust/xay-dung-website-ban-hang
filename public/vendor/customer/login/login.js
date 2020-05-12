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
