<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class ProductService
{

    /**
     * for fetching all products
     *
     * @return response()
     */
    public function index(){
        return $products = Product::paginate(5);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(Request $request)
    {
        //upload product main image
        if ($request->hasFile('product_main_image')) {
            $product_main_image = Storage::disk('public')->put($request->file('product_main_image'), $request->file('product_main_image'));
            // $product_main_image = $request->file('product_main_image')->store('public/images/products');
        }
        
        //Upload product other images
        if ($request->hasFile('product_other_images')) {
            foreach($request->file('product_other_images') as $productOtherImage){
                echo $productOtherImage;
            }
            $product_other_images = $request->file('product_other_images')->store('images/products/'.$product_main_image);
        }
        exit();


        //Create product
        $product = Product::create([
                    'title' => $request->title,
                    'product_unique_code' => $request->product_unique_code,
                    'price_per_unit' => $request->price_per_unit,
                    'sale_price_per_unit' => $request->sale_price_per_unit,
                    'status' => $request->status,
                    'stock_quantity' => $request->stock_quantity,
                    'stock_quantity_to_order' => $request->stock_quantity_to_order,
                    'tax_percentage' => $request->tax_percentage,
                    'estimated_shipping_days' => $request->estimated_shipping_days,
                    'description' => $request->description,
                    'delivery_charges' => $request->delivery_charges,
                    'weight' => $request->weight,
                    'color' => $request->color,
                    'product_main_image' => $product_main_image,
                ]);

      return $product;
    }


    /**
     * For edit the product
     *
     * @return response()
     */
    public function edit($id){
        return $products = Product::findOrFail($id);
    }


    /**
     * For deleting the product
     *
     * @return response()
     */
    public function destroy($id){
        Product::where('id',$id)->delete();
    }

}
