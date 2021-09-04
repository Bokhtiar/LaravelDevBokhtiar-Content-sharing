<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', [App\Http\Controllers\User\UserDashboardController::class, 'about']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ "as"=>'user.' , "prefix"=>'user' , "namespace"=>'User' , "middleware"=>['auth','user']],function(){
    Route::get('/dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
});



Route::group([ "as"=>'admin.' , "prefix"=>'admin' , "middleware"=>['auth','admin']],function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

    //category
    Route::resource('category', CategoryController::class);
    Route::get('/category/search/{text}', [App\Http\Controllers\Admin\CategoryController::class, 'search']);
    Route::get('/category/status/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'status']);

    //product
    Route::resource('product', ProductController::class);
    Route::get('/product/status/{id}', [App\Http\Controllers\Admin\ProductController::class, 'status']);

});
