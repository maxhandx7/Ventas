<div class="col-lg-4 col-md-4 col-sm-6">
    <!-- product single grid item start -->
    <div class="product-item fix mb-30">
        <div class="product-thumb">
            <a href="product-details.html">
                <img src="{{$product->images->pluck('url')[0]}}" class="img-pri"
                    alt="">
                <img src="{{$product->images->pluck('url')[1]}}" class="img-sec"
                    alt="">
            </a>
            <div class="product-label">
                <span>hot</span>
            </div>
            <div class="product-action-link">
                <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                        data-toggle="tooltip" data-placement="left"
                        title="Quick view"><i class="fa fa-search"></i></span> </a>
                <a href="#" data-toggle="tooltip" data-placement="left"
                    title="Wishlist"><i class="fa fa-heart-o"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="left"
                    title="Compare"><i class="fa fa-refresh"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="left"
                    title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
            </div>
        </div>
        <div class="product-content">
            <h4><a href="product-details.html">vertual product 01</a></h4>
            <div class="pricebox">
                <span class="regular-price">$70.00</span>
                <div class="ratings">
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span class="good"><i class="fa fa-star"></i></span>
                    <span><i class="fa fa-star"></i></span>
                    <div class="pro-review">
                        <span>1 review(s)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product single grid item end -->
    <!-- product single list item start -->
    <div class="product-list-item mb-30">
        <div class="product-thumb">
            <a href="product-details.html">
                <img src="galio/assets/img/product/product-img1.jpg" class="img-pri"
                    alt="">
                <img src="galio/assets/img/product/product-img2.jpg" class="img-sec"
                    alt="">
            </a>
            <div class="product-label">
                <span>hot</span>
            </div>
        </div>
        <div class="product-list-content">
            <h3><a href="product-details.html">virtual product 02</a></h3>
            <div class="ratings">
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span class="good"><i class="fa fa-star"></i></span>
                <span><i class="fa fa-star"></i></span>
                <div class="pro-review">
                    <span>1 review(s)</span>
                </div>
            </div>
            <div class="pricebox">
                <span class="regular-price">$70.00</span>
                <span class="old-price"><del>$90.00</del></span>
            </div>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                eirmod
                tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
            </p>
            <p>Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse
                platea
                dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris
                consequat nisi ut mauris efficitur lacinia.</p>
            <div class="product-list-action-link">
                <a class="buy-btn" href="#" data-toggle="tooltip"
                    data-placement="top" title="Add to cart">go to buy <i
                        class="fa fa-shopping-cart"></i> </a>
                <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                        data-toggle="tooltip" data-placement="top" title="Quick view"><i
                            class="fa fa-search"></i></span> </a>
                <a href="#" data-toggle="tooltip" data-placement="top"
                    title="Wishlist"><i class="fa fa-heart-o"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="top"
                    title="Compare"><i class="fa fa-refresh"></i></a>
            </div>
        </div>
    </div>
    <!-- product single list item start -->
</div> <!-- product single column end -->