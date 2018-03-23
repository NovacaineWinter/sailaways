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


Route::get('/', 'landingPageController@pageSelector');


Route::get('/configure', 'configController@index');
Route::get('/configure/ajax', 'configController@configAjax');

Route::get('/baseprice', 'dashboardController@baseprice');

Route::get('/optionalextra', 'dashboardController@manageExtra');


Route::get('/extras', 'dashboardController@listOptionalExtras');

Route::get('/configure/save','configController@saveMyConfig');


Route::get('/adminAjax', 'dashboardController@ajax');

Route::post('/adminAjax/imageupload/option', 'dashboardController@imageForOption');


Route::get('/contact', function () {
    return view('contact');
});


Route::get('/stock', 'stockBoatController@index');
Route::get('/stock/detail', 'stockBoatController@detail');


/*
Route::get('stock/detail/{id}', function ($id) {
    return view('stockDetail')->with('id',$id);
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
