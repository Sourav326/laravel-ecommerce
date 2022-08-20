<?php
namespace App\Services;

use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'profile' => "https://www.google.com/image.jpg",
        // 'profile' => $data['profile'],
        'password' => Hash::make($data['password'])
      ]);
    }
    

    public function logout(){
      Session::flush();
      Auth::logout();
    }

}
