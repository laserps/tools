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

//Tools
Route::get('trellotoexcel','ExportController@trellotoexcel');
Route::get('ajaxGetData','ExportController@ajaxGetData');

//Card
Route::get('card',function(){
    return view('trellotoexcel.card');
});

Route::get('resizeimage','ResizeImageController@getresize');
Route::get('resizeimage/{path}','ResizeImageController@resize');

Route::get('phpinfo',function(){
    phpinfo();
});

Route::get('loop',function(){
    return view('resize');
});