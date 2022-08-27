@extends('layouts.app')
@section('content')
<div class="wishlist-container">
    <h2>My Wishlist</h2>
    @if(isset($products))
    <ul class="wishlist-responsive-table">
        <li class="wishlist-table-header">
            <div class="wishlist-col wishlist-col-1"></div>
            <div class="wishlist-col wishlist-col-1"></div>
            <div class="wishlist-col wishlist-col-2">Product name</div>
            <div class="wishlist-col wishlist-col-3">Unit Price</div>
            <div class="wishlist-col wishlist-col-3">Stock Status</div>
            <div class="wishlist-col wishlist-col-4"></div>
        </li>


        @foreach($products as $product)
        <li class="wishlist-table-row">
            <div class="wishlist-col wishlist-col-1" data-label="Job Id">
                <a href="{{route('wishlist',[$product->id])}}"><span class="icon_close wishlist-icon-close"></span></a>
            </div>

            <div class="wishlist-col wishlist-col-1" data-label="Job Id" style="padding:10px"><img
                    src="{{$product->product_main_image}}" /></div>
            <div class="wishlist-col wishlist-col-2" style="padding:0px 10px" data-label="Job Id"><a
                    style="text-decoration:none;color:#000;"
                    href="{{route('productDetail',[$product->id])}}">{{$product->title}}</a></div>
            <div class="wishlist-col wishlist-col-3" data-label="Customer Name">
                @if($product->sale_price_per_unit > 0)
                    <span class="price-per-unit">Rs {{$product->price_per_unit}}</span>
                    Rs {{$product->sale_price_per_unit}}
                @else
                    Rs {{$product->price_per_unit}}
                @endif
            </div>
            @if($product->stock_quantity > 0)
                <div class="wishlist-col wishlist-col-3" data-label="Amount">{{$product->stock_quantity}}</div>
                <div class="wishlist-col wishlist-col-4" data-label="Payment Status">
                    <form method="post" action="{{route('cart.store',[$product->id])}}">
                        @csrf
                        <input type="hidden" name="quantity" value="1" >
                        <button type="submit" class="site-btn">Add to cart</button>
                    </form>
                </div>
            @else
                <div class="wishlist-col wishlist-col-3" data-label="Amount">Out of stock</div>
                <div class="wishlist-col wishlist-col-4" data-label="Payment Status">
                        <button class="site-btn add-to-cart-disabled" disabled>Add to cart</button>
                </div>
            @endif
        </li>
        @endforeach
    </ul>
    @else
        <div class="empty-cart-main-div">
            <img src="{{asset('/assets/front/img/empty_wishlist.png')}}">
            <p class="empty-cart-message">{{$message}} <i class="fa fa-heart"></i></p>
            <p class="empty-cart-sub-message">Explore our wide selection and find something you like</p>
        </div>
    @endif
</div>
@endsection