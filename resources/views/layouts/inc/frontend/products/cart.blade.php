@if(Session::has('cartMsg'))

<p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('cartMsg') }}</p>

@endif
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width , initial-scale=1.0">
    <title>PreLoved</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
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

    @foreach($cartitems as $item)

    <div class="class container">
        <div class="row">
            <table class="table table-hover">
                <tr>
                    <th width="50%">Product</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Subtotal</th>
                    <th width="10%"></th>
                </tr>
                <!-- @php $total=0;
                @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id=>$product)
                @endforeach
                @endif -->
                <tr>
                    <td>
                        <div class="class cart-info">
                            <img src="{{ asset('uploads/product/'.$item->image) }}" alt="Product" />
                            <div>


                                <!-- <small>{{$item->price}}</small> -->

                            </div>

                        </div>
                    </td>
                    <td>
                        <p>{{$item->price}}</p>
                    </td>
                    <td>
                        <p>{{$item->quantity }}</p>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    @endforeach
    <button onclick="location.href='/';" class="btn btn -info">
        <i class="fa fa-search" aria-hidden="true"></i> Back to shop!</button>
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