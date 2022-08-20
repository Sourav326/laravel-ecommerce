<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * for login view
     *
     * @return response()
     */
    public function login(){
        return view('login');
    }

    /**
     * for login the user
     *
     * @return response()
     */
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == 0){
                return redirect('/')->with('success','You have successfully loggedin');
            } 
            // else{
            //     return redirect('/admin')->with('success','Welcome to dashboard');
            // }
        }
        return redirect("login")->with('danger','Oppes! You have entered invalid credentials');
    }

    /**
     * for registeration view
     *
     * @return response()
     */
    public function registration(){
        return view('registration');
    }

    /**
     * for register the user
     *
     * @return response()
     */
    public function postRegistration(RegistrationRequest $request,AuthService $authService)
    {     
        $data = $request->validated();
        $check = $authService->create($data);
        return redirect("/")->with('success','Great! You have successfully registered');
    }


    /**
     * for logout the user
     *
     * @return response()
     */
    public function logout(AuthService $authService) {
        $authService->logout();
        return Redirect('login');
    }


    /**
     * for profile of user
     *
     * @return response()
     */
    public function profile() {
        return view('profile', [
            'user' => Auth::user()
        ]);
    }

}
