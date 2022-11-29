<?php

use App\Mail\Testmail;
use App\Http\Livewire\Counter;
use App\Http\Livewire\CartTables;
use App\Http\Livewire\CartCounter;
use App\Http\Livewire\ShopProducts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Qtycontroller;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Shopcontroller;
use App\Http\Controllers\Paymentcontroller;

use App\Http\Controllers\Websitecontroller;
use App\Http\Controllers\Checkoutcontroller;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\Admin\Blogcontroller;
use App\Http\Controllers\shophandlecontroller;
use App\Http\Controllers\Admin\Staffcontroller;
use App\Http\Controllers\Admin\Userscontroller;
use App\Http\Controllers\Auth\Logoutcontroller;
use App\Http\Controllers\Admin\Orderscontroller;
use App\Http\Controllers\Admin\Reviewcontroller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Terms\Privacycontroller;
use App\Http\Controllers\Admin\Categorycontroller;
use App\Http\Controllers\Testingcontroller;

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


Route::get('/',[Websitecontroller::class,'index'])->name('website_home');

Route::get('/about',[Websitecontroller::class,'about'])->name('about');

Route::get('/blog',[Websitecontroller::class,'blog'])->name('blog');

Route::get('/single_post/{id}',[Websitecontroller::class,'single_post'])->name('single_post');

Route::get('/shop',[Shopcontroller::class,'index'])->name('shop');

Route::get('/privacy',[Privacycontroller::class,'privacy'])->name('privacy');

Route::get('/terms',[Privacycontroller::class,'terms'])->name('terms');

Route::get('/return',[Privacycontroller::class,'returns'])->name('returns');

Route::resource('/cart', Cartcontroller::class);


Auth::routes(['verify' => true]);

Route::get('/logout',[Logoutcontroller::class,'index'])->name('go_out');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::resource('/products',ProductController::class);

    Route::resource('/category',Categorycontroller::class);

    Route::resource('/users',Userscontroller::class);

    Route::resource('/reviews',  Reviewcontroller::class);

    Route::resource('/staff',Staffcontroller::class);

    Route::resource('/blog' ,Blogcontroller::class);

    Route::resource('/orders',Orderscontroller::class);


});


Route::get('/checkout',[Checkoutcontroller::class,'index'])->name('checkout');

// Route::get('/test',[Testingcontroller::class,'index']);
