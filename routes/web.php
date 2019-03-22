<?php
// ---------------------------Front-end routes-----------------------------//
Route::group(['prefix' => '/', 'namespace' => 'V1\Web\Frontend'], function () {
    Route::get('/', 'PageController@index')->name('home');
    Route::post('/login', 'PageController@postLogin')->name('postLogin');
    Route::post('/register', 'PageController@postRegister')->name('postRegister');
    Route::get('/logout', 'PageController@logout')->name('logout');
    Route::get('/register-donate', 'RequestBloodController@getRegisterDonated')
    ->name('requestBlood.getRegisterDonated');
    Route::post('/register-donate/{calendarId}', 'RequestBloodController@postRegisterDonated')
    ->name('requestBlood.postRegisterDonated');
    Route::get('/result', 'BloodBagController@index')->name('getSearch');
    Route::post('/result', 'BloodBagController@search')->name('search');
    Route::get('/register-received', 'RequestBloodController@getRegisterReceived')
    ->name('requestBlood.getRegisterReceived');
    Route::post('/register-received', 'RequestBloodController@postRegisterReceived')
    ->name('requestBlood.postRegisterReceived');
    Route::get('/diary', 'DiaryController@getDiary')->name('getDiary');
    Route::post('/diary', 'DiaryController@postDiary')->name('postDiary');
    Route::get('/new', 'PostController@index')->name('getNews');
});
//---------------------------Admin-Login----------------------------------------//
Route::get('admin/login', 'V1\Web\Backend\AdminController@getLogin')->name('admin.getLogin');
Route::post('admin/login', 'V1\Web\Backend\AdminController@postLogin')->name('admin.postLogin');

//---------------------------Back-end routes----------------------------------------//
Route::group(['prefix' => 'admin', 'namespace' => 'V1\Web\Backend', 'middleware' => 'admin'], function () {
//---------------------------Admin index----------------------------------------//
    Route::get('/', 'AdminController@index')->name('admin.index');
//---------------------------Admin-logout----------------------------------------//
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
//---------------------------Admin-profile----------------------------------------//
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'UserController@profile')->name('user.profile');
        Route::post('/', 'UserController@changeAdminPassword')->name('user.changeAdminPassword');
    });
//---------------------------Admin-calendar----------------------------------------//
    Route::group(['prefix' => 'calendar'], function () {
        Route::get('/', 'CalendarController@index')->name('calendar.index');
        Route::post('/add-new', 'CalendarController@postAddCalendar')->name('calendar.postAddCalendar');
        Route::post('/showDistrictInCity', 'CalendarController@showDistrictInCity')
        ->name('calendar.showDistrictInCity');
        Route::post('/showCommuneInDistrict', 'CalendarController@showCommuneInDistrict')
        ->name('calendar.showCommuneInDistrict');
        Route::delete('/delete/{id}', 'CalendarController@delete')->name('calendar.delete');
        Route::put('/edit/{id}', 'CalendarController@update')->name('calendar.update');
        Route::get('/{id}', 'CalendarController@show')->name('calendar.show');
    });
//---------------------------Admin-Request-Blood----------------------------------------//
    Route::group(['prefix' => 'request-bloods'], function () {
        Route::get('/donated', 'RequestBloodController@donated')->name('request-bloods.donated');
        Route::get('/received', 'RequestBloodController@received')->name('request-bloods.received');
        Route::get('/donated/confirm/{id}', 'RequestBloodController@confirm')
        ->name('request-bloods.confirm');
        Route::get('/received/confirm/{id}', 'RequestBloodController@confirm')
        ->name('request-bloods.confirm');
    });
//---------------------------Admin-Blood-Bag----------------------------------------//
    Route::group(['prefix' => 'blood-bags'], function () {
        Route::get('/import', 'BloodBagController@getImport')->name('blood-bags.getImport');
        Route::Post('/getInfoByCode', 'BloodBagController@getInfoByCode');
        Route::post('/store', 'BloodBagController@store')->name('blood-bags.store');
        Route::get('/search', 'BloodBagController@getSearch')->name('blood-bags.getSearch');
        Route::get('/search-blood-bag', 'BloodBagController@searchBloodBagByCode');
    });
//---------------------------------ADMIN WAREHOUSE----------------------------------------------//
    Route::group(['prefix' => 'warehouses'], function () {
        //---------------------------WareHouse-Manager----------------------------------------//
        Route::get('/', 'WareHouseController@index')->name('warehouses.index');
        Route::post('/add', 'WareHouseController@store')->name('warehouses.store');
        Route::put('/edit/{id}', 'WareHouseController@update')->name('warehouses.update');
        Route::get('/delete/{id}', 'WareHouseController@destroy')->name('warehouses.destroy');
        //---------------------------Export-BloodBag----------------------------------------//
        Route::get('/export-blood', 'WareHouseController@getExport')->name('export-bloods.index');
        Route::get('/export-blood/{id}', 'WareHouseController@getExportRequest')->name('export-request');
        Route::get('/export-blood/{id}/{id2}', 'WareHouseController@confirm')->name('confirm-request');
        //---------------------Import-BloodBag-into-WareHouse---------------------------------//
        Route::get('/import-blood', 'WareHouseController@getImport')->name('import-loods.index');
        Route::post('/import-blood/{id}', 'WareHouseController@import')->name('import-loods');
        //-----------------------Manager-BloodBag-In-WareHouse------------------------------------//
        Route::get('/blood-bag', 'WareHouseController@listBloodBag')->name('blood-bags.index');
        Route::get('/blood-bag/{id}', 'WareHouseController@detailBloodBag')
        ->name('blood-bags.updateStatus');
        Route::post('/blood-bag/{id}', 'WareHouseController@updateStatus')->name('updateStatus');
    });
//-----------------------------------DIARY---------------------------------------//
    Route::group(['prefix' => 'diary'], function () {
        Route::get('/', 'DiaryController@index')->name('diary.index');
        Route::post('/', 'DiaryController@search')->name('diary.search');
    });
//-----------------------------------USER-MANAGER---------------------------------------//
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('users.list');
        Route::get('/create', 'UserController@create');
        Route::post('/create', 'UserController@store')->name('users.store');
        Route::get('edit/{id}', 'UserController@edit');
        Route::put('edit/{id}', 'UserController@update')->name('users.update');
        Route::get('delete/{id}', 'UserController@destroy')->name('users.destroy');
    });
//-----------------------------------BLOODGROUP-MANAGER---------------------------------------//
    Route::group(['prefix' => 'bloods'], function () {
        Route::get('', 'BloodController@index')->name('bloods.list');
        Route::get('create', 'BloodController@create');
        Route::post('create', 'BloodController@store')->name('bloods.store');
        Route::get('edit/{id}', 'BloodController@edit');
        Route::put('edit/{id}', 'BloodController@update')->name('bloods.update');
        Route::get('delete/{id}', 'BloodController@destroy')->name('bloods.destroy');
    });
//-----------------------------------POST-MANAGER---------------------------------------//
    Route::resource('/posts', 'PostController');
});
