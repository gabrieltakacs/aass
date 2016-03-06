<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses' => 'IndexController@homepage',
    'as' => 'homepage'
]);

/*
 * AJAJ Controller
 */
Route::get('/ajaj', [
    'uses' => 'AjajController@index',
    'as' => 'ajaj'
]);

Route::post('/ajaj/store', [
    'uses' => 'AjajController@store'
]);

Route::get('/ajaj/cities', [
    'uses' => 'AjajController@cities',
]);

/*
 * AJAX Controller
 */
Route::get('/ajax', [
    'uses' => 'AjaxController@index',
    'as' => 'ajax'
]);

Route::post('/ajax/store', [
    'uses' => 'AjaxController@store'
]);

Route::get('/ajax/cities', [
    'uses' => 'AjaxController@cities',
]);
