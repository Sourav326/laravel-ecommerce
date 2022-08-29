<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressService
{

/**
 * for fetching all the addresses of the login user
 *
 * @return void
 */
    public function index(){
        return Address::where('user_id',auth()->user()->id)->get();
    }


/**
 * For saving the address of the user
 *
 * @param [type] $data
 * @return void
 */
    public function store($data){
        $addresses = Address::where('user_id',auth()->user()->id)->get();
        if(count($addresses) > 0){
            foreach($addresses as $address){
                $address->is_active = '0';
                $address->update();
            }
        }
        Address::create([
                'user_id' => auth()->user()->id,
                'name' =>  $data['name'],
                'phone' =>  $data['phone'],
                'pincode' =>  $data['pincode'],
                'locality' =>  $data['locality'],
                'address' =>  $data['address'],
                'city' =>  $data['city'],
                'state' =>  $data['state'],
                'landmark' =>  $data['landmark'],
                'alternate_phone' =>  $data['alternate_phone'],
                'tag' =>  $data['tag'],
                'is_active' => '1'
        ]);
    }



}
