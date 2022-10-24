<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


// Main page
    Route::get('/', 'Site\HomeController@index')->name('/');

    Route::get('/mytest', 'Site\HomeController@testPage')->name('/mytest12332545');


    // Auth management
    Route::get('login', 'Site\AuthController@login')->name('siteLogin');
    Route::post('login', 'Site\AuthController@postLogin')->name('postLogin');
    Route::get('register', 'Site\AuthController@register')->name('siteRegister');
    Route::post('postRegister', 'Site\AuthController@postRegister')->name('postRegister');

    // need to be login
    Route::get('profile', 'Site\AuthController@profile')->name('profile')->middleware('auth:user');
    Route::get('logout', 'Site\AuthController@logout')->name('siteLogout')->middleware('auth:user');
    Route::get('editProfile', 'Site\AuthController@editProfile')->name('editProfile')->middleware('auth:user');
    Route::POST('updateProfile', 'Site\AuthController@updateProfile')->name('updateProfile')->middleware('auth:user');
    Route::POST('DeleteAddress', 'Site\AuthController@DeleteAddress')->name('DeleteAddress')->middleware('auth:user');
    Route::POST('addNewAddress', 'Site\AuthController@addNewAddress')->name('addNewAddress')->middleware('auth:user');


    // Cars page
    Route::get('cars', 'Site\CarController@index')->name('cars')->middleware('auth:user');
    Route::get('car-details/{id}', 'Site\CarController@details')->name('carDetails')->middleware('auth:user');

    // About page
    Route::get('about', 'Site\HomeController@about')->name('about');



    //   ContactUs
    Route::get('contact', 'Site\ContactUsController@index')->name('contact');
    Route::post('contact', 'Site\ContactUsController@create')->name('create.contact');


    // Posts page
    Route::get('posts', 'Site\HomeController@posts')->name('posts');
    Route::get('post_details', 'Site\HomeController@postDetails')->name('postDetails');


    Route::resource('reservations','Site\ReservationsController');



Route::get('/clear/route', function () {
    \Artisan::call('optimize:clear');
    return 'done';
});
