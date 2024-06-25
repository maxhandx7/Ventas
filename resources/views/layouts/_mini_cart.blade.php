<div class="header-mini-cart">
    <div class="mini-cart-btn">
        <i class="fa fa-shopping-cart"></i>
        @if ($shopping_cart->quantity_of_products() != 0)
        <span class="cart-notification">{{$shopping_cart->quantity_of_products()}}</span>
        @endif
    </div>
    <div class="cart-total-price">
        <span>total</span>
       ${{number_format($shopping_cart->total_price())}}
    </div>
    <ul class="cart-list">

        @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
        <li>
            <div class="cart-img">
                <a href="{{route('web.productsDetails', $shopping_cart_detail->product)}}"><img src="{{$shopping_cart_detail->product->images->pluck('url')[0]}}" alt="{{$shopping_cart_detail->product->name}}"></a>
            </div>
            <div class="cart-info">
                <h4><a href="{{route('web.productsDetails', $shopping_cart_detail->product)}}">{{$shopping_cart_detail->product->name}}</a></h4>
                <span>$ {{number_format($shopping_cart_detail->product->sell_price)}}</span>
            </div>
            <div class="del-icon">
               <a href="{{route('shopping_cart_details.destroy',$shopping_cart_detail)}}" style="text-decoration: none"><i class="fa fa-times"></i></a> 
               <strong class="float-right" style="color: black"> x{{$shopping_cart_detail->quantity}}</strong>
            </div>
        </li>
        @endforeach

 
        <li class="mini-cart-price">
            <span class="subtotal">subtotal : </span>
            <span class="subtotal-price">$ {{number_format($shopping_cart->total_price())}}</span>
        </li>
        <li class="checkout-btn">
            <a href="#">checkout</a>
        </li>
    </ul>
</div>