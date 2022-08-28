@extends('layouts.app')
@section('content')
<div class="container wishlist-container">
    <h2>Order Details</h2>
    <div style="display:flex">
        <div class="col-lg-8">
            <div class="wishlist-table-header"
                style="width:100%;padding-left:1rem;margin-bottom:25px;border-radius:3px">ORDER DETAILS</div>
            <nav class="accordion arrows">
                <input type="radio" name="accordion" id="cb1" />
                <section class="box">
                    <label class="box-title" for="cb1">DELIVERY ADDRESS</label>
                    <label class="box-close wishlist-table-header" style="padding-left:1rem" for="acc-close"><span
                            class="checkout-tag">1</span>DELIVERY ADDRESS</label>
                    <div class="box-content">
                        <div class="demo-inline-spacing mt-3">
                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input me-1" type="radio" name="address" value="">
                                    <div style="padding-left:20px">
                                        <p>
                                            <span class="delivery-personal-detail">Gourav Chauhan</span>
                                            <span class="delivery-type">HOME</span>
                                            <span class="delivery-personal-detail">8882190845</span>
                                        </p>
                                        H.NO. E-283 STREET-3 Near durga mandir, 60 feet road,DABUA COLONY, NIT
                                        FARIDABAD,
                                        Faridabad, Haryana
                                    </div>
                                </label>
                                <div>
                                    <p>+ Add New Address</p>
                                    <!-- Contact Form Begin -->
    <div class="contact-form">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="phone" placeholder="10-digit mobile number">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="pincode" placeholder="Pincode">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="locality" placeholder="Locality">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message">Address (Area and Street)</textarea>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="city" placeholder="City">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="state" placeholder="State">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="pincode" placeholder="landmark (optional)">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="locality" placeholder="Alternate Phone (optional)">
                    </div>
                    <button type="submit" class="site-btn">SAVE AND DELIVER HERE</button>
                    cancel
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
                <input type="radio" name="accordion" id="cb2" />
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
                <input type="radio" name="accordion" id="cb3" />
                <section class="box">
                    <label class="box-title" for="cb3">PAYMENT OPTION</label>
                    <label class="box-close wishlist-table-header" style="padding-left:1rem" for="acc-close"><span
                            class="checkout-tag">3</span>PAYMENT OPTION</label>

                    <div class="box-content">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                        cubilia Curae; Quisque finibus tristique nisi, maximus ullamcorper ante finibus eget.</div>
                </section>

                <input type="radio" name="accordion" id="acc-close" />
            </nav>
        </div>
        <div class="col-lg-4" style="padding-left:20px">
            <div class="shoping__checkout">
                <h5>Cart Total</h5>
                <ul>
                    <li>Subtotal (3 items) <span>₹ {{$products[1]}}</span></li>
                    <li>Delivery Charges<span>Free</span></li>
                    <li>Total <span>₹ {{$products[1]}}</span></li>
                </ul>
                <!-- <a href="{{route('checkOut')}}" class="primary-btn">PROCEED TO CHECKOUT</a> -->
            </div>
        </div>
    </div>
</div>

@endsection