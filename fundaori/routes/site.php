<?php

//use Illuminate\Support\Facades\Route;

/*  
|--------------------------------------------------------------------------
| Web Routes Administration Site
|--------------------------------------------------------------------------
|    
*/    
         


// Envio Correo Gmail
route::get('/mail','MailController@getMail')->name('mail');

// Router Auth                 
route::get('/ingresar','ConnectController@getLogin')->name('login');
route::post('/ingresar','ConnectController@postLogin')->name('login');
route::get('/recover','ConnectController@getRecover')->name('recover');
route::post('/recover','ConnectController@postRecover')->name('recover');
route::get('/reset','ConnectController@getReset')->name('reset');
route::post('/reset','ConnectController@postReset')->name('reset');
route::get('/register','ConnectController@getRegister')->name('register'); 
route::post('/register','ConnectController@postRegister')->name('register');
route::get('/logout','ConnectController@getLogout')->name('logout');


