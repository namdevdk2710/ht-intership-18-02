<?php
Route::group(['prefix' => '/'], function () {
    Route::get('', 'V1\Web\Frontend\PageController@index')->name('home');
    Route::get('/login', 'V1\Web\Frontend\PageController@getLogin');
    Route::post('/login', 'V1\Web\Frontend\PageController@postLogin')->name('postLogin');
});

Route::get('admin/login', 'V1\Web\Backend\AdminController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'V1\Web\Backend\AdminController@postLogin')->name('admin.postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'V1\Web\Backend\AdminController@index')->name('admin.index');
    Route::get('/logout', 'V1\Web\Backend\AdminController@logout')->name('admin.logout');

    Route::group(['prefix' => 'calendar'], function () {
        Route::get('/', 'V1\Web\Backend\CalendarController@index')->name('calendar.index');
        Route::post('/add-new', 'V1\Web\Backend\CalendarController@postAddCalendar')->name('calendar.postAddCalendar');
        Route::post('/showDistrictInCity', 'V1\Web\Backend\CalendarController@showDistrictInCity')
        ->name('calendar.showDistrictInCity');
        Route::post('/showCommuneInDistrict', 'V1\Web\Backend\CalendarController@showCommuneInDistrict')
        ->name('calendar.showCommuneInDistrict');
        Route::delete('/delete/{id}', 'V1\Web\Backend\CalendarController@delete')->name('calendar.delete');
        Route::put('/edit/{id}', 'V1\Web\Backend\CalendarController@update')->name('calendar.update');
    });

    Route::resource('/request-bloods', 'V1\Web\Backend\RequestBloodController');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'V1\Web\Backend\UserController@index')->name('users.list');
    Route::get('/create', 'V1\Web\Backend\UserController@create');
    Route::post('/create', 'V1\Web\Backend\UserController@store')->name('users.store');
    Route::get('edit/{id}', 'V1\Web\Backend\UserController@edit');
    Route::put('edit/{id}', 'V1\Web\Backend\UserController@update')->name('users.update');
    Route::get('delete/{id}', 'V1\Web\Backend\UserController@destroy')->name('users.destroy');
});

Route::group(['prefix' => 'bloods'], function () {
    Route::get('', 'V1\Web\Backend\BloodController@index')->name('bloods.list');
    Route::get('create', 'V1\Web\Backend\BloodController@create');
    Route::post('create', 'V1\Web\Backend\BloodController@store')->name('bloods.store');
    Route::get('edit/{id}', 'V1\Web\Backend\BloodController@edit');
    Route::put('edit/{id}', 'V1\Web\Backend\BloodController@update')->name('bloods.update');
    Route::get('edit/{id}', 'V1\Web\Backend\UserController@edit')->name('users.edit');
    Route::put('edit/{id}', 'V1\Web\Backend\UserController@update')->name('users.update');
    Route::get('delete/{id}', 'V1\Web\Backend\BloodController@destroy')->name('bloods.destroy');
});
