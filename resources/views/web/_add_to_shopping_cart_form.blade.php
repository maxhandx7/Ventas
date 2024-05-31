
{!! Form::open(['route' => ['shopping_cart_details.store', $product], 'method' => 'POST', 'files' => true]) !!}
<div class="quantity-cart-box d-flex align-items-center mt-20">
    <div class="quantity">
        <div class="pro-qty"><input type="text" value="1" name="quantity"></div>
    </div>
    <div class="action_link">
        <button class="buy-btn" type="submit" style="border:none; padding:0;">add to cart<i
                class="fa fa-shopping-cart"></i> </button>
    </div>
</div>
{!! Form::close() !!}
