<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Services\WishlistService;

class WishlistController extends Controller
{
    /**
     * for storing the product to wishlist
     *
     * @param WishlistService $wishlistService
     * @param [type] $id
     * @return void
     */
    public function store(WishlistService $wishlistService,$id){
        $wishlistService->create($id);
        return redirect()->back()->with('success','Wishlist updated');
    }



    public function index(WishlistService $wishlistService){
        $wishlists = $wishlistService->index();
        if(count($wishlists) > 0){
            $products = $wishlistService->product($wishlists);
            return view('wishlist')->with('products',$products);
        } else {
            return view('wishlist')->with('message','Your wishlist is empty');
        }
        
        
    }
}
