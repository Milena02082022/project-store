<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
	'reset' => false,
	'confirm' => false,
	'verify' => false,
]);

Route::get('/', [MainController::class, 'index'])->name('welcome');

Route::get('/products', [MainController::class, 'products'])->name('products');
Route::get('/categories',[MainController::class, 'categories'])->name('categories');
Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');

Route::get('/logout', [LoginController::class, 'getLogout'])->name('logout');


Route::middleware(['auth','checkRole:2'])->group(function () {
	Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
	Route::resource('goods', ProductController::class)->parameters(['goods' => 'product']);
	Route::resource('classes', CategoryController::class)->parameters(['classes' => 'category']);
	Route::resource('orders', OrderController::class)->only([
		'index', 'show'
	]);
});

Route::middleware(['auth', 'checkRole:1'])->group(function () {
	Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');
	Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
	Route::post('/basket/add/{id}',[BasketController::class, 'basketAdd'])->name('basket-add');
	Route::get('/basket/increase/{itemId}', [BasketController::class, 'basketIncrease'])->name('basket.increase');
	Route::get('/basket/decrease/{itemId}', [BasketController::class, 'basketDecrease'])->name('basket.decrease');
	Route::get('/basket/remove/{itemId}', [BasketController::class, 'basketRemove'])->name('basket.remove');

	Route::get('/basket/place', [BasketController::class, 'basketPlace'])->name('basket.place');
	Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
	Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place.order');
	
});

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');


