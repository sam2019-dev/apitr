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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/sendmail','emailcontroller@sendemail');
Route::resource('/image','imagecontroller');
Route::get('/stipepaymentform','Stripecontroller@paymentform');
Route::post('/makepayment','Stripecontroller@makepayment');
Route::get('/paypalCreatepayment','paypalController@createpayment');
Route::get('/paypalMakepayment','paypalController@makepayment');
Route::get('/successpaypal','paypalController@paymentstat');
Route::get('/notify','paypalController@paymentstat');
Route::get('/cancelpaypal','paypalController@paymentstat');
Route::get('/paypalcard','pappalpro@createpayment');
Route::get('/paypalcardpay','pappalpro@pay');
Route::get('/paypalreturn','pappalpro@cardsuccess');
Route::post('/restpay','retpaypal@pay');
Route::get('/cardpay','retpaypal@createpayment');