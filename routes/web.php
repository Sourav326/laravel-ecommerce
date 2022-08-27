<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;

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


Route::middleware('is_login')->group(function () {

    //Product Routes
    Route::controller(ShopController::class)->group(function () {
        Route::get('/shop','index')->name('shop');
        Route::get('/product-detail/{product}','show')->name('productDetail');
    });

    //Whislist Routes
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist/{product_id}','store')->name('wishlist');
        Route::get('/wishlist','index')->name('wishlist.index');
    });

    //Cart Routes
    Route::controller(CartController::class)->group(function () {
        Route::post('/cart/{product_id}','store')->name('cart.store');
        Route::get('/cart','index')->name('cart.index');
        Route::get('/cart/{product_id}','destroy')->name('cart.destroy');
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
        Route::get('/products/{product}/edit','edit')->name('admin.product.edit');
        Route::put('/products/{product}','update')->name('admin.product.update');
        Route::delete('/products/{photo}','destroy')->name('admin.product.destroy');
    });
});

