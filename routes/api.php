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



