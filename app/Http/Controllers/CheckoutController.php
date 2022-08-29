<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\AddressService;
use Razorpay\Api\Api;
use Session;
use Exception;

class CheckoutController extends Controller
{
    public function checkOut(CartService $cartService, AddressService $addressService){
        $carts = $cartService->index();
        if(count($carts) > 0){
            $products = $cartService->product($carts);
            $addresses = $addressService->index();
            return view('checkOut', [
                'products'=>$products,
                'addresses'=>$addresses,
        ]);
        } else{
            return redirect()->route('cart.index')->with('danger','No Items in your cart!');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));
                dd($response);

            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }


    }
}
