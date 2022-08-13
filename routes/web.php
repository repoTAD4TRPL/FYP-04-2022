<?php

use App\Http\Controllers\ProdukController;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/API/deleteProduk/{id}', [ProdukController::class, 'destroy'])->name('delete');
Route::resource('/user', 'UserController');
Route::resource('/produk', 'ProdukController');
Route::post('/produk/delete', [ProdukController::class, 'hapus_produk'])->name('produk.delete');
Route::post('/produk/update', [ProdukController::class, 'edit_produk'])->name('produk.edit');

Route::resource('/transaksi', 'TransaksiController');
Route::resource('/pengiriman', 'PengirimanController');
Route::get('/transaksi/btlTrans/{id}', 'TransaksiController@btlTrans')->name('transaksibatal');
Route::get('/transaksi/confirm/{id}', 'TransaksiController@confirm')->name('transaksiconfirm');
Route::get('/transaksi/kirim/{id}', 'TransaksiController@kirim')->name('transaksikirim');
Route::get('/transaksi/selesai/{id}', 'TransaksiController@selesai')->name('transaksiselesai');