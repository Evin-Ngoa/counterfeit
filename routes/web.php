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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dash', function () {
    return view('layout.theme-dash');
});

Route::resource('book', 'BookController');

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('qrcode-with-color', function () {
    return \QrCode::size(300)
                    ->backgroundColor(255,55,0)
                    ->generate('A simple example of QR code');
});

Route::get('qrcode-with-image', function () {
    $image = \QrCode::format('png')
                    ->merge('images/laravel.png', 0.5, true)
                    ->size(500)->errorCorrection('H')
                    ->generate('A simple example of QR code!');
 return response($image)->header('Content-type','image/png');
});

Route::get('qrcode-with-special-data', function() {
    return \QrCode::size(500)
                ->email('info@tutsmake.com', 'Welcome to Tutsmake!', 'This is !.');
});
