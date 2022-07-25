<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="First Name">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6">
                            <label for="Last Name">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Second Name">
                        </div>
                        <div class="col-md-6">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6">
                            <label for="Address 1">Address 1</label>
                            <input type="text" class="form-control" placeholder="Enter Address 1">
                        </div>
                        <div class="col-md-6">
                            <label for="Address 2">Address 2</label>
                            <input type="text" class="form-control" placeholder="Enter Address 2">
                        </div>
                        <div class="col-md-6">
                            <label for="City">First City</label>
                            <input type="text" class="form-control" placeholder="Enter City">
                        </div>
                        <div class="col-md-6">
                            <label for="State">State</label>
                            <input type="text" class="form-control" placeholder="Enter State">
                        </div>
                        <div class="col-md-6">
                            <label for="Country">Country</label>
                            <input type="text" class="form-control" placeholder="Enter Country">
                        </div>
                        <div class="col-md-6">
                            <label for="Pin Code">Pin Code</label>
                            <input type="text" class="form-control" placeholder="Pin Code">
                        </div>
                        <div class="col-md-6">
                            <label for="First Name">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name">
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
                                <td>{{$item->products->selling_price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button class="btn btn-primary float-end">Place-Order</button>
                </div>
            </div>
        </div>
    </div>
</div>