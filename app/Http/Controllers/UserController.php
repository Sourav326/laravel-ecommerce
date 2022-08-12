<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function store(UserRequest $request){
        $validated = $request->validated();
    }
}
