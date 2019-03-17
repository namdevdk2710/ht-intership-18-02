<?php
Route::group(['prefix' => '/'], function () {
    Route::get('', 'V1\Web\Frontend\PageController@index')->name('home');
    Route::post('/login', 'V1\Web\Frontend\PageController@postLogin')->name('postLogin');
    Route::post('/register', 'V1\Web\Frontend\PageController@postRegister')->name('postRegister');
    Route::get('/logout', 'V1\Web\Frontend\PageController@logout')->name('logout');
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

    Route::group(['prefix' => 'request-bloods'], function () {
        Route::get('/donated', 'V1\Web\Backend\RequestBloodController@donated')->name('request-bloods.donated');
        Route::get('/received', 'V1\Web\Backend\RequestBloodController@received')->name('request-bloods.received');
        Route::get('/donated/confirm/{id}', 'V1\Web\Backend\RequestBloodController@confirm')
        ->name('request-bloods.confirm');
        Route::get('/received/confirm/{id}', 'V1\Web\Backend\RequestBloodController@confirm')
        ->name('request-bloods.confirm');
    });

    Route::group(['prefix' => 'blood-bags'], function () {
        Route::get('/import', 'V1\Web\Backend\BloodBagController@getImport')->name('blood-bags.getImport');
        Route::Post('/getInfoByCode', 'V1\Web\Backend\BloodBagController@getInfoByCode');
        Route::post('/store', 'V1\Web\Backend\BloodBagController@store')->name('blood-bags.store');
        Route::get('/search', 'V1\Web\Backend\BloodBagController@getSearch')->name('blood-bags.getSearch');
        Route::get('/search-blood-bag', 'V1\Web\Backend\BloodBagController@searchBloodBagByCode');
    });

    Route::group(['prefix' => 'hourseware'], function () {
        Route::get('/', 'V1\Web\Backend\WareHouseController@index')->name('warehouses.index');
        Route::post('/add', 'V1\Web\Backend\WareHouseController@store')->name('warehouses.store');
        Route::put('/edit/{id}', 'V1\Web\Backend\WareHouseController@update')->name('warehouses.update');
        Route::get('/delete/{id}', 'V1\Web\Backend\WareHouseController@destroy')->name('warehouses.destroy');
        Route::get('/export-blood', 'V1\Web\Backend\WareHouseController@getExport')->name('export-bloods.index');
        Route::get('/export-blood/{id}', 'V1\Web\Backend\WareHouseController@getExportRequest')
            ->name('export-request');
        Route::get('/export-blood/{id}/{id2}', 'V1\Web\Backend\WareHouseController@confirm')
            ->name('confirm-request');
        Route::get('/import-blood', 'V1\Web\Backend\WareHouseController@getImport')->name('import-loods.index');
    });
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
    Route::get('delete/{id}', 'V1\Web\Backend\BloodController@destroy')->name('bloods.destroy');
});
