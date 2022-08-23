<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Wishlist;


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
            $fileName = time().str_replace(' ', '', $request->file('product_main_image')->getClientOriginalName());
            $path = $request->file('product_main_image')->storeAs('images',$fileName, 'public');
            $product_main_image = '/storage/'.$path;

            
        }
        
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


        //Upload product other images
        if ($request->hasFile('product_other_images')) {
           foreach($request->file('product_other_images') as $productOtherImage){
               $fileName = time().str_replace(' ', '', $productOtherImage->getClientOriginalName());
               $path = $productOtherImage->storeAs('images',$fileName, 'public');
               $product_other_image = '/storage/'.$path;
               Image::create([
                   'product_id' => $product->id,
                   'image' => $product_other_image
               ]);
           }
       }
        
       
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
     * For edit the product
     *
     * @return response()
     */
    public function wishlist($id){
        return Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
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
