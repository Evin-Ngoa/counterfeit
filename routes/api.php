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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', 'API\RegisterController@register');
  
// Route::middleware('auth:api')->group( function () {
// 	Route::resource('qrcodes', 'API\QrCodeController');
// });

/**
 * Mobile APIs
 */

// http://localhost:8000/api/qrcodes/BOOK_001 [active]
Route::resource('qrcodes', 'API\QrCodeController');

// http://localhost:8000/api/profile/customer@gmail.com [active]
Route::resource('profile', 'API\ProfileController');

Route::post('login', 'API\AuthController@login');
        
// http://localhost:8000/api/login/customer@gmail.com/kaaradapk [active]
Route::get('login/{id}/{secret}', 'API\AuthController@getLogin');


/**
 * Mobile APIs Mock Live
 */
// http://mastercard.us.evincloud.com/public/api/demo/qrcodes/BOOK_001
// http://localhost:8000/api/demo/qrcodes/BOOK_001
Route::get('demo/qrcodes/{id}', 'API\QrCodeController@showDemo');

// http://mastercard.us.evincloud.com/public/api/demo/profile/customer@gmail.com
// http://localhost:8000/api/demo/profile/customer@gmail.com
Route::get('demo/profile/{id}', 'API\ProfileController@showDemo');

// http://mastercard.us.evincloud.com/public/api/demo/login/customer@gmail.com/kaaradapk
// http://localhost:8000/api/demo/login/customer@gmail.com/kaaradapk
Route::get('demo/login/{id}/{secret}', 'API\AuthController@getLoginDemo');


