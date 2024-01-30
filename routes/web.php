<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MakingOrderController;

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

Route::prefix('admin')->middleware(['auth','checkRole:admin'])->group(function () {
	Route::get('/', [AdminController::class, 'index'])->name('admin.home');
	Route::resource('products', ProductController::class);
	Route::resource('categories', CategoryController::class);
	Route::resource('orders', OrderController::class)->only([
		'index', 'show'
	]);
});

Route::middleware(['auth', 'checkRole:user'])->group(function () {
	Route::prefix('user')->group(function () {
		Route::get('/home', [HomeController::class, 'index'])->name('user.home');
		Route::get('/profile', [HomeController::class, 'profile'])->name('user.profile');
  	});

	Route::prefix('basket')->group(function () {
		Route::get('/', [BasketController::class, 'basket'])->name('basket');
		Route::post('/add/{product}', [BasketController::class, 'basketAdd'])->name('basket-add');
		Route::post('/remove/{orderItem}', [BasketController::class, 'basketRemove'])->name('basket.remove');
		Route::get('/increase/{orderItem}', [BasketController::class, 'basketIncrease'])->name('basket.increase');
		Route::get('/decrease/{orderItem}', [BasketController::class, 'basketDecrease'])->name('basket.decrease');
		Route::get('/place', [MakingOrderController::class, 'basketPlace'])->name('basket.place');
		Route::post('/place-order', [MakingOrderController::class, 'placeOrder'])->name('place.order');	
  });
	
});


Route::get('/', [MainController::class, 'index'])->name('welcome');

Route::get('/products', [MainController::class, 'products'])->name('products');

Route::get('/categories',[MainController::class, 'categories'])->name('categories');

Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');

Route::get('/logout', [LoginController::class, 'getLogout'])->name('logout');

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('{category}/{product:code}', [MainController::class, 'product'])->name('product');
