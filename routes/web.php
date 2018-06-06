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

});

Route::get('admin',function(){
	return view('layouts.admin');
});
Route::get('user',function(){
	return view('layouts.user');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



