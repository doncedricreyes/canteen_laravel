<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/sales');
});

Route::get('/login',[UserController::class,'login_index'])->name('login');
Route::post('/login',[UserController::class,'login']);


Route::middleware(['auth'])->group(function () {
Route::get('/category',[ItemController::class,'category_index']);
Route::post('/category',[ItemController::class,'category_store']);

Route::get('/items',[ItemController::class,'item_index']);
Route::post('/items/store',[ItemController::class,'item_store']);
Route::put('/items/update/{id}',[ItemController::class,'item_update']);
Route::put('/items/remove/{id}',[ItemController::class,'item_remove']);

Route::get('/customers',[CustomerController::class,'index']);
Route::post('/customers',[CustomerController::class,'store']);
Route::get('/customers/balance',[CustomerController::class,'check_balance']);
Route::get('/customers/balance/add',[CustomerController::class,'add_balance']);
Route::get('/customers/balance/limit',[CustomerController::class,'limit']);
Route::get('/customers/balance/print/{id}',[CustomerController::class,'print_balance'])->name('print_balance');
Route::get('/sales',[SaleController::class,'index'])->middleware('auth')->name('sales');
Route::get('/open_balance',[SaleController::class,'opening_balance'])->middleware('auth')->name('open_balance');
Route::post('/open_balance',[SaleController::class,'store_opening_balance'])->middleware('auth');
Route::get('/sales/receipt/{id}',[SaleController::class,'receipt'])->name('print');

Route::get('/users',[UserController::class,'index'])->name('user_index');
Route::post('/users/store',[UserController::class,'register']);
Route::get('/profile',[UserController::class,'profile']);
Route::put('/profile',[UserController::class,'update_profile']);
Route::get('/logout',[UserController::class,'logout']);


});