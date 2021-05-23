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
Route::get('searchResults', 'SearchResultsController@showNotAjax');
Route::post('searchResultsAjax', 'SearchResultsController@showAjax');
Route::get('about', 'AboutPageController@show');
Route::get('faq', 'FaqPageController@show');
Route::get('contacts', 'ContactsPageController@show');

Route::get('userProfile', 'UserProfileController@showSelf')->name("userProfile");
Route::get('userProfile/wishlist', 'WishlistController@showSelf')->name("wishlist");
Route::get('userProfile/cart', 'CartController@showSelf')->name("cart");
Route::get('userProfile/purchaseHistory', 'PurchaseHistoryController@showSelf')->name("history");

Route::get('userProfile/{id}', 'UserProfileController@show')->middleware('canSeeProfile')->name("userProfileWithId");
Route::get('userProfile/{id}/wishlist', 'WishlistController@show')->middleware('canSeeProfile')->name("wishlistWithId");
Route::get('userProfile/{id}/cart', 'CartController@show')->middleware('canSeeProfile')->name("cartWithId");
Route::get('userProfile/{id}/purchaseHistory', 'PurchaseHistoryController@show')->middleware('canSeeProfile')->name("historyWithId");
Route::get('checkout', 'CheckoutController@show')->middleware('verified')->name('checkout');

//Management
Route::get('management', 'ManagementController@show')->middleware('admin');
Route::get('management/manageUsers', 'UserAdministrationController@show')->middleware('admin');
Route::get('management/addItem', 'AddItemController@show')->middleware('admin');
Route::get('unban/{id}', 'ManagementController@unbanUser')->middleware('admin');
Route::get('promote/{id}', 'ManagementController@promoteUser')->middleware('admin');
Route::get('ban/{id}', 'ManagementController@banUser')->middleware('admin');
Route::delete('/userProfile/{id}', 'UserController@deleteAccount');
Route::patch('item/{id}/editDetail/{id2}', 'ItemController@editDetail')->middleware('admin');


// Edit user profile
Route::patch('userProfile/editUsername', 'UserController@editUsername');
Route::patch('userProfile/editAddress/{type}', 'UserController@editAddress');
Route::post('userProfile/edit', 'UserController@edit');
Route::get("userProfile/edit/getAddressInfo/{type}", 'UserController@getAddressInfo');
Route::get('userProfile/edit/getAddressForm/{type}', 'UserController@getAddressForm');

Route::post('userProfile/balance', 'UserController@addBalance');
Route::get("userProfile/balance/capture", 'UserController@captureBalance');

Route::patch('userProfile/editEmail', 'UserController@changeEmail');


Route::post('management/addItem', 'AddItemController@addItem')->middleware('admin');
Route::post('management/item/{id}', 'ItemController@updateItem')->middleware('admin');
Route::patch('management/item/{id}', 'ItemController@putAvailable')->middleware('admin');
Route::delete('management/item/{id}', 'ItemController@deleteItem')->middleware('admin');

// API
Route::get("api/item", 'ItemController@getItems');
Route::get("api/item/{id}", 'ItemController@get');
Route::get("api/users/{id}", 'UserController@get');
Route::get("api/users/{id}/purchaseHistory", 'UserController@getPurchaseHistory');
Route::get("category/{id}/details", 'CategoryController@getDetails');



// Reviews
Route::post('item/{id}/review', 'ReviewController@submit');
Route::post('item/getReviewForm/{id}', 'ReviewController@getForm');
Route::post('item/getReview/{id}', 'ReviewController@getReview');
Route::delete('review/{reviewId}', 'ReviewController@delete');
Route::put('review/{reviewId}', 'ReviewController@updateReview');

// Cart
Route::post('cart', 'CartController@addToCart');
Route::delete('cart/{id}', 'CartController@removeFromCart');
Route::patch('cart/{id}', 'CartController@updateQuantity');

// Wishlist
Route::post('wishlist', 'WishlistController@addToWishlist');
Route::delete('wishlist/{id}', 'WishlistController@removeFromWishlist');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');


//Email verificationn
Route::get('/email/verify', "EmailVerificationController@show")->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', "EmailVerificationController@verify")->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', "EmailVerificationController@resend")->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Password Recovery
Route::get('forgot-password', 'Auth\ForgotPasswordController@show')->middleware('guest')->name('password.request');
Route::post('forgot-password', 'Auth\ForgotPasswordController@forgotPassword')->middleware('guest')->name('password.email');

Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPassword')->middleware('guest')->name('password.reset');
Route::post('reset-password','Auth\ForgotPasswordController@changePassword')->middleware('guest')->name('password.update');

Route::get('change-password', 'Auth\ChangePasswordController@show')->name('password.change');
Route::post('change-password','Auth\ChangePasswordController@changePassword')->name('password.change');

// Notifications
Route::post('notification/{notificationId}', 'NotificationController@putIsSeen');
Route::patch('notification/{notificationId}', 'NotificationController@putIsSeenAjax');

// Checkout
Route::get("checkout/addressForm/{type}", 'CheckoutController@getAddressForm');
Route::get("checkout/addressInfo/{type}", 'CheckoutController@getAddressInfo');
Route::get("checkout/toAddresses", 'CheckoutController@toAddresses');
Route::post("checkout/toShipping", 'CheckoutController@toShipping');
Route::post("checkout/toPayment", 'CheckoutController@toPayment');
Route::post("checkout", 'CheckoutController@finishCheckout');
Route::get("checkout/capture", 'CheckoutController@finishPaypal');