@if(Session::has('cartMsg'))

<p class="alert
{{ Session::get('alert-class', 'alert-info') }}">{{Session::get('cartMsg') }}</p>

@endif
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

<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                <button class="button" class="btn btn-secondary" data-dismiss="modal">Remove</button>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    </div>
    </div>

</body>

</html>