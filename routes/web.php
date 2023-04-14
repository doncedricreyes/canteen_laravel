<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
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
    return view('welcome');
});


Route::get('/category',[ItemController::class,'category_index']);
Route::post('/category',[ItemController::class,'category_store']);

Route::get('/items',[ItemController::class,'item_index']);
Route::post('/items/store',[ItemController::class,'item_store']);

Route::get('/customers',[CustomerController::class,'index']);
Route::post('/customers/store',[CustomerController::class,'store']);
