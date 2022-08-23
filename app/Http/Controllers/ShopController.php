<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ShopController extends Controller
{
    /**
     * view for show the shop page
     *
     * @return response()
     */
    public function index(ProductService $productService){
        $products = $productService->index();
        return view('shop', [
            'products' => $products
        ]);
    }

    /**
     * view for show the product detail
     *
     * @return response()
     */
    public function show(ProductService $productService,$id){
        $product = $productService->edit($id);
        $wishlist = $productService->wishlist($id);
        return view('productDetail', ['product' => $product,'wishlist' => $wishlist]);
    }
}
