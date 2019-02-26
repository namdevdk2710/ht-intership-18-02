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

Route::get('admin/login', 'V1\Web\Backend\AdminController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'V1\Web\Backend\AdminController@postLogin')->name('admin.postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'V1\Web\Backend\AdminController@index')->name('admin.index');
    Route::get('/logout', 'V1\Web\Backend\AdminController@logout')->name('admin.logout');
    Route::group(['prefix' => 'calendar'], function () {
        Route::get('/', 'V1\Web\Backend\CalendarController@listCalendar')->name('calendar.listCalendar');
        Route::get('/add-new', 'V1\Web\Backend\CalendarController@getAddCalendar')->name('calendar.getAddCalendar');
        Route::post('/add-new', 'V1\Web\Backend\CalendarController@postAddCalendar')->name('calendar.postAddCalendar');
    });
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'V1\Web\Backend\UserController@index')->name('users.list');
});
