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

use App\Mail\NewsletterEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return redirect('homepage');
});

// Profile
Route::view('users/deleteAccount','auth.deleteAccount',['error1' => ''])->name('accountDeleteView');
Route::get('users/{id}','CustomerController@show')->name('profile');
Route::post('users/{id}','CustomerController@update');
Route::post('users/{id}/delete','CustomerController@delete');
Route::get('users/{id}/edit','CustomerController@edit')->name('profileEdit');
Route::get('users/{id}/purchasehistory','PurchaseController@getPurchases');
Route::get('users/{id}/favorites','CustomerController@getFavorites');
Route::post('/users/favorites/{sku}','CustomerController@toggleFavoritesList')->name('toggleFavoritesList');
Route::delete('/users/favorites/{sku}','CustomerController@toggleFavoritesList')->name('removeFromFavoritesList');
Route::put('users/{id}/ban','CustomerController@banUser')->name('ban');
Route::delete('banned/{id}','CustomerController@unBanUser')->name('unban');

// Products
Route::get('products','ProductController@listProducts')->name('products');
Route::get('product/create','ProductController@create')->name('product_create');
Route::post('product','ProductController@createProduct')->name('product_add');

//Single Product
Route::get('product/{id}/edit','ProductController@editForm')->where('id','[0-9]+')->name('product_edit');
Route::get('product/{id}','ProductController@show')->where('id','[0-9]+')->name('product');
Route::post('product/{id}','ProductController@update')->where('id','[0-9]+');
Route::delete('product/{id}','ProductController@delete')->where('id','[0-9]+');
Route::post('product/{id}/rating','ProductController@updateRating')->where('id','[0-9]+');

//Comments
Route::post('product/{id}/comment','ProductController@addComment')->where('id','[0-9]+')->name('product_comment');
Route::get('comment/{id}/flag','ProductController@commentFlag')->where('id','[0-9]+')->name('comment_flag');
Route::get('comment/{id}/approve','ProductController@commentApprove')->where('id','[0-9]+')->name('comment_approve');
Route::delete('comment/{id}','ProductController@commentDelete')->where('id','[0-9]+')->name('comment_delete');

//Homepage
Route::get('homepage','HomepageController@show')->name('homepage');
Route::get('shoppingCart','PurchaseController@show')->name('shoppingCart');
Route::get('checkout','PurchaseController@showCheckout')->name('checkout');
Route::post('checkout','PurchaseController@payCheckout')->name('purchase');


// Static
Route::view('about','pages.about')->name('about');
Route::view('contact','pages.contact')->name('contact');
Route::view('faq','pages.faq')->name('faq');
Route::view('404','errors.404',['errors' => ['Webpage not found!Please try to refresh or verify the url!','Maybe the page is under maintenance']])->name('404');
Route::view('401','errors.401',['errors' => ['You currently don\'t have authorization to acces this page!','If you think you should have access to this page, log in and try again']])->name('401');
Route::get('configurator','ConfiguratorController@show')->name('configurator');
Route::get('comparator','ProductController@compare')->name('comparator');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Administration
Route::get('administration', 'AdministratorController@show')->name('administration');
Route::get('moderator/create','ModeratorController@create')->name('moderator_create');
Route::post('moderator/create','ModeratorController@createModerator')->name('moderator_create_post');
Route::post('newsletter', 'AdministratorController@sendNewsletter')->name('sendNewsletter');


// Moderation
Route::get('moderation', 'ModeratorController@show')->name('moderation');
Route::get('api/moderators', 'AdministratorController@getModerators')->name('moderators');

// API new
Route::get('api/product/{sku}', 'ProductController@getProductBySku')->where('sku', '[0-9]+')->name('api_product_sku')->middleware('api');
Route::get('api/product/{name}', 'ProductController@getProductsByName')->name('api_product_name')->middleware('api');
Route::get('api/products', 'ProductController@getProducts')->name('api_products')->middleware('api');

// Homepage needed api
Route::get('api/discounts', 'ProductController@getDiscounted')->name('api_discounted')->middleware('api');
Route::get('api/bestsellers', 'ProductController@getBestSellers')->name('api_bestsellers')->middleware('api');
Route::get('api/recommendations', 'ProductController@getRecommendations')->name('api_recommendations')->middleware('api');

Route::view('resetPassword','auth.recoverPassword')->name('recoverPasswordConfirmation');
Route::post('resetPasswordPost','Auth\LoginController@resetPassword')->name('recoverPassword');
Route::get('recoverAccount', 'Auth\LoginController@chooseNewPassword')->name('chooseNewPassword');
Route::post('recoverAccount', 'Auth\LoginController@changePassword')->name('newPassword');

Route::post('googleLogin', 'Auth\RegisterController@googleRegister');
