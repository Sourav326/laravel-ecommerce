<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductService
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(Request $request)
    {
        //upload product main image
        if ($request->hasFile('product_main_image')) {
            $product_main_image = $request->file('product_main_image')->store('images/products');
        }

        //Upload product other images
        if ($request->hasFile('product_other_images')) {
            $product_other_images = $request->file('product_other_images')->store('images/products/'.$product_main_image);
        }


        //Create product
        $product = Product::create([
                    'title' => $data['title'],
                    'product_unique_code' => $data['product_unique_code'],
                    'price_per_unit' => $data['price_per_unit'],
                    'sale_price_per_unit' => $data['sale_price_per_unit'],
                    'status' => $data['status'],
                    'stock_quantity' => $data['stock_quantity'],
                    'stock_quantity_to_order' => $data['stock_quantity_to_order'],
                    'tax_percentage' => $data['tax_percentage'],
                    'estimated_shipping_days' => $data['estimated_shipping_days'],
                    'description' => $data['description'],
                    'delivery_charges' => $data['delivery_charges'],
                    'weight' => $data['weight'],
                    'color' => $data['color'],
                    'product_main_image' => $product_main_image,
                ]);

      return $product;
    }


    /**
     * for fetching all products
     *
     * @return response()
     */
    public function index(){
        return $products = Product::paginate(2);
    }

}
