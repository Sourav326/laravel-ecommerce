@extends('layouts.app')
@section('content')


<div class="container wishlist-container">
    <h2>My Cart</h2>
    @if(isset($products))
    <div style="display:flex">
        <ul class="wishlist-responsive-table">
            <li class="wishlist-table-header">
                <div class="wishlist-col wishlist-col-1"></div>
                <div class="wishlist-col wishlist-col-1"></div>
                <div class="wishlist-col wishlist-col-3">Product name</div>
                <div class="wishlist-col wishlist-col-3">Quantity</div>
                <div class="wishlist-col wishlist-col-3">Unit Price</div>
                <div class="wishlist-col wishlist-col-4">Total</div>
            </li>

            @include('includes.cartitems')
        </ul>
        <div class="col-lg-4" style="padding-left:20px">
            <div class="shoping__checkout">
                <h5>Cart Total</h5>
                <ul>
                    <li>Subtotal (3 items) <span>₹ {{$products[1]}}</span></li>
                    <li>Delivery Charges<span>Free</span></li>
                    <li>Total <span>₹ {{$products[1]}}</span></li>
                </ul>
                <a href="{{route('checkOut')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
            </div>
            <div class="shoping__continue">
                <div class="shoping__discount">
                    <h5>Discount Codes</h5>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">APPLY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endif

@endsection