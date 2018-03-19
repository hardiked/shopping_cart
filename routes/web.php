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

Route::get('/', [
	'uses' =>'ProductController@getIndex',
	'as'=>'product.index'
]);


Route::get('/user/signup',[
	'uses' => 'UserController@getSignUp',
	'as' => 'user.signup',
	'middleware' => 'guest'
]);

Route::post('/user/signup',[
	'uses' => 'UserController@postSignUp',
	'as' => 'user.signup',
	'middleware' => 'guest'
]);


Route::get('/user/signin',[
	'uses' => 'UserController@getSignIn',
	'as' => 'user.signin',
	'middleware' => 'guest'
]);

Route::post('/user/signin',[
	'uses' => 'UserController@postSignIn',
	'as' => 'user.signin',
	'middleware' => 'guest'
]);

Route::get('/user/profile',[
	'uses' =>'UserController@getProfile',
	'as' =>'user.profile',
	'middleware' => 'auth'
]);

Route::get('/user/logout',[
	'uses' =>'UserController@getLogOut',
	'as'=>'user.logout',
	'middleware' => 'auth'
]);

Route::get('/add-to-cart/{id}',[
	'uses' => 'ProductController@getAddToCart',
	 'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}',[
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);

Route::get('/remove/{id}',[
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('/shopping-cart',[
	'uses' => 'ProductController@getCart',
	 'as' => 'product.shoppingCart'
]);

Route::get('/checkout',[
	'uses' => 'ProductController@getCheckOut',
	'as' =>'checkout',
    'middleware' => 'auth'
]);

Route::post('/checkout',[
	'uses' => 'ProductController@postCheckOut',
	'as'=>'checkout',
    'middleware' => 'auth'
]);