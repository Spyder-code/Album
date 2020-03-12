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

// Route::get('/', function () {
//     return view('welcome');
// });

// use Illuminate\Routing\Route;

Route::get('/', 'AlbumController@index');
Route::get('/upload/{customer}', 'AlbumController@upload');
Route::get('/hapus/{album}', 'AlbumController@destroy');
Route::get('/print/{customer}', 'AlbumController@print');
Route::get('/download', 'AlbumController@download');
Route::get('/layouts', 'AlbumController@layouts');
Route::get('/preview', 'AlbumController@preview');
Route::get('/layouts/{userLayouts}', 'AlbumController@destroyLayout');


Route::post('/', 'AlbumController@TambahCustomer');
Route::post('/upload/{customer}', 'AlbumController@store');
Route::post('/bgUpload', 'AlbumController@bgUpload');
