@extends('layouts.app')
@section('content')


<div class="wishlist-container">
    <h2>My Cart</h2>
    @if(isset($products))
        <ul class="wishlist-responsive-table">
            <li class="wishlist-table-header">
                <div class="wishlist-col wishlist-col-1"></div>
                <div class="wishlist-col wishlist-col-1"></div>
                <div class="wishlist-col wishlist-col-2">Product name</div>
                <div class="wishlist-col wishlist-col-3">Unit Price</div>
                <div class="wishlist-col wishlist-col-3">Quantity</div>
                <div class="wishlist-col wishlist-col-4">Total</div>
            </li>

            @foreach($products as $product)
                <li class="wishlist-table-row">
                    <div class="wishlist-col wishlist-col-1" data-label="Job Id">
                        <a href="{{route('cart.destroy',[$product->id])}}"><span class="icon_close wishlist-icon-close"></span></a>
                    </div>
                    <div class="wishlist-col wishlist-col-1" data-label="Job Id" style="padding:10px"><img
                            src="{{$product->product_main_image}}"></div>
                    <div class="wishlist-col wishlist-col-2" style="padding:0px 10px" data-label="Job Id"><a
                            style="text-decoration:none;color:#000;" href="{{route('productDetail',[$product->id])}}">{{$product->title}}</a></div>
                    <div class="wishlist-col wishlist-col-3" data-label="Customer Name">Rs {{ $product->price }}</div>
                    <div class="wishlist-col wishlist-col-3" data-label="Customer Name">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" value="{{$product->quantity}}">
                            </div>
                        </div>
                        
                    </div>
                    <div class="wishlist-col wishlist-col-3" data-label="Customer Name">RS {{$product->total}}</div>
                </li>
            @endforeach
        </ul>
    @else
        <div class="empty-cart-main-div">
            <img src="{{asset('/assets/front/img/cart/empty_cart.png')}}">
            <p class="empty-cart-message">{{$message}} <i class="fa fa-shopping-bag"></i></p>
            <p class="empty-cart-sub-message">Explore our wide selection and find something you like</p>
        </div>
    @endif
</div>

@if(isset($products))
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{route('shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>$454.98</span></li>
                        <li>Total <span>$454.98</span></li>
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endif

@endsection