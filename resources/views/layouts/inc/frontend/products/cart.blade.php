<div class="container my-5">
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
            </div>

            @endforeach
        </div>
    </div>
</div>