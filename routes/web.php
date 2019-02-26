<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', 'V1\Web\Backend\AdminController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'V1\Web\Backend\AdminController@postLogin')->name('admin.postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'V1\Web\Backend\AdminController@index')->name('admin.index');
    Route::get('/logout', 'V1\Web\Backend\AdminController@logout')->name('admin.logout');
    Route::get('/list-calendar', 'V1\Web\Backend\CalendarController@listCalendar')->name('calendar.listCalendar');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'V1\Web\Backend\UserController@index')->name('users.list');
    Route::post('/create', 'V1\Web\Backend\UserController@store')->name('users.store');
    Route::get('edit/{id}', 'V1\Web\Backend\UserController@edit')->name('users.edit');
    Route::put('edit/{id}', 'V1\Web\Backend\UserController@update')->name('users.update');
    Route::get('delete/{id}', 'V1\Web\Backend\UserController@destroy')->name('users.destroy');
});
