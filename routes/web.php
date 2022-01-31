<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['register'=>false]);

Route::get('/', 'DashboardController@index')->name('Dashboard');

Route::resource('products','ProductController');
Route::get('products/{id}/gallery','ProductController@gallery')->name('products.gallery') ;

Route::resource('products-galleries','ProductGalleryController');

Route::get('transaction/{id}/set-status','TransactionController@setStatus')
     ->name('transaction.status') ;

Route::resource('transaction','TransactionController');