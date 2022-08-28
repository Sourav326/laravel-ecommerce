
        
            @foreach($products[0] as $product)
            <li class="wishlist-table-row">
                <div class="wishlist-col wishlist-col-1" data-label="Job Id">
                    <a href="{{route('cart.destroy',[$product->id])}}"><span
                            class="icon_close wishlist-icon-close"></span></a>
                </div>
                <div class="wishlist-col wishlist-col-1" data-label="Job Id" style="padding:10px"><img
                        src="{{$product->product_main_image}}"></div>
                <div class="wishlist-col wishlist-col-3" style="padding:0px 10px" data-label="Job Id"><a
                        style="text-decoration:none;color:#000;"
                        href="{{route('productDetail',[$product->id])}}">{{Str::limit($product->title, 15, $end='...')}}</a>
                </div>
                <div class="wishlist-col wishlist-col-3" data-label="Customer Name">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input type="text" value="{{$product->quantity}}">
                        </div>
                    </div>

                </div>
                <div class="wishlist-col wishlist-col-3" data-label="Customer Name">₹ {{ $product->price }}</div>
                <div class="wishlist-col wishlist-col-3" data-label="Customer Name">₹ {{$product->total}}</div>
            </li>
            @endforeach