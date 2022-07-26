<div class="card shadow product_data">
    <div>
        <input type="hidden" value="{{$products->id}}" class="product_id">
    </div>
    <div class="col-md-9">
        <button type="button" class="btn btn-success me-3 addToCartBtn float-start">Add to Cart<i class="fa fa-shopping-cart"></i></button>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('.addToCartBtn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();
            alert(product_id);
            alert(product_qty);
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
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