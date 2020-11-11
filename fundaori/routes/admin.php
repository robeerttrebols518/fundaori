<?php

//use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){
    route::get('/', 'Admin\DashboardController@getDashboard')->name('dashboard');

    route::get('/user/add', 'Admin\UserController@getUserAdd')->name('user_add');
    route::post('/user/add', 'Admin\UserController@postUserAdd')->name('user_add');
    route::get('/users/{status}', 'Admin\UserController@getUsers')->name('user_list');
    route::get('/user/{id}/edit', 'Admin\UserController@getUsersEdit')->name('user_edit');
    route::post('/user/{id}/edit', 'Admin\UserController@postUsersEdit')->name('user_edit');
    route::get('/user/{id}/banned', 'Admin\UserController@getUserBanned')->name('user_banned');
    route::get('/user/{id}/permissions', 'Admin\UserController@getUsersPermissions')->name('user_permissions');
    route::post('/user/{id}/permissions', 'Admin\UserController@postUsersPermissions')->name('user_permissions');
     


    

    // Módulo Configuraciones
    //Route::match(['get', 'post'], '/settings', 'Admin\SettingsController@getHome')->name('settings');
    route::get('/plantilla/add', 'Admin\PlantillaController@getPlantillaAdd')->name('plantilla_add');
    route::post('/plantilla/add', 'Admin\PlantillaController@postPlantillaAdd')->name('plantilla_add');

});



