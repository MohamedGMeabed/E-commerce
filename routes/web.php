<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutus');
Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contactus');

Route::group(['prefix' => 'admin/', 'middleware' => 'auth:admin'], function () {
Route::get('dashoard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('admin/login', [LoginController::class,'getLogin'])->name('get.admin.login');
    Route::post('admin/login', [LoginController::class,'login'])->name('admin.login');
});

 ######################### Begin Categories Route #######################
 Route::group(['prefix' => 'categories', 'middleware' => 'auth:admin'], function () {
    Route::get('/',[CategoryController::class,'index']) -> name('admin.categories');
    Route::post('store',[CategoryController::class,'store']) -> name('admin.categories.store');
    Route::post('update/{category}',[CategoryController::class,'update']) -> name('admin.categories.update');
    Route::get('delete/{category}',[CategoryController::class,'destroy']) -> name('admin.categories.delete');
});
######################### End  Categories  Route ########################

 ######################### Begin Products Route #######################
 Route::group(['prefix' => 'products', 'middleware' => 'auth:admin'], function () {
    Route::get('/',[ProductController::class,'index']) -> name('admin.products');
    Route::post('store',[ProductController::class,'store']) -> name('admin.products.store');
    Route::post('update/{product}',[ProductController::class,'update']) -> name('admin.products.update');
    Route::get('delete/{product}',[ProductController::class,'destroy']) -> name('admin.products.delete');
});
######################### End  Products  Route ########################

 ######################### Begin Slider Route #######################
 Route::group(['prefix' => 'sliders', 'middleware' => 'auth:admin'], function () {
    Route::get('/',[SliderController::class,'index']) -> name('admin.slider');
    Route::post('store',[SliderController::class,'store']) -> name('admin.slider.store');
    Route::post('update/{slider}',[SliderController::class,'update']) -> name('admin.slider.update');
    Route::get('delete/{slider}',[SliderController::class,'destroy']) -> name('admin.slider.delete');
});
######################### End  Slider  Route ########################


Route::get('add-to-cart/{product}',[CartController::class,'addToCart']) -> name('cart.add');
Route::get('clear-cart/',[CartController::class,'clearCart']) -> name('cart.clear');
Route::post('checkout-add',[CheckoutController::class,'store']) -> name('checkout.store');









