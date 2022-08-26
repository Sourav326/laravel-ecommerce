<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
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
        $wislists = $wishlistService->index();
        return view('wishlist')->with('wislists',$wislists);
    }
}
