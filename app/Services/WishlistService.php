<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\User;


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
        $wislists =  User::where('id',Auth::user()->id)->with('wishlist')->get();
    }

}
