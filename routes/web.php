<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collection', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collection/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collection/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productDisplay']);


Route::middleware(['auth'])->group(function () {
    route::get('/wishList', [App\Http\Controllers\Frontend\WishListController::class, 'index']);
    route::get('/cart', [App\Http\Controllers\Frontend\CartController::class , 'index']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin route
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    route::controller(DashboardController::class)->group(function () {

        route::get('dashboard', 'index');
    });
    // category route
    Route::controller(CategoryController::class)->group(function () {
        route::get('category', 'index');

        route::get('category/create', 'create');

        route::post('category', 'store');
        route::get('category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
    });
    // product
    Route::controller(ProductController::class)->group(function () {
        route::get('/product', 'index');
        route::get('/product/create', 'create');

        route::post('/product', 'store');

        route::get('/product/{product_id}/edit', 'edit');
        route::put('/product/{product_id}', 'update');
        route::get('/product-image/{product_image_id}/delete', 'destroyImage');

        route::get('product/{product_id}/delete', 'destroy');

        route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        route::get('product-color/{prod_color_id}/delete', 'deleteProdColor');
    });
    // brands
    Route::get('/brands', App\Http\Livewire\Admin\Brand\index::class);

    Route::controller(ColorController::class)->group(function () {
        route::get('/colors', 'index');
        route::get('/colors/create', 'create');
        route::post('/colors/create', 'store');
        route::get('/colors/{color}/edit', 'edit');
        route::get('/colors/{color_id}/delete', 'destroy');
    });

    Route::controller(SliderController::class)->group(function () {
        route::get('/slider', 'index');
        route::get('/slider/create', 'create');

        route::post('/slider/create', 'store');
        route::get('/slider/{slider}/edit', 'edit');
        route::put('/slider/{slider}', 'update');
        route::get('slider/{slider}/delete', 'destroy');
    });
});
