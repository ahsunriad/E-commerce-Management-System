<?php

use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::get('homepage',[FrontendController::class, 'index']);
Route::get('categories',[FrontendController::class, 'category']);
Route::get('category/{slug}', [FrontendController::class, 'viewCategory']);
Route::get('category/{categorySlug}/{productSlug}', [FrontendController::class, 'viewProduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function (){
//    Route::get('/dashboard', [FrontendController::class , 'index']);
    Route::get('/dashboard', 'Admin\FrontendController@index');
//    {
//        //return view('admin.dashboard');
//        //return view('admin.index');
//
//    });
    //Route::get('categories',[CategoryController::class, 'index']);
//    Route::get('categories','Admin\CategoryController@index');
//    Route::get('addCategory', 'Admin\CategoryController@store');
//**********************************Category Routes************************************************
    Route::get('addCategory', [CategoryController::class, 'show']);
    Route::post('addCategory', [CategoryController::class, 'store']);
    Route::get('categoryList', [CategoryController::class, 'index']);
    Route::get('editCategory/{id}', [CategoryController::class, 'edit']);
    Route::put('updateCategory/{id}', [CategoryController::class, 'update']);
    Route::get('deleteCategory/{id}', [CategoryController::class, 'destroy']);
//**********************************Product Routes************************************************
    Route::get('productList', [ProductController::class, 'index']);
    Route::get('addProduct', [ProductController::class, 'show']);
    Route::post('addProduct', [ProductController::class, 'store']);
    Route::get('editProduct/{id}', [ProductController::class, 'edit']);
    Route::put('updateProduct/{id}', [ProductController::class, 'update']);
    Route::get('deleteProduct/{id}', [ProductController::class, 'destroy']);

});
