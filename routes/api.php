<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});


Route::group(['middleware' => ['jwt']], function () {

    Route::get('templates', 'TemplatesController@index')->name('template.index');

    Route::post('template', 'TemplatesController@store')->name('template.store');
    Route::get('template/{template_id}', 'TemplatesController@show')->name('template.show');
    Route::put('template/{template_id}', 'TemplatesController@update')->name('template.update');

    Route::delete('template/{template_id}', 'TemplatesController@destroy')->name('template.destroy');

    Route::get('clients','ClientsController@index')->name('clients.index');
    Route::post('client','ClientsController@store')->name('clients.store');
    Route::get('clients/{client_id}', 'ClientsController@show')->name('clients.show');
    Route::put('clients/{client_id}', 'ClientsController@update')->name('clients.update');
    Route::delete('clients/{client_id}', 'ClientsController@destroy')->name('clients.destroy');

    Route::get('sends','SendsController@index')->name('sends.index');
    Route::post('send','SendsController@store')->name('sends.store');
    Route::put('sends/{send_id}', 'SendsController@update')->name('sends.update');
    Route::delete('sends/{send_id}', 'SendsController@destroy')->name('sends.destroy');

});