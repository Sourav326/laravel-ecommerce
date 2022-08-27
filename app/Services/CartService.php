<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;


use Illuminate\Http\Request;

class CartService
{
    
/**
 * for getting the cart of  ligin user
 *
 * @return void
 */
    public function index(){
        return Cart::where('user_id',Auth::user()->id)->get();
    }

     /**
     * For edit the product
     *
     * @return response()
     */
    public function cart($id){
        return Cart::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
    }


    public function store($data,$product_id){
        $cart = Cart::where([
            ['user_id','=',auth()->user()->id], ['product_id','=', $product_id]
        ])->first();
        if($cart){
            $quantity = $cart->quantity;
            $cart->quantity = $quantity + $data['quantity'];
            $cart->update();
        } else{
            Cart::updateOrCreate(
                ['user_id' => auth()->user()->id, 'product_id' =>  $product_id],
                ['quantity' => $data['quantity']]
            );
        }
    }

    public function product($carts){
        foreach($carts as $cart){
            $product = Product::where('id',$cart->product_id)->first();
            $product->sale_price_per_unit ? $price = $product->sale_price_per_unit : $price = $product->price_per_unit;
            $product['quantity'] = $cart->quantity;
            $product['price'] = $price;
            $total = $cart->quantity * $price;
            $product['total'] = $total;
            $products[] = $product;
        }
        return $products;
    }

    public function destroy($id){
        Cart::where([
            ['user_id','=' ,auth()->user()->id],
            ['product_id','=' ,$id],
        ])->delete();
    }

}
