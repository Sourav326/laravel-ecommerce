<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;


use Illuminate\Http\Request;

class WishlistService
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create($id)
    {
        $wishlist = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
        if($wishlist){

            $wishlist->delete();

        } else{

            //Create wishlist
            Wishlist::create([
                'product_id' => $id,
                'user_id' => Auth::user()->id
            ]);
        }
    }

/**
 * for getting the wishlist of  ligin user
 *
 * @return void
 */
    public function index(){
        return $wishlists = Wishlist::where('user_id',Auth::user()->id)->get();
    }

    public function product($wishlists){
        foreach($wishlists as $wishlist){
            $products[] = Product::where('id',$wishlist->product_id)->first();
        }
        return $products;
    }

}
