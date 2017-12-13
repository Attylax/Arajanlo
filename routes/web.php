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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('my_projects', 'ProjectBoxes@manageItemAjax');
Route::get('my_projects', 'Boxes@manageItemAjax');

Route::get('furnitures', 'Furnitures@index');
Route::get("furniture_items", 'FurnitureItemsController@index');