<?php

use Illuminate\Support\Facades\Route;

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
Route::get('index',"PageController@getIndex")->name('trangchu');
// Route::get('loai-san-pham/{type}',"PageController@getTypeProduct")->name('loaisanpham');
Route::get('loai-san-pham/{type}',[
    'as'=>'loaisanpham',
    'uses'=>'PageController@getTypeProduct'
]);
Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitietsanpham',
    'uses'=>'PageController@getChitiet'
]);
Route::get('lienhe',"PageController@getLienHe")->name('lienhe');
Route::get('about',"PageController@getAbout")->name('about');
Route::get('gioi_thieu',"PageController@getAbout")->name('gioithieu');
Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);

Route::get('dat-hang',[
	'as' =>'dathang',
	'uses'=>'PageController@getCheckout'
	]);
Route::post('dat-hang','PageController@postCheckout');
Route::get('login',[
    'as'=>'login',
    'uses'=>'LoginController@getLogin'
    ]);
Route::post('login','LoginController@postLogin');
Route::get('dangki','LoginController@getDk')->name('dangki');
Route::post('dangki','LoginController@postDk');
Route::get('thoat','LoginController@logOut')->name('thoat');
Route::get('search','PageController@getSear')->name('showSearch');
Route::post('search','PageController@getSearch')->name('search');

Route::get('email','PageController@getEmail')->name('email');
Route::post('email','PageController@postEmail');

Route::get('export', 'PageController@export')->name('export');
Route::get('importExportView', 'PageController@importExportView');
Route::post('import', 'PageController@import')->name('import');
?>
