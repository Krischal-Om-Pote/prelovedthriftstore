<div>
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
                        <img src="{{ asset('assets/image/logo.png') }}" width="150px">

                    </div>
                    <nav>
                        <ul id="MenuItems ">
                            <li><a href="">HOME</a></li>
                            <li><a href="">PRODUCTS</a></li>
                            <li><a href="">ABOUT US</a></li>
                            <li><a href="">CONTACT US</a></li>
                            <li><a href="">ACCOUNTS</a></li>
                            @guest
                            <li><a href="{{ url('/login') }}">LOGIN</a></li>
                            <li><a href="{{ url('/register') }}">REGISTER</a></li>
                            @endguest

                        </ul>

                    </nav>
                    <img src=" {{ asset('assets/image/cart.png') }}" width="60px" height="60px">
                    <img src="{{ asset('assets/image/menu.png') }}" class="menu-icon" on click="menutoggle()">
                </div>
                <div class="row">
                    <div class="col-2">
                        <h1>Pre loved<br>Is<br>Re loved</h1>
                        <a href="" class="btn">VIEW COLLECTION &#10148;</a>


                    </div>
                    <div class="col-2">
                        <img src="{{ asset('assets/image/image1.png') }}">
                    </div>

                </div>

            </div>
        </div>
        <!----------catagories-------------->
        <div class="catagories">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ asset('assets/image/catagory-2.jpg') }}" />
                    </div>
                    <div class=" col-3">
                        <img src="{{ asset('assets/image/catagory-3.jpg') }}">
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('assets/image/catagory-4.jpg') }}">
                    </div>
                </div>

            </div>

        </div>
        <!----------products-------------->
        <div class="small-container">
            <h2 class="title">New Collection</h2>
            <div class="row">
                <!-- <div class="col-4">
                <img src="{{ asset('assets/image/product-1.jpg') }}">
                <h3>Black Half Sleeve Tshirt</h3>
                <h4>M,L,XL</h4>
                <p>NRS 1000</p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/product-2.jpg') }}">
                <h3>White Half Sleeve Tshirt</h3>
                <h4>M,L,XL</h4>
                <p>NRS 1000</p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/product-3.jpg') }}">
                <h3>Grey Half Sleeve Tshirt</h3>
                <h4>M,L,XL</h4>
                <p>NRS 1000</p>
            </div>
            <div class="col-4">
                <img src="{{ asset('assets/image/product-4.jpg') }}">
                <h3>Beige Half Sleeve Tshirt</h3>
                <h4>M,L,XL</h4>
                <p>NRS 1000</p>
            </div> -->
                @foreach($newCollections as $product)
                <div class="col-4">
                    <img src="{{ asset('assets/image/product5.jpg') }}">
                    <h3>{{ $product->name }}</h3>
                    <h4>M,L,XL</h4>
                    <p>Rs.{{ $product->price }}</p>
                    <div class="card shadow product_data">
                        <div>
                        </div>
                        <div class="col-md-9">
                            <button wire:click="addToCart({{ $product->id }})" type="button" class="btn btn-success me-3 Btn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>

                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            <h2 class="title">Best Sellers</h2>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('assets/image/product1.jpg') }}">
                    <h3>Black Half Sleeve Tshirt</h3>
                    <h4>M,L,XL</h4>
                    <p>NRS 1000</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('assets/image/product6.jpg') }}">
                    <h3>White Full Sleeve Tshirt</h3>
                    <h4>M,L,XL</h4>
                    <p>NRS 1250</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('assets/image/product12.jpg') }}">
                    <h3>Grey Crop Tshirt</h3>
                    <h4>M,L,XL</h4>
                    <p>NRS 950</p>
                </div>
            </div>
        </div>
        <!----------sale---------->
        <div class="offer">
            <div class="small-container">
                <div class="col-2">
                    <img src="{{ asset('assets/image/sale.png') }}" class="offer-img">

                </div>
                <div class="col-2">
                    <p>EXCLUSIVE SALE PRICES</p>
                    <H1>BUY ALL 4 FOR REDUCED PRICES</H1>
                    <small>Buy any 4 of our product including tshirt , crop tshirt or a full sleeve product for a heavily reduced price.</small>
                    <p><a href="" class="btn">BUY NOW &#10148;</a></p>

                </div>

            </div>


        </div>
        <div class="brands">
            <div class="small-container">
                <div class="row">
                    <div class="col-5">
                        <img src="{{ asset('assets/image/adgrey.png') }}">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset('assets/image/vlone.png') }}">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset('assets/image/ow.png') }}">
                    </div>
                    <div class="col-5">
                        <img src="{{ asset('assets/image/awge.png') }}">
                    </div>

                </div>
            </div>
        </div>
        <!footer>
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
                    <p class="copyright">Copyright 2020</p>

                </div>

            </div>
            <script>
                var MenuItems = document.getElementById("Menu Items");
                MenuItems.style.maxHeight = "0px";

                function menutoggle() {
                    if (MenuItems.style.maxHeight = "200px") {} else {
                        MenuItems.style.maxHeight = "0px";
                    }
                }
            </script>
            <script>
                $(document).ready(function() {
                    $('.addToCartBtn').click(function(e) {
                        console.log('hi');
                        e.preventDefault();
                        var product_id = getElementById('prod_id').val();
                        var product_qty = getElementById('qty-input').val();
                        console.log(product_id);
                        console.log(product_qty);
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: "/add-to-cart",
                            data: {
                                'product_id': product_id,
                                'product_qty': product_qty,
                            },
                            success: function(response) {
                                swal(response.status);
                            }

                        });
                    });


                });
            </script>
            @livewireScripts
    </body>

    </html>
</div>