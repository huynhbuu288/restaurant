<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('trangchu','App\Http\Controllers\HomeController@index');


//
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');

///menu
Route::get('/add-menu','App\Http\Controllers\MenuController@add_menu_controller');
Route::get('/edit_menu/{menu_id}','App\Http\Controllers\MenuController@edit_menu');
Route::get('/delete_menu/{menu_id}','App\Http\Controllers\MenuController@delete_menu');
Route::get('/all-menu','App\Http\Controllers\MenuController@all_menu_controller');

Route::get('/unactive-menu/{menu_id}','App\Http\Controllers\MenuController@unactive_menu');
Route::get('/active-menu/{menu_id}','App\Http\Controllers\MenuController@active_menu');

Route::post('/save_menu','App\Http\Controllers\MenuController@save_menu');

Route::post('/update-menu/{menu_id}','App\Http\Controllers\MenuController@update_menu');

///Rooms
Route::get('/add-room','App\Http\Controllers\RoomController@add_room_controller');
Route::get('/edit_room/{room_id}','App\Http\Controllers\RoomController@edit_room');
Route::get('/delete_room/{room_id}','App\Http\Controllers\RoomController@delete_room');
Route::get('/all-room','App\Http\Controllers\RoomController@all_room_controller');

Route::get('/unactive-room/{room_id}','App\Http\Controllers\RoomController@unactive_room');
Route::get('/active-room/{room_id}','App\Http\Controllers\RoomController@active_room');

Route::post('/save_room','App\Http\Controllers\RoomController@save_room');

Route::post('/update-room/{room_id}','App\Http\Controllers\RoomController@update_room');

///Type
Route::get('/add-type','App\Http\Controllers\TypeController@add_type_controller');
Route::get('/edit_type/{type_id}','App\Http\Controllers\TypeController@edit_type');
Route::get('/delete_type/{type_id}','App\Http\Controllers\TypeController@delete_type');
Route::get('/all-type','App\Http\Controllers\typeController@all_Type_controller');

Route::get('/unactive-type/{type_id}','App\Http\Controllers\TypeController@unactive_type');
Route::get('/active-type/{type_id}','App\Http\Controllers\TypeController@active_type');

Route::post('/save_type','App\Http\Controllers\typeController@save_Type');

Route::post('/update-type/{type_id}','App\Http\Controllers\typeController@update_Type');

