<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', 'Api\CategoryController@index');
Route::get('products', 'Api\ProductController@index');
Route::get('carouselslider', 'Api\CarouselSliderController@index');
Route::get('get-all-hot-products', 'Api\ProductController@getAllHotProducts');
Route::get('get-all-new-arrival-products', 'Api\ProductController@getAllNewArrivalProducts');
Route::get('get-products-by-category/{categoryId}','Api\ProductController@getProductsByCategoryId');
Route::get('get-products-by-keyword/{keyword}','Api\ProductController@getProductsByKeyword');

Route::get('get-products-by-carousel-Slider-id/{carouselSliderId}','Api\ProductController@getproductByCarouselSliderId');
Route::post('register', 'Api\UserController@register');
Route::post('login', 'Api\UserController@login');
Route::post('shipping', 'Api\ShippingController@store');
Route::post('make-payment', 'Api\PaymentController@makePayment');

Route::get('get-order-list-by-user-id/{userId}','Api\OrderController@getOrdersByUserId');




Route::get('get-category-by-top-banner', 'Api\CategoryController@getCategoryByTopBanner');





