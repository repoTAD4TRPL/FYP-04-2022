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

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('produk', 'API\ProdukController@index');
Route::post('cekout', 'API\TransaksiController@store');
Route::get('cekout/user/{id}', 'API\TransaksiController@history');
Route::post('cekout/btlTrans/{id}', 'API\TransaksiController@btlTrans');
Route::post('push', 'API\TransaksiController@pushNotif');
Route::get('transportasi/{transportasi}', 'TransportasiController@index');
Route::get('history', 'API\HistoryTangkapanController@index');
Route::post('history', 'API\HistoryTangkapanController@create');
Route::get('transportasi', 'API\PengirimanController@getAllTransportasi');
Route::post('transportasi', 'API\PengirimanController@createTransportasi');
Route::post('cekout/upload', 'API\TransaksiController@upload');
Route::get('loket', 'API\PengirimanController@getAllLoket');
Route::post('loket', 'API\PengirimanController@createLoket');
Route::post('produk-delete', 'API\ProdukController@delete')->name('deleteProduct');
Route::post('produk-update', 'API\ProdukController@edit')->name('editProduct');