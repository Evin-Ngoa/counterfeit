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
// https://www.itsolutionstuff.com/post/guzzle-http-client-request-tutorial-with-laravel-58example.html
// https://desertebs.com/laravel/how-to-consume-external-third-party-api-in-laravel-5


// Dashboard
Route::get('/', ['uses' => 'DashboardController@index']);
Route::resource('dashboard', 'DashboardController');

Route::get('/dash', function () {
    return view('layout.theme-dash');
});

// Authentication
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {

    Route::get('/book-counterfeit-admin', ['as' => 'book-counterfeit-admin', 'uses' => 'AuthController@adminLogin']);
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@index']);
    Route::get('/register', ['as' => 'register', 'uses' => 'AuthController@register']);
    
});

// Book
Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
    Route::get('/list/{id}', ['as' => 'view', 'uses' => 'BookController@view_books']);
});
Route::resource('book', 'BookController');
//Verify Book
Route::group(['prefix' => 'verify', 'as' => 'verify.'], function () {
    Route::get('/book/{id}', ['as' => 'book', 'uses' => 'BookController@verify']);
    Route::get('/book', ['as' => 'form', 'uses' => 'BookController@verify_form']);
});


//Verify Customer
Route::group(['prefix' => 'bookshop', 'as' => 'bookshop.'], function () {
    Route::get('/verify', ['as' => 'verify', 'uses' => 'CustomerController@verify_bookshop_form']);
});

// History update_avatar
Route::resource('transaction', 'TransactionController');
Route::resource('publisher', 'PublisherController');
Route::resource('distributor', 'DistributorController');
Route::resource('customer', 'CustomerController');
Route::resource('profile', 'ProfileController');
Route::group(['prefix' => 'upload', 'as' => 'upload.'], function () {
    Route::post('/profile/pic/', ['as' => 'profile', 'uses' => 'ProfileController@update_avatar']);
});
// Shipment
Route::group(['prefix' => 'shipment', 'as' => 'shipment.'], function () {
    Route::get('/list/{id}', ['as' => 'view', 'uses' => 'ShipmentController@view_shipments']);
});
Route::resource('shipment', 'ShipmentController');

// Order Contract
Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
    Route::get('/list/{id}', ['as' => 'view', 'uses' => 'OrderController@view_orders']);
});
Route::resource('order', 'OrderController');

Route::resource('report', 'ReportController');

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('456');
});

// Route::get('qrcode-with-color', function () {
//     return \QrCode::size(300)
//                     ->backgroundColor(255,55,0)
//                     ->generate('A simple example of QR code');
// });

// Route::get('qrcode-with-image', function () {
//     $image = \QrCode::format('png')
//                     ->merge('images/laravel.png', 0.5, true)
//                     ->size(500)->errorCorrection('H')
//                     ->generate('A simple example of QR code!');
//  return response($image)->header('Content-type','image/png');
// });

// Route::get('qrcode-with-special-data', function() {
//     return \QrCode::size(500)
//                 ->email('info@tutsmake.com', 'Welcome to Tutsmake!', 'This is !.');
// });


Route::get('/sendemail', 'NotificationController@index');
Route::post('/send/sms', 'NotificationController@sendSMS');
Route::post('/general/sms/send/', 'NotificationController@sendGeneralSMS');
Route::post('/general/email/send/', 'NotificationController@sendEmailGeneral');
// http://localhost:8000/general/email/send/Hello/confirmed/cstomer@gmail.com
Route::get('/general/email/send/{message}/{subject}/{to}', 'NotificationController@sendEmailGeneralGet');
Route::get('/general/sms/send/{message}', 'NotificationController@sendGeneralSMSGet');
Route::post('/sendemail/send', 'NotificationController@sendEmail');

Route::group(['prefix' => 'traceability', 'as' => 'traceability.'], function () {
     Route::get('/form', ['as' => 'form', 'uses' => 'TransactionController@showSearchForm']);
});