<?php

use Illuminate\Support\Facades\Route;//untuk menginclude Illuminate\Support\Facades\Route
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

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');//untuk menampilkan index setelah login
Route::get('/', function () {
    return view('auth.login');//untuk menampilkan form login
});
Route::group(['middleware'=>['auth','back']],function(){
    Route::group(['middleware'=>['role:1']],function(){

Route::get('/registrasi','registrasi@tampil');//untuk menampilkan form registrasi
Route::post('/registrasi','registrasi@create');//untuk mengirim data yang sudah diisi dan langsung di proses
Route::get('/data-user','admin@data_user')->middleware('auth','back');//untuk melihat data user
Route::get('/hapus-user/{id}','admin@hapus_user')->middleware('auth','back');//untuk mghapus data user dengan id yang di pilih
Route::get('/update-user/{id}','admin@update_user')->middleware('auth','back');//untuk menampilkan form update user dengan
Route::post('/update-user/{id}','admin@aksi_update')->middleware('auth','back');//;mengirim data yang sudah di ubah dan di proses dari update user
Route::get('/tambah-kelas','admin@tambah_kelas')->middleware('auth','back');//untuk menampilkan form tambah kelas
Route::post('/tambah-kelas','admin@aksi_kelas')->middleware('auth','back');//untuk mengirim datayang sudah diisi dan diproses dari tambah kelas

Route::get('/tambah-kategori','admin@tambah_kategori')->middleware('auth','back');//untuk menampilkan form tambah kategori
Route::post('/tambah-kategori','admin@aksi_kategori')->middleware('auth','back');//Untuk mengirimkan data dan memprosesnya dari tambah kategori
Route::get('/data-pencalon','admin@data_pencalon')->middleware('auth','back');//untuk menampilkan form data pencalon
Route::get('/terima-calon/{id}','admin@terima_calon')->middleware('auth','back');//untuk menampilkan form terima calon
Route::get('/data-kelas','admin@data_kelas')->middleware('auth','back');
Route::get('/data-kategori','admin@data_kategori')->middleware('auth','back');
Route::get('/kategori/{id}/hapus','admin@delete_kategori')->middleware('auth','back');
Route::get('/kategori/{id}/edit','admin@edit_kategori')->middleware('auth','back');
Route::post('/kategori/{id}/edit','admin@update_kategori')->middleware('auth','back');
Route::get('/kelas/{id}/edit','admin@edit_kelas')->middleware('auth','back');
Route::post('/kelas/{id}/edit','admin@update_kelas')->middleware('auth','back');
Route::get('/kelas/{id}/delete','admin@delete_kelas')->middleware('auth','back');
Route::get('/pencalon/{id}/hapus','admin@delete_pencalon')->middleware('auth','back');
Route::get('/data-calon','admin@data_calon')->middleware('auth','back');
Route::get('/calon/{id}/hapus','admin@delete_calon')->middleware('auth','back');

Route::get('/admin/profile','admin@show')->middleware('auth','back');
Route::post('/admin/profile','admin@aksi_show')->middleware('auth','back');




});
    Route::group(['middleware'=>['role:2']],function() {

        Route::get('/regis-calon', 'fungsi@regis_calon')->middleware('auth', 'back');//untuk menampilkan form register calon
        Route::post('/regis-calon', 'fungsi@aksi_calon')->middleware('auth', 'back');//Untuk mengirimkan data dan memprosesnya dari register calon
        Route::get('/voting/{id}', 'fungsi@voting')->middleware('auth', 'back');
        Route::post('/voting/{id}', 'fungsi@pilih')->middleware('auth', 'back');




    });
    Route::get('/voting/{id}/info', 'fungsi@info_calon')->middleware('auth', 'back');
    Route::get('/profile/{id}', 'fungsi@profil')->middleware('auth', 'back');
    Route::post('/update_profile/{id}', 'fungsi@update_profile')->middleware('auth', 'back');
    Route::get('/voting/{id}/akumulasi', 'fungsi@akumulasi')->middleware('auth', 'back');
    Route::post('/ubah-password', 'fungsi@ubah_password')->middleware('auth', 'back');
});