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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/registrasi','registrasi@tampil');
Route::post('/registrasi','registrasi@create');
Route::get('/data-user','admin@data_user')->middleware('auth');
Route::get('/hapus-user/{id}','admin@hapus_user')->middleware('auth');
Route::get('/update-user/{id}','admin@update_user')->middleware('auth');
Route::post('/update-user/{id}','admin@aksi_update')->middleware('auth');
Route::get('/tambah-kelas','admin@tambah_kelas')->middleware('auth');
Route::post('/tambah-kelas','admin@aksi_kelas')->middleware('auth');
Route::get('/regis-calon','fungsi@regis_calon')->middleware('auth');
Route::post('/regis-calon','fungsi@aksi_calon')->middleware('auth');
Route::get('/tambah-kategori','admin@tambah_kategori')->middleware('auth');
Route::post('/tambah-kategori','admin@aksi_kategori')->middleware('auth');
