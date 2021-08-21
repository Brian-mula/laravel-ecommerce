<?php

use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\ProductController;
use App\Http\Controllers\Pages\SubCategoryController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories',CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);
Route::resource('products',ProductController::class);