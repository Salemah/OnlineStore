<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class, 'redirect']);
//admincontroller
Route::get('/viewcatagory',[AdminController::class, 'viewcatagory']);
Route::post('/add_catagory',[AdminController::class, 'addcatagory']);
Route::get('/deletecatagory/{id}',[AdminController::class, 'deletecatagory']);
Route::get('/viewproduct',[AdminController::class, 'viewproduct']);
Route::get('/showproduct',[AdminController::class, 'showproduct']);
Route::post('/add_products',[AdminController::class, 'addproducts']);
Route::get('/product/delete/{id}',[AdminController::class, 'productdelete']);
Route::get('/product/update/{id}',[AdminController::class, 'productupdate']);
