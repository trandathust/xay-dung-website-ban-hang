$('.btn_add_to_cart').on('click', function (event) {
    event.preventDefault();
    var _token = $("input[name='_token']").val();
    var id = $('#id').val();
    var quantity = $('#quantity').val();
    let urlRequest = $(this).data('url');
    $.ajax({
        url: urlRequest,
        type: 'POST',
        data: { _token: _token, id: id, quantity: quantity },
        success: function (data) {
            if (data.code == 200) {

                Swal.fire(
                    'Xong!',
                    'Đã Thêm Vào Giỏ Hàng',
                    'success'
                )
            }
        },
        error: function (err) {
            if (err.status == 422) { // when status code is 422, it's a validation issue
                console.log(err.responseJSON);
                // $('#success_message').fadeIn().html(err.responseJSON.message);

                // you can loop through the errors object and show it to the user
                console.warn(err.responseJSON.errors);
                // display errors on each form field
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.after($('<span class= "sub_error" style="color: red;">' + error[0] + '</span>'));
                });
            }
        }
    });

});



$(".update-cart").click(function (e) {
    e.preventDefault();

    var ele = $(this);
    let urlRequest = $(this).data('url');
    var _token = $("input[name='_token']").val();
    var id = ele.attr("data-id");
    var note = ele.attr("data-note");
    var quantity = ele.parents("tr").find(".quantity").val();
    $.ajax({
        url: urlRequest,
        method: "patch",
        data: { _token: _token, id: id, quantity: quantity, note: note },
        success: function (response) {
            window.location.reload();
        }
    });
});

$(".remove-from-cart").click(function (e) {
    e.preventDefault();

    var ele = $(this);
    let urlRequest = $(this).data('url');
    var _token = $("input[name='_token']").val();
    Swal.fire({
        title: 'Bạn chắc chứ?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác Nhận'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: urlRequest,
                method: "DELETE",
                data: { _token: _token, id: ele.attr("data-id") },
                success: function (response) {
                    window.location.reload();
                }
            });

            Swal.fire(
                'Đã Xóa!',
                'Sản phẩm đã bị xóa.',
                'success'
            )
        }
    })


});



$('.btn_add_to_cart_detail').on('click', function (event) {
    event.preventDefault();
    var _token = $("input[name='_token']").val();
    var id = $('#id').val();
    var quantity = 1;
    let urlRequest = $(this).data('url');
    $.ajax({
        url: urlRequest,
        type: 'POST',
        data: { _token: _token, id: id, quantity: quantity },
        success: function (data) {
            if (data.code == 200) {

                Swal.fire(
                    'Xong!',
                    'Đã Thêm Vào Giỏ Hàng',
                    'success'
                )
            }
        },
        error: function (err) {
            if (err.status == 422) { // when status code is 422, it's a validation issue
                console.log(err.responseJSON);
                // $('#success_message').fadeIn().html(err.responseJSON.message);

                // you can loop through the errors object and show it to the user
                console.warn(err.responseJSON.errors);
                // display errors on each form field
                $.each(err.responseJSON.errors, function (i, error) {
                    var el = $(document).find('[name="' + i + '"]');
                    el.after($('<span class= "sub_error" style="color: red;">' + error[0] + '</span>'));
                });
            }
        }
    });

});



$('.btn_add_to_cart_checkout').on('click', function (event) {
    event.preventDefault();
    var _token = $("input[name='_token']").val();
    var id = $('#id').val();
    var quantity = $('#quantity').val();
    let urlRequest = $(this).data('url');
    $.ajax({
        url: urlRequest,
        type: 'POST',
        data: { _token: _token, id: id, quantity: quantity },
        success: function (data) {
            if (data.code == 200) {
                window.location.reload();
            }
        }
    });

});


// $('.btn_buy_now').on('click', function (event) {
//     event.preventDefault();
//     var _token = $("input[name='_token']").val();
//     var id = $('#id').val();
//     var quantity = $('#quantity').val();
//     let urlRequest = $(this).data('url');
//     $.ajax({
//         url: urlRequest,
//         type: 'POST',
//         data: { _token: _token, id: id, quantity: quantity },
//         success: function (data) {
//             if (data.code == 200) {
//                 window.location.reload("http://localhost:8000/checkout");
//             }
//         }
//     });

// });
