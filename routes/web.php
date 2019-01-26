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

Route::get('login', ['as'=>'login', 'uses'=>'LoginController@index']);
Route::post('login', ['as'=>'login', 'uses'=>'LoginController@login']);
Route::get('logout', ['as'=>'logout', 'uses'=>'LoginController@logout']);
Route::any('changepassword', ['as'=>'changepassword', 'uses'=>'LoginController@changePassword']);

Route::any('/', ['as'=>'/', 'uses'=>'HomeController@index']);
Route::any('dashboard', 'DashboardController@index')->name('dashboard');
Route::any('checkruangan', 'DashboardController@checkRuangan')->name('checkruangan');
Route::any('assignruangan', 'DashboardController@assignRuangan')->name('assignruangan');
Route::any('selesaisidang', 'DashboardController@selesaiSidang')->name('selesaisidang');
Route::any('datamhs', ['as'=>'datamhs', 'uses'=>'MhsController@data']);
Route::any('mahasiswa', ['as'=>'mahasiswa', 'uses'=>'MhsController@load']);
Route::any('file', ['as'=>'file', 'uses'=>'MhsController@file']);
Route::any('inputskripsi', ['as'=>'inputskripsi', 'uses'=>'MhsController@update']);
Route::any('revisi', ['as'=>'revisi', 'uses'=>'MhsController@revisi']);
Route::any('revisiakhir', ['as'=>'revisiakhir', 'uses'=>'MhsController@revisiakhir']);
Route::any('sidangakhir', ['as'=>'sidangakhir', 'uses'=>'MhsController@sidangakhir']);
Route::any('lempeng', ['as'=>'lempeng', 'uses'=>'MhsController@lempeng']);
Route::any('dosen', ['as'=>'dosen', 'uses'=>'DosenController@index']);
Route::any('pwd', ['as'=>'pwd', 'uses'=>'DashboardController@password']);
Route::resource('ruangan', 'RuanganController');
Route::resource('jam', 'JamController');
Route::resource('jadwal', 'JadwalController');
Route::resource('data', 'DataController');
Route::resource('files', 'FileController');