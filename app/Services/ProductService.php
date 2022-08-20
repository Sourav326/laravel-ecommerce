<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductService
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return Product::create([
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
        'product_main_image' => "https://www.google.com/image.jpg",
      ]);
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
