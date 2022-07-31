<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width , initial-scale=1.0">
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

    <div class="container mt-3">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="First Name">First Name</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="Last Name">Last Name</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->lname}}" name="lname" placeholder="Enter Second Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6">
                                    <label for="Phone">Phone</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Number">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address 1">Address 1</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6">
                                    <label for="Address 2">Address 2</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                                </div>
                                <div class="col-md-6">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->state}}" name="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-6">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->country}}" name="country" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6">
                                    <label for="Pin Code">Pin Code</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->pincode}}" name="pincode" placeholder="Pin Code">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartitems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->products->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary w-100">Place-Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

</html>