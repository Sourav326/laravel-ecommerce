@extends('layouts.app')
@section('content')
    <div class="container wishlist-container">
        <h2>Order Details</h2>
        <div style="display:flex">
            <div class="col-lg-8">
                <div class="wishlist-table-header" style="width:100%;padding-left:1rem;margin-bottom:25px;border-radius:3px">
                    ORDER DETAILS</div>
                <nav class="accordion arrows">
                    <input type="radio" name="accordion" id="cb1" />
                    <section class="box">
                        <label class="box-title" for="cb1">DELIVERY ADDRESS</label>
                        <label class="box-close wishlist-table-header" style="padding-left:1rem" for="acc-close"><span
                                class="checkout-tag">1</span>DELIVERY ADDRESS</label>
                        <div class="box-content">
                            <div class="demo-inline-spacing mt-3">
                                <div class="list-group">
                                    @foreach($addresses as $address)
                                        <label class="list-group-item">
                                            <input class="form-check-input me-1 delivery-address-at-checkout" type="radio" name="address" value="{{$address->id}}" {{$address->is_active == 1 ? 'checked' : ''}}>
                                            <div style="padding-left:20px">
                                                <p>
                                                    <span class="delivery-personal-detail">{{$address->name}}</span>
                                                    <span class="delivery-type">{{$address->tag}}</span>
                                                    <span class="delivery-personal-detail">{{$address->phone}}</span>
                                                </p>
                                                {{$address->address}}
                                                {{$address->city}}, {{$address->state}} - {{$address->pincode}}
                                            </div>
                                        </label>
                                   @endforeach
                                    <div>
                                        <p id="add-new-address">+ Add New Address</p>
                                        <!-- Contact Form Begin -->
                                        <div class="contact-form list-group-item" style="display:none;padding:20px 0" id="new-address-form">
                                            <div class="container">
                                                <form action="{{route('address.store')}}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="name" placeholder="Name" required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="phone"
                                                                placeholder="10-digit mobile number" required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="pincode" placeholder="Pincode" required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="locality" placeholder="Locality" required>
                                                        </div>
                                                        <div class="col-lg-12 text-center">
                                                            <textarea name="address" placeholder="Address (Area and Street)" required></textarea>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="city" placeholder="City" required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="state" placeholder="State" required>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="landmark"
                                                                placeholder="landmark (optional)">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <input type="text" name="alternate_phone"
                                                                placeholder="Alternate Phone (optional)">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 delivery-tag-main-div">
                                                            <input type="radio" name="tag" value="Home" checked >
                                                            <div>Home (All day)</div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 delivery-tag-main-div">
                                                            <input type="radio" name="tag" value="Work">
                                                            <div>Work (10AM - 6PM)</div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-8">
                                                        <div style="display:flex;align-items:center">
                                                            <button type="submit" class="site-btn">SAVE AND DELIVER
                                                                HERE</button>
                                                            <div class="delivery-form-cancel-btn" id="delivery-address-from-cancel">
                                                                cancel
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Contact Form End -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <input type="radio" name="accordion" id="cb2" disabled/>
                    <section class="box">
                        <label class="box-title" for="cb2">ORDER SUMMERY</label>
                        <label class="box-close wishlist-table-header" style="padding-left:1rem" for="acc-close"><span
                                class="checkout-tag">2</span>ORDER SUMMERY</label>
                        <div class="box-content">
                            <ul class="wishlist-responsive-table">
                                @include('includes.cartitems')
                            </ul>
                        </div>
                    </section>
                    <input type="radio" name="accordion" id="cb3" disabled/>
                    <section class="box">
                        <label class="box-title" for="cb3">PAYMENT OPTION</label>
                        <label class="box-close wishlist-table-header" style="padding-left:1rem" for="acc-close"><span
                                class="checkout-tag">3</span>PAYMENT OPTION</label>

                        <div class="box-content" >
                            <div style="display: flex">

                                <form action="{{route('razorpay.payment.store')}}" method="POST" >
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="{{ $products[1] * 100 }}"
                                            data-name="ItSolutionStuff.com"
                                            data-description="Rozerpay"
                                            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                            data-prefill.name="{{auth()->user()->name}}"
                                            data-prefill.email="{{auth()->user()->email}}"
                                            data-prefill.contact="{{auth()->user()->phone}}"
                                            data-theme.color="#7fad39">
                                    </script>
                                    <input type="submit" value="Pay Now" class="site-btn">
                                </form>
                                <input value="Cash On Delivery" class="site-btn" style="margin-left:10px">
                            </div>

                        </div>
                    </section>

                    <input type="radio" name="accordion" id="acc-close" />
                </nav>
            </div>
            <div class="col-lg-4" style="padding-left:20px">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal (3 items) <span>₹ {{ $products[1] }}</span></li>
                        <li>Delivery Charges<span>Free</span></li>
                        <li>Total <span>₹ {{ $products[1] }}</span></li>
                    </ul>
                    <!-- <a href="{{ route('checkOut') }}" class="primary-btn">PROCEED TO CHECKOUT</a> -->
                </div>
            </div>
        </div>
    </div>
@endsection
