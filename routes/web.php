<?php

Route::get('/', function () {
    return view('frontend.layouts.index');
});

Route::get('admin/login', 'V1\Web\Backend\AdminController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'V1\Web\Backend\AdminController@postLogin')->name('admin.postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'V1\Web\Backend\AdminController@index')->name('admin.index');
    Route::get('/logout', 'V1\Web\Backend\AdminController@logout')->name('admin.logout');
    Route::group(['prefix' => 'calendar'], function () {
        Route::get('/', 'V1\Web\Backend\CalendarController@listCalendar')->name('calendar.listCalendar');
        Route::post('/add-new', 'V1\Web\Backend\CalendarController@postAddCalendar')->name('calendar.postAddCalendar');
        Route::post('/showDistrictInCity', 'V1\Web\Backend\CalendarController@showDistrictInCity')
        ->name('calendar.showDistrictInCity');
        Route::post('/showCommuneInDistrict', 'V1\Web\Backend\CalendarController@showCommuneInDistrict')
        ->name('calendar.showCommuneInDistrict');
    });
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'V1\Web\Backend\UserController@index')->name('users.list');
    Route::get('/create', 'V1\Web\Backend\UserController@create');
    Route::post('/create', 'V1\Web\Backend\UserController@store')->name('users.store');
});
