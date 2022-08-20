<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('submit',[UserController::class,'store'])->name('submit');


//Front routes

Route::get('/', function () {
    return view('welcome');
})->name('home');
//Auth routes
Route::controller(AuthController::class)->group(function () {
    Route::middleware('alreadyLogin')->group(function () {
        Route::get('/registration','registration')->name('registration');
        Route::post('post-registration', 'postRegistration')->name('registration.post'); 
        Route::get('/login','login')->name('login');
        Route::post('post-login', 'postLogin')->name('login.post'); 
    });
    Route::middleware('is_login')->group(function () {
        Route::get('/logout','logout')->name('logout');
        Route::get('/profile','profile')->name('profile');
    });
});




//Admin Routes
Route::prefix('admin')->middleware('is_admin')->group(function () {
    
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');

    //Product Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products','index')->name('admin.product.index');
        Route::get('/products/create','create')->name('admin.product.create');
        Route::post('/products/store','store')->name('admin.product.store');
    });
});

