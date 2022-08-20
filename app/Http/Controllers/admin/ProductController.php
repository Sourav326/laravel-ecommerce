<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;



class ProductController extends Controller
{
    /**
     * for product listing view
     *
     * @return response()
     */
    public function index(ProductService $productService){
        $products = $productService->index();
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * view for creating the product
     *
     * @return response()
     */
    public function create(){
        return view('admin.product.create');
    }


    /**
     * view for creating the product
     *
     * @return response()
     */
    public function store(ProductRequest $request,ProductService $productService){
        $data = $request->validated();
        $check = $productService->create($data);
        return redirect()->back()->with('success','Great! Product created successfully');
    }
}
