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
