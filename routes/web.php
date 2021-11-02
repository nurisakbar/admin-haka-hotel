<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Auth::routes();
Route::get('/', 'UserController@index');

Route::resource('hotel', 'HotelController');
Route::resource('facilities', 'FacilityController');

// Route for room type
Route::get('roomType', 'RoomTypeController@index');
Route::get('roomType/create', 'RoomTypeController@create');
Route::get('hotel/{id}/roomType', 'RoomTypeController@showRoom');
Route::get('hotel/{idHotel}/roomtype/{idRoom}', 'RoomTypeController@show');
Route::get('hotel/{idHotel}/roomtype/{idRoom}/edit', 'RoomTypeController@edit');
Route::put('hotel/{idHotel}/roomtype/{idRoom}', 'RoomTypeController@update');
Route::get('hotel/{idHotel}/roomtype/{idRoom}/delete', 'RoomTypeController@destroy');
Route::post('hotel/{id}/roomtype', 'RoomTypeController@store');

Route::get('facilities/{id}/delete', 'FacilityController@destroy');
Route::get('hotel/{id}/delete', 'HotelController@destroy');

// Route for Select2
Route::get('select2regency', 'AjaxController@select2regency');
