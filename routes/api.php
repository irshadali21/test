<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::resource('ateco_tables', 'ateco_tableAPIController');


Route::resource('province_tables', 'province_tableAPIController');


Route::resource('sector_tables', 'sector_tableAPIController');
