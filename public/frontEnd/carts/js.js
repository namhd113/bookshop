function updateCartItem(event) {
    event.preventDefault();
    let quantity = $(this).parents('tr').find('input.quantity').val();
    let id = $(this).data('id');
    let url = $('.update_cart_url').data('url');

    $.ajax({
        type: "GET",
        url: url,
        data: {
            'id': id,
            'quantity': quantity
        },
        dataType: "json",
        success: function (data) {

                $('.update_cart_url tbody tr').remove();
                $('.update_cart_url tbody').append(data);
                alert('cap nhat thanh cong');
        },
        error: function (data){
            alert('update error');
        }

    })
}

$(document).ready(function () {
    $('.update-cart-item').on('click', updateCartItem);
});
