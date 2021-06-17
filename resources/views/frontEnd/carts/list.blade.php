<div class="row">
    <div class="card col-md-12">
        <div class="card-header">
            List items
        </div>
        <div class="card-body">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($cart->items as $key => $item)
                    <tr>
                        <th scope="row">{{$item['product']->name}}</th>
                        <td><img src="{{asset('/storage/'.$item['product']->avatar )}}" alt=""
                                 style="width: 50px; height: 50px; border-radius: 50%"></td>
                        <td>{{number_format($item['product']->price)}}</td>
                        <td>
                            <input style="width: 80px" min="1" type="number" class="quantity" value="{{$item['totalQuantity']}}">
                        </td>
                        <td>{{number_format($item['totalPrice'])}}</td>
                        <td>
                            <div class="col"  style="display: inline-flex">
                                <div style="margin: 0 10px; font-size: 20px; padding: 5px">
                                    <span class="update-cart-item"  data-id="{{$key}}"><i class="fa fa-edit"></i></span>
                                    {{--                                                    <a href="" class="cart-update"  style="font-size: 20px;">--}}
                                    {{--                                                        --}}
                                    {{--                                                    </a>--}}
                                </div>
                                <div style="margin: 0 10px;font-size: 20px; padding: 5px ">
                                    <span class="delete-cart-item" data-url="{{route('cart.remove', $key)}}" style="color: red">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6"></td>
                </tr>
                <tr>
                    <td><h4>Total Quantity</h4></td>
                    <td colspan="5"><h4>{{$cart->totalQuantity}}</h4></td>
                </tr>
                <tr>
                    <td><h4>Total Price</h4></td>
                    <td colspan="5"><h4>{{number_format($cart->totalPrice)}} VND</h4></td>
                </tr>
                </tbody>

            </table>
            <div style="display: inline-flex; justify-content: space-between" class="col-md-12">
                
                <div>
                    <a href="{{route('cart.delete')}}" onclick="return confirm('Empty cart')" class="btn btn-danger">delete</a>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">

        </div>
    </div>
</div>

    <script>
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
                    'quantity': quantity,
                },
                dataType: "json",
                success: function (data) {
                    if (data.code === 200){
                        $('.cart-container').html(data.cartRender);
                        $('#total_quantity').html('(' + data.totalQuantity + ')');
                        // alert('cap nhat thanh cong');
                    }
                    // $('.cart-container').html(data);
                },
                error: function (data){
                    alert('update error');
                }
            })
        }
        function removeItem(){
            if(confirm("Are you sure you want to delete this?")){
                let url = $(this).data('url');
                $.ajax({
                   type:"GET",
                   url: url,
                   dataType: "json",
                    success: function (data){
                        if (data.code === 200){
                            $('.cart-container').html(data.cartRender);
                            $('#total_quantity').html('(' + data.totalQuantity + ')');
                        }
                    }
                });
            }
            else{
                return false;
            }
        }
        $(document).ready(function () {
            $('.update-cart-item').on('click', updateCartItem);
            $('.delete-cart-item').on('click',removeItem);
        });
    </script>

