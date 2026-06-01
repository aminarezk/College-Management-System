<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes();
        Route::get('user/result', 'ResultController@index')->name('user.result');
        Route::get('first/show/', 'ResultController@show')->name('first.show');
        Route::get('first/create/', 'ResultController@create')->name('first.create');
        Route::post('first/store/', 'ResultController@store')->name('first.store');

        
        Route::get('sec/show/', 'ResultController@show')->name('sec.show');
        Route::get('sec/create/', 'ResultController@create')->name('sec.create');
        Route::post('sec/store/', 'ResultController@store')->name('sec.store');

        Route::get('third/show/', 'ResultController@show')->name('third.show');
        Route::get('third/create/', 'ResultController@create')->name('third.create');
        Route::post('third/store/', 'ResultController@store')->name('third.store');

        Route::get('fourth/show/', 'ResultController@show')->name('fourth.show');
        Route::get('fourth/create/', 'ResultController@create')->name('fourth.create');
        Route::post('fourth/store/', 'ResultController@store')->name('fourth.store');


        Route::group(['middleware' => 'checkrole'], function () {
            Route::get('/home', 'HomeController@index')->name('home');
            //users
            Route::get('/users', 'UserController@index')->name('users.index');
            Route::get('/users/create', 'UserController@create')->name('users.create');
            Route::post('/users/store', 'UserController@store')->name('users.store');
            Route::get('/users/show/{id}', 'UserController@show')->name('users.show');
            Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
            Route::put('/users/update/{id}', 'UserController@update')->name('users.update');
            Route::delete('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');

            //subjects
            Route::get('/subjects', 'SubjectController@index')->name('subjects.index');
            Route::get('/subjects/create', 'SubjectController@create')->name('subjects.create');
            Route::post('/subjects/store', 'SubjectController@store')->name('subjects.store');
            Route::get('/subjects/show/{subject}', 'SubjectController@show')->name('subjects.show');
            Route::get('/subjects/edit/{subject}', 'SubjectController@edit')->name('subjects.edit');
            Route::put('/subjects/update/{subject}', 'SubjectController@update')->name('subjects.update');
            Route::delete('/subjects/destroy/{subject}', 'SubjectController@destroy')->name('subjects.destroy');

               //mark
            Route::get('/marks', 'MarkController@index')->name('marks.index');
            Route::get('/marks/create', 'MarkController@create')->name('marks.create');
            Route::post('/marks/store', 'MarkController@store')->name('marks.store');
            Route::get('/marks/show/{mark}', 'MarkController@show')->name('marks.show');
            Route::get('/marks/edit/{mark}', 'MarkController@edit')->name('marks.edit');
            Route::put('/marks/update/{mark}', 'MarkController@update')->name('marks.update');
            Route::delete('/marks/destroy/{mark}', 'MarkController@destroy')->name('marks.destroy');

                //attendece
                Route::get('/att', 'AttendanceController@index')->name('att.index');
                Route::get('/att/create', 'AttendanceController@create')->name('att.create');
                Route::post('/att/store', 'AttendanceController@store')->name('att.store');
                Route::get('/att/show/{attendance}', 'AttendanceController@show')->name('att.show');
                Route::get('/att/edit/{attendance}', 'AttendanceController@edit')->name('att.edit');
                Route::put('/att/update/{attendance}', 'AttendanceController@update')->name('att.update');
                Route::delete('/att/destroy/{attendance}', 'AttendanceController@destroy')->name('att.destroy');





            });
    }
);
