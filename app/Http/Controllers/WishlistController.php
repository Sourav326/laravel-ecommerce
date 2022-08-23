<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Services\WishlistService;

class WishlistController extends Controller
{
    public function store(WishlistService $wishlistService,$id){
        $wishlistService->create($id);
        return redirect()->back()->with('success','Added to wishlist');
    }
}
