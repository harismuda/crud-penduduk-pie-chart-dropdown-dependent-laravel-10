<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//chart
Route::get('/', 'App\Http\Controllers\PendudukController@chart');

//Kartu Keluarga
Route::get('/kk', 'App\Http\Controllers\KartukeluargaController@index');
Route::get('/detail/{no_kk}', 'App\Http\Controllers\KartukeluargaController@detail');
Route::get('/kk/add', 'App\Http\Controllers\KartukeluargaController@create');
Route::post('/kk/store', 'App\Http\Controllers\KartukeluargaController@store');
Route::get('/edit/{id}', 'App\Http\Controllers\KartukeluargaController@edit');
Route::post('/kk/update', 'App\Http\Controllers\KartukeluargaController@update');
Route::get('/kk/hapus/{id}', 'App\Http\Controllers\KartukeluargaController@destroy');

//Penduduk
Route::get('/penduduk', 'App\Http\Controllers\PendudukController@index');
Route::get('/penduduk/add', 'App\Http\Controllers\PendudukController@create');
Route::post('/penduduk/store', 'App\Http\Controllers\PendudukController@store');
Route::get('penduduk/edit/{id}', 'App\Http\Controllers\PendudukController@edit');
Route::post('/penduduk/update', 'App\Http\Controllers\PendudukController@update');
Route::get('/penduduk/hapus/{id}', 'App\Http\Controllers\PendudukController@destroy');

//Wilayah
Route::get('/wilayah', 'App\Http\Controllers\WilayahController@wilayah');
Route::get('getKabupaten/{idProvinsi}', 'App\Http\Controllers\WilayahController@getKabupaten')->name('getKabupaten');
Route::get('getKecamatan/{idKabupaten}', 'App\Http\Controllers\WilayahController@getKecamatan')->name('getKecamatan');
Route::get('getDesa/{idKecamatan}', 'App\Http\Controllers\WilayahController@getDesa')->name('getDesa');