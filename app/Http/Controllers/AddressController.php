<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AddressService;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    public function store(AddressRequest $request,AddressService $addressService){
        $addressService->store($request);
        return redirect()->back()->with('success','Address saved.');
    }
}
