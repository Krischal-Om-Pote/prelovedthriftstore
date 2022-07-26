  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width-device-width , initial-scale=1.0">
      <title>PreLoved</title>
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <!-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}"> -->

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                          <li>
                              <div class="search-container">
                                  <form action="{{url('/search')}}">
                                      <input type="search" placeholder="Search.." name="query" style="height: 30px;margin-top: 9px;">
                                      <button type="submit"><i class="fa fa-search"></i></button>
                                  </form>
                              </div>

                          </li>
                          @guest
                          <li><a href="{{ url('/login') }}">LOGIN</a></li>
                          <li><a href="{{ url('/register') }}">REGISTER</a></li>
                          @endguest
                          @if(auth()->check())
                          <li>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                                  <button type="submit">{{ __('Logout') }}</button>
                              </form>
                          </li>


                          @endif

                      </ul>

                  </nav>
                  <a href="{{url('/cart')}}"><img src=" {{ asset('assets/image/cart.png') }}" width="60px" height="60px"></a>
                  <img src="{{ asset('assets/image/menu.png') }}" class="menu-icon" on click="menutoggle()">
              </div>

              <div class="row">
                  <div class="col-2">
                      <h1>Pre loved<br>Is<br>Re loved</h1>
                      <a href="" class="btn">VIEW COLLECTION &#10148;</a>


                  </div>
                  @if(session('status'))
                  <div style="color:#5cb85c;">{{session('status')}}</div>
                  @endif
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
              @foreach($newCollections as $product)
              <div class="col-4">
                  <img src="{{ asset('uploads/product/'.$product->image) }}" />
                  <h3>{{ $product->name }}</h3>
                  <h4>M,L,XL</h4>
                  <p>Rs.{{ $product->price }}</p>
                  @if($product->quantity>0)
                  <label class="bage bg-success">In stock</label>
                  @else
                  <label class="bage bg-danger">Out stock</label>
                  @endif
                  <div class="card shadow product_data">
                      <div>
                      </div>
                      <div class="col-md-9">
                          @if($product->quantity>0)
                          <button wire:click="addToCart({{ $product->id }})" type="button" class="btn btn-success me-3 Btn float-start">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                          @endif
                      </div>
                  </div>
              </div>

              @endforeach

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