<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TermsOfServiceController;
use App\Http\Controllers\Admin\TopHeaderController;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $category = Category::find(1);//for slider active
    $categories = Category::query()->Active()->index();
    return view('welcome',compact('category', 'categories'));
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('contact/store', [App\Http\Controllers\User\ContactController::class, 'store']);
Route::get('/blog', [App\Http\Controllers\User\BlogController::class, 'index']);
Route::get('/blog/detail/{text}', [App\Http\Controllers\User\BlogController::class, 'show']);
Route::post('/blog-search', [App\Http\Controllers\User\BlogController::class, 'search']);
Route::get('/terms-of-service', [App\Http\Controllers\User\UserDashboardController::class, 'terms']);
Route::get('/privacy-policy', [App\Http\Controllers\User\UserDashboardController::class, 'privacy']);
Route::get('/logout', [App\Http\Controllers\User\UserDashboardController::class, 'logout']);
//category
Route::get('/category/product/{id}', [App\Http\Controllers\User\CategoryController::class, 'category_ways_product_show']);
//subcategory
Route::get('/subcategory/product/{id}', [App\Http\Controllers\User\CategoryController::class, 'subcategory_ways_product_show']);


Route::post('/order/store', [App\Http\Controllers\User\OrderController::class, 'store']);

Route::group([ "as"=>'user.' , "prefix"=>'user' , "namespace"=>'User' , "middleware"=>['auth','user']],function(){
    Route::get('/dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/add-to-cart/store/{id}', [App\Http\Controllers\User\CartController::class, 'store']);
    Route::get('/checkout', [App\Http\Controllers\User\CheckoutController::class, 'create']);
    Route::post('/order/store', [App\Http\Controllers\User\OrderController::class, 'store']);
});



Route::group([ "as"=>'admin.' , "prefix"=>'admin' , "middleware"=>['auth','admin']],function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

    //category
    Route::resource('category', CategoryController::class);
    Route::get('/category/search/{text}', [App\Http\Controllers\Admin\CategoryController::class, 'search']);
    Route::get('/category/status/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'status']);
    //category
    Route::resource('sub-category', SubCategoryController::class);
    Route::get('/sub-category/status/{id}', [App\Http\Controllers\Admin\SubCategoryController::class, 'status']);
    //product
    Route::resource('product', ProductController::class);
    Route::get('/product/status/{id}', [App\Http\Controllers\Admin\ProductController::class, 'status']);
    Route::post('/product/search', [App\Http\Controllers\Admin\ProductController::class, 'search']);
    //top headers
    Route::resource('topheader', TopHeaderController::class);
    //about
    Route::resource('about', AboutUsController::class);
    //slider
    Route::resource('slider', SliderController::class);
    //contact
    Route::resource('contact', ContactController::class);
    Route::get('/contact/status/{id}', [App\Http\Controllers\Admin\ContactController::class, 'status']);
    //slider
    Route::resource('blog', BlogController::class);
    Route::get('/blog/status/{id}', [BlogController::class, 'status']);
    //logout
    Route::get('/logout', [App\Http\Controllers\Admin\AdminDashboardController::class, 'logout']);
    //order
    Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);
    Route::get('/order/detail/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show']);
    Route::get('/order/status/{id}', [App\Http\Controllers\Admin\OrderController::class, 'status']);
    //terms of service
    Route::resource('terms', TermsOfServiceController::class);
    //privacy
    Route::resource('privacy', PrivacyController::class);

});


