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
Route::resource('item-ajax', 'ProjectBoxes');

//Route::any('{all?}','ProjectBoxes@index')->where('all','.+');