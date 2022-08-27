<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CartService;

class ShopController extends Controller
{
    /**
     * view for show the shop page
     *
     * @return response()
     */
    public function index(ProductService $productService,CartService $cartService){
        $products = $productService->index();
        foreach($products as $product){
            $wishlist = $productService->wishlist($product->id);
            $cart = $cartService->cart($product->id);
            if($wishlist){
                $product['whistlist'] = 1;
            } else{
                $product['whistlist'] = 0;
            }
            if($cart){
                $product['cart'] = 1;
            } else{
                $product['cart'] = 0;
            }
            $productArray[] = $product;
        }
        return view('shop', [
            'products' => $productArray,
        ]);
    }

    /**
     * view for show the product detail
     *
     * @return response()
     */
    public function show(ProductService $productService,$id,CartService $cartService){
        $product = $productService->edit($id);
        $wishlist = $productService->wishlist($id);
        $cart = $cartService->cart($id);
        return view('productDetail', [
            'product' => $product,
            'wishlist' => $wishlist,
            'cart' => $cart
        ]);
    }
}
