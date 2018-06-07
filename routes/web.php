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

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin']],function(){
Route::resource('merk','MerkController');
Route::resource('mobil','MobilController');
Route::resource('customer','CustomerController');
Route::resource('supir','SupirController');
Route::resource('pemesanan','PemesananController');
Route::resource('booking','BookingController');
Route::resource('user','UsersController');

});
Route::group(['prefix'=>'member','middleware'=>['auth','role:member|admin']],function(){
Route::resource('user','UsersController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



