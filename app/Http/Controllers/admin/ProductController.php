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
     * For storing the product
     *
     * @return response()
     */
    public function store(ProductRequest $request,ProductService $productService){
        // $data = $request->validated();
        $check = $productService->create($request);
        return redirect()->back()->with('success','Great! Product created successfully');
    }
    


    /**
     * view for edit the product
     *
     * @return response()
     */
    public function edit(ProductService $productService,$id){
        $product = $productService->edit($id);
        return view('admin.product.edit', ['product' => $product]);
    }
    
    
    /**
     * For update the product
     *
     * @return response()
     */
    public function update(ProductRequest $request,ProductService $productService){
        $productService->create($request);
        return redirect()->back()->with('success','Great! Product updated successfully');
    }


    /**
     * view for edit the product
     *
     * @return response()
     */
    public function destroy(ProductService $productService,$id){
        $productService->destroy($id);
        return redirect()->back()->with('success',' Product deleted successfully');
    }
}
