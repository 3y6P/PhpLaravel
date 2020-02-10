<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Addreses
Route::group(['prefix'=>'addresses'],function(){
             $controller = 'AddressController';

        Route::get('{address}/remove', "$controller@remove")
         ->name('addresses.remove');
});

Route::resource('addresses','AddressController');

//authorization
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Location
Route::group(['prefix'=>'locations'],function(){
             $controller = 'LocationController';

        Route::get('{location}/remove', "$controller@remove")
         ->name('locations.remove');
});

Route::resource('locations','LocationController');

//Status
Route::group(['prefix'=>'statuses'],function(){
             $controller = 'StatusController';

        Route::get('{status}/remove', "$controller@remove")
         ->name('statuses.remove');
});

Route::resource('statuses','StatusController');

//Type
Route::group(['prefix'=>'types'],function(){
             $controller = 'TypeController';

        Route::get('{type}/remove', "$controller@remove")
         ->name('types.remove');
});

Route::resource('types','TypeController');

//education
Route::group(['prefix'=>'educations'],function(){
             $controller = 'EducationController';

        Route::get('{education}/remove', "$controller@remove")
         ->name('educations.remove');
});

Route::resource('educations','EducationController');

//shedule
Route::group(['prefix'=>'shedules'],function(){
             $controller = 'SheduleController';

        Route::get('{shedule}/remove', "$controller@remove")
         ->name('shedules.remove');
});

Route::resource('shedules','SheduleController');

//day
Route::group(['prefix'=>'days'],function(){
             $controller = 'DayController';

        Route::get('{day}/remove', "$controller@remove")
         ->name('days.remove');
});

Route::resource('days','DayController');

Route::resource('ads','AdController');


//ads
Route::group(['prefix'=>'ads'],function(){
             $controller = 'AdController';

        Route::get('{ad}/remove', "$controller@remove")
         ->name('ads.remove');
});
