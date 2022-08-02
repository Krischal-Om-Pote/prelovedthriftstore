@if(Session::has('cartMsg'))

<p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('cartMsg') }}</p>

@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width , initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PreLoved</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/js/bootstrap.bundle.mins') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/js/jquery-3.6.0.min.js') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

@livewireStyles

<body>



    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{ asset('assets/image/logo.png') }}" width="150px"></a>

                </div>
                <nav>
                    <ul id="MenuItems ">
                        @guest
                        <li><a href="{{ url('/login') }}">LOGIN</a></li>
                        <li><a href="{{ url('/register') }}">REGISTER</a></li>
                        @endguest

                    </ul>

                </nav>
                <a href="{{url('/cart')}}"><img src=" {{ asset('assets/image/cart.png') }}" width="60px" height="60px"></a>
                <img src="{{ asset('assets/image/menu.png') }}" class="menu-icon" on click="menutoggle()">
            </div>
        </div>
    </div>
    <!-- Cart body -->

    <!-- <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">
                    Your Shopping Cart
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-image">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartitems as $item)

                        <div class="row">
                            <div class="col-md-2">
                                <img src="" alt="Image here">
                            </div>
                            <div class="col-md-5">
                                <div src="{{asset('admin.product')}}"></div>
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group-text-center mb-3" style="width:130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="button" class="btn btn-secondary" data-dismiss="modal">Remove</button>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    </div> -->

    <!-- @foreach($cartitems as $item)

    <div class="class container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50%">Product</th>
                        <th width="10%">Price</th>
                        <th width="8%">Quantity</th>
                        <th width="22%">Subtotal</th>
                        <th width="10%"></th>
                    </tr>
                </thead>

                 @php $total=0;
                @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id=>$product)
                @endforeach
                @endif -->
    <!-- <tbody>
                    <tr>
                        <td>
                            <div class="class cart-info">
                                <img src="{{ asset('uploads/product/'.$item->image) }}" alt="Product" class="img-fluid img-thumbnail" width="80px" />
                                <div> -->


    <!-- <small>{{$item->price}}</small> -->
    <!-- 
                                </div>

                            </div>
                        </td>
                        <td>
                            <p>{{$item->price}}</p>
                        </td>
                        <td>
                            <p>
                            <div class="input-group-text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn" id="down">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->quantity }}" id="total-count">
                                <button class="input-group-text increment-btn" id="up">+</button>
                            </div>
                            </p>
                        </td>
                        <td>

                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div> -->

    @endforeach
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @php $total=0; @endphp
                @foreach($cartitems as $item)
                <div class="row product_data">
                    <div class="col-md-2 ">
                        <img src="{{asset('uploads/product/'.$item->image)}}" alt="Image here" width="80px" height="80px">
                    </div>
                    <div class="col-3">
                        <label>{{$item->products->name}}</label>
                    </div>
                    <div class="col-1">

                        <label>Rs {{$item->price}}</label>
                    </div>
                    <div class="col-3 ">
                        <input type="hidden" class="prod_id" value="{{$item->product_id}}">
                        @if($item->quantity)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group-text-center mb-3" style="width:130px;">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <!-- <input type="text" class="product_hidden_price" value="{{$item->price}}"> -->
                            <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->quantity}}">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                        @php $total+=$item->price*$item->quantity; @endphp
                        @else
                        <h6>Out of Stock</h6>
                        @endif
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i></button>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="card-footer">
                <h6>Total Price: Rs {{$total}}
                    <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a href="/" class="btn btn-info" type="button">
                <i class="fa fa-search" aria-hidden="true"></i> Back to shop!</a>
        </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>DOWNLOAD YOUR APP HERE</h3>
                    <p>Available in both android and ios</p>
                    <div class="app-logo">
                        <img src="{{ asset('assets/image/app-store.png') }}">
                        <img src="{{ asset('assets/image/play-store.png') }}">


                    </div>
                </div>
                <div class="footer-col-1">
                    <img src="{{ asset('assets/image/logo.png') }}">
                    <p>Our purpose is to provide good clothes in reasonable price</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join affiliate</li>
                    </ul>

                </div>
                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                        <li>Twitter</li>
                    </ul>

                </div>



            </div>
            <hr>
            <p class="copyright">Copyright 2022</p>
        </div>
    </div>
</body>
<script>
    // Select total count
    // const totalCount = document.getElementById("total-count");

    // Variable to track count
    // var count = 0;

    // Display initial count value
    // totalCount.innerText = count;
    $('.increment-btn').click(function(e) {
        console.log("up");
        e.preventDefault();
        var inc_value = parseInt($(this).closest('.product_data').find('.qty-input').val());
        // var price = arseInt($(this).closest('.product_data').find('.product_hidden_price').val());
        // var total = inc_value * price
        var value = parseInt(inc_value, 10);

        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);


        }


    });

    $('.decrement-btn').click(function(e) {
        console.log("down");
        e.preventDefault();
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var price = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        // value = isNan(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }


    });
    $('.delete-cart-item').click(function(e) {
        console.log("here");

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: "POST",
            url: "{{url('delete-cart-item')}}",
            data: {
                'prod_id': prod_id,
            },
            sucess: function(response) {
                location.reload(true);
                swal("", response.status, "success");
            }


        });

    });
    $('.changeQuantity').click(function(e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        // console.log(qty);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "{{url('update-cart')}}",
            data: {
                'prod_id': prod_id,
                'prod_qty': qty,
            },
            sucess: function(response) {
                // console.log(response);
                location.reload(true);
                // window.location.reload();
                // swal("", response.status, "success");
            }


        });

    });

    // const handleIncrement = () => {
    //     // count++;
    //     // totalCount.innerText = count;

    //     let count = $("#total-count").val();
    //     count = parseInt(count) + 1;
    //     $("#total-count").val(count);

    // };
    // const handleDecrement = () => {
    //     let count = $("#total-count").val();
    //     count = parseInt(count) - 1;
    //     $("#total-count").val(count);
    // };
    // const incrementCount = document.getElementById("up");
    // const decrementCount = document.getElementById("down");

    // // Add click event to buttons
    // incrementCount.addEventListener("click", handleIncrement);
    // decrementCount.addEventListener("click", handleDecrement);
</script>

</html>

<!-- <div class="container my-5">
    <div class="card shadow product_data">
        <div class="card-body">
            @foreach($cartitems as $item)

            <div class="row">
                <div class="col-md-2">
                    <img src="{{asset('')}}" alt="Image here">
                </div>
                <div class="col-md-5">
                    <h3>Product Name Here</h3>
                </div>
                <div class="col-md-3">
                    <input type="hidden" class="prod_id">
                    <label for="Quantity">Quantity</label>
                    <div class="input-group-text-center mb-3" style="width:130px;">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>Remove</h3>
                </div>
            </div> -->

<!-- @endforeach
        </div>
    </div>
</div> -->