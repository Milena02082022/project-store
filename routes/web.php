<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;

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

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'getLogout'])->name('logout');


Route::middleware(['auth', CheckRole::class . ':admin'])->group(function () {
	Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
	Route::resource('goods', ProductController::class);
	Route::resource('classes', CategoryController::class);
	Route::resource('orders', OrderController::class)->only([
		'index', 'show'
	]);
});

Route::middleware(['auth', CheckRole::class . ':user'])->group(function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
	Route::get('/basket', [BasketController::class, 'basket'])->name('basket');
	Route::post('/basket/add/{id}',[BasketController::class, 'basketAdd'])->name('basket-add');
	
});

Route::get('/{category}', [MainController::class, 'category'])->name('category');

Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');


