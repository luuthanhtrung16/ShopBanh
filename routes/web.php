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
Route::get('trangchu','PageController@getIndex');


Route::get('loai-san-pham/{id}','PageController@getLoaiSanPham');
Route::get('chi-tiet-san-pham/{id}','PageController@getChiTietSanPham');
Route::get('lien-he','PageController@getLienHe');
Route::get('gioi-thieu','PageController@getGioiThieu');
Route::get('add-to-cart/{id}','PageController@getAddtoCart');
Route::get('delete-cart/{id}','PageController@getDeleteCart');
Route::get('dat-hang','PageController@getCheckout');
Route::post('dat-hang','PageController@postCheckout');