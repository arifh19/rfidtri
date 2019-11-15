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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inventaris', 'InventarisController@index')->name('inventaris.index');
Route::post('/inventaris', 'InventarisController@store')->name('inventaris.store');
Route::delete('/inventaris/{id}', 'InventarisController@destroy')->name('inventaris.destroy');

Route::get('/peminjaman', 'PeminjamanController@index')->name('peminjaman.index');
Route::get('/peminjaman/create', 'PeminjamanController@create')->name('peminjaman.create');
Route::post('/peminjaman', 'PeminjamanController@store')->name('peminjaman.store');
