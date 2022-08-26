@extends('layouts.app')
@section('content')
    <div class="wishlist-container">
        <h2>My Wishlist</h2>
        <ul class="wishlist-responsive-table">
            <li class="wishlist-table-header">
                <div class="wishlist-col wishlist-col-1"></div>
                <div class="wishlist-col wishlist-col-1">Product anme</div>
                <div class="wishlist-col wishlist-col-2">Unit Price</div>
                <div class="wishlist-col wishlist-col-3">Stock Status</div>
                <div class="wishlist-col wishlist-col-4"></div>
            </li>

            <li class="wishlist-table-row">
                <div class="wishlist-col wishlist-col-1" data-label="Job Id">42235</div>
                <div class="wishlist-col wishlist-col-1" data-label="Job Id">42235</div>
                <div class="wishlist-col wishlist-col-2" data-label="Customer Name">John Doe</div>
                <div class="wishlist-col wishlist-col-3" data-label="Amount">$350</div>
                <div class="wishlist-col wishlist-col-4" data-label="Payment Status">Pending</div>
            </li>
        </ul>
    </div>
@endsection
