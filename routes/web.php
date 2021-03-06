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


//Route::get('/', function () {
//    return view('front.index');
//})->name('front');



Route::get('/','FrontController@index')->name('front');


Route::get('qr-code-g', function () {
    \QrCode::size(500)
        ->format('png')
        ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));

    return view('qrCode');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('mart-products/{qrcode}','FrontController@products')->name('mart-products');
Route::get('customer/create/{id}','CustomerController@create')->name('create-customer');
Route::post('customer/store','CustomerController@store')->name('store-customer');
Route::group(['middleware' => ['auth'], 'prefix' => 'admin/'], function () {
    Route::resource('mart','MartController');
    Route::resource('product','ProductController');
    Route::resource('roles','RoleController');
    Route::resource('customer','CustomerController');
    Route::resource('users','UserController');
});
