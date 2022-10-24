<?php

use Illuminate\Support\Facades\Route;


Route::any('login','AuthController@login')->name('company.login');

Route::group(['middleware'=>['checkCompanyAuth']],function (){

    Route::get('/','HomeController@home')->name('company.home');

});
