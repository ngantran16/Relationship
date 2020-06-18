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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/categories',"Admin\CategoryController@index");
Route::get('/admin/photos',"Admin\PhotoController@index");
Route::get('/admin/photo/category/{id}',"Admin\CategoryController@showCategory");

Route::delete('/category/{id}',"Admin\CategoryController@destroyCategory");
Route::delete('/admin/photo/{id}', "Admin\PhotoController@destroyPhoto");

Route::get('/admin/photo/tags/{id}',"Admin\PhotoController@showTags");
Route::get('/admin/photo/create',"Admin\PhotoController@create");
Route::post('/admin/photos',"Admin\PhotoController@store");

Route::get('/admin/photo/{id}/edit', "Admin\PhotoController@edit");
Route::patch('/admin/photos/{id}',"Admin\PhotoController@update");



