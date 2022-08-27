<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    /**
     * for getting the wishlist of login user
     */
    public function index(CartService $cartService){
        $carts = $cartService->index();
        if(count($carts) > 0){
            $products = $cartService->product($carts);
            return view('cart')->with('products',$products);
        } else {
            return view('cart')->with('message','Your cart is empty');
        }
    }


    public function store(Request $request,$id,CartService $cartService){
        $cartService->store($request->all(),$id);
        return redirect()->back()->with('success','Cart Updated');
    }

    public function destroy($id,CartService $cartService){
        $cartService->destroy($id);
        return redirect()->back()->with('success','Cart Updated');
    }

    public function updateQuantity(){

    }
}
