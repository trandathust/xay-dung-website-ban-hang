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

$('.checkbox_wrapper').on('click', function(){
  $(this).parents('.card-js').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
})