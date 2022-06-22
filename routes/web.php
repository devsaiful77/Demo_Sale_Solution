<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
// ========== Admin Panel ==========
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'] ], function(){
    Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
});

// ========== Customer Panel ==========
Route::group(['prefix'=>'customer','middleware' =>['client','auth'] ], function(){
    Route::get('dashboard',[CustomerController::class, 'index'])->name('customer.dashboard');
});


