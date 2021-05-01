<?php

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
// Home
Route::get('/', 'HomepageController@show');

// Pages
Route::get('item/{id}', 'ItemPageController@show');
Route::get('searchResults', 'SearchResultsController@show');
Route::get('about', 'AboutPageController@show');
Route::get('faq', 'FaqPageController@show');
Route::get('contacts', 'ContactsPageController@show');
Route::get('userProfile/{id}', 'UserProfileController@show')->middleware('canSeeProfile');
Route::get('userProfile/{id}/wishlist', 'WishlistController@show')->middleware('canSeeProfile');
Route::get('userProfile/{id}/cart', 'CartController@show')->middleware('canSeeProfile');
Route::get('userProfile/{id}/purchaseHistory', 'PurchaseHistoryController@show')->middleware('canSeeProfile');
Route::get('checkout', 'CheckoutController@show');

//Management
Route::get('management', 'ManagementController@show')->middleware('admin');
Route::get('management/manageUsers', 'UserAdministrationController@show')->middleware('admin');
Route::get('management/addItem', 'AddItemController@show')->middleware('admin');

// API
// Route::put('api/cards', 'CardController@create');
// Route::delete('api/cards/{card_id}', 'CardController@delete');
// Route::put('api/cards/{card_id}/', 'ItemController@create');
// Route::post('api/item/{id}', 'ItemController@update');
// Route::delete('api/item/{id}', 'ItemController@delete');
Route::get("api/item", 'ItemController@getItems');
Route::get("api/item/{id}", 'ItemController@get');

Route::post('products/{id}/review', 'ReviewController@submit');
Route::delete('products/{id}/review/{reviewId}', 'ReviewController@delete');
Route::post('api/cart/{id}/{quantity}', 'CartController@addToCart');
Route::delete('api/cart/{id}', 'CartController@removeFromCart');
Route::post('item/getReviewForm/{id}', 'ReviewController@getFrom');
Route::post('item/getReview/{id}', 'ReviewController@getReview');
Route::put('review/{reviewId}', 'ReviewController@updateReview');

// // Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
