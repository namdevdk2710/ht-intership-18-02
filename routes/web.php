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
    return view('backend.index');
});
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('backend.index');
    });
    Route::get('/login', function () {
        return view('backend.login');
    });
});
Route::group(['prefix'=>'users'],function () {
    Route::get('/', 'V1\Web\Backend\UserController@index')->name("users.list");
});
