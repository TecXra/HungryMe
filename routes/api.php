<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');





Route::group(['prefix' => 'hungryme'],function(){

	Route::post('/postOrder','HungrymeController@postOrder');
	Route::get('/getOrderByInvoiceId/{id}','HungrymeController@getOrderByInvoiceId');
	Route::get('/getOrderById/{id}','HungrymeController@getOrderById');

	Route::get('/getPreviousOrdersByUserId/{id}','HungrymeController@getPreviousOrdersByUserId');	



	Route::post('/postInvoice','HungrymeController@postInvoice');
	Route::get('/getInvoiceById/{id}','HungrymeController@getInvoiceById');

	Route::post('/postCart','HungrymeController@postCart');
	Route::delete('/deleteByCartId/{id}','HungrymeController@deleteByCartId');
	Route::get('/getCartByUserId/{id}','HungrymeController@getCartByUserId');

	Route::post('/postSingleUser','HungrymeController@postSingleUser');

	Route::post('/postCheckUser','HungrymeController@postCheckUser');

	Route::get('/getSingleUser/{id}','HungrymeController@getSingleUser');

	Route::get('/getAllItems','HungrymeController@getAllItems');
	Route::get('/getSingleItem/{id}','HungrymeController@getSingleItem');
});

