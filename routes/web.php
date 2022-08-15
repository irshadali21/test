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
Route::get('/test/exec', function () {
    echo shell_exec('git pull');
    // echo shell_exec('git pull');
});
Route::get('/test/{id}', 'HomeController@test');
   
Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
    return 'migrate'; 
});
Route::get('/migrate/rollback', function () {
    $exitCode = Artisan::call('migrate:rollback');
    return 'migrate:rollback'; 
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('optimize:clear');
    return 'optimize:cleare'; //Return anything
}); 
Route::get('/link-storage', function () {
    $exitCode = Artisan::call('storage:link');
    return 'storage linked'; //Return anything
});


Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/ass', function () {
    return view('assignment.index');
});
Route::get('/assignment', [
    'uses' => 'AssignmentController@index',
    'as' => 'assignment.index',
]);

Auth::routes(['verify'=>true]);


Route::group(['middleware' => ['auth','verified', 'stampCheck']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/components', function(){
        return view('components');
    })->name('components');


    Route::resource('users', 'UserController');

    Route::get('/profile', 'UserController@profile')->name('profile.edit');

    Route::post('/profile', 'UserController@profileUpdate')->name('profile.update');

    Route::resource('roles', 'RoleController')->except('show');

    Route::resource('permissions', 'PermissionController')->except(['show','destroy','update']);

    Route::resource('category', 'CategoryController')->except('show');

    Route::resource('post', 'PostController');

    Route::get('/activity-log', 'SettingController@activity')->name('activity-log.index');

    Route::get('/settings', 'SettingController@index')->name('settings.index');

    Route::post('/settings', 'SettingController@update')->name('settings.update');


    Route::get('media', function (){
        return view('media.index');
    })->name('media.index');

    //API Routes
    Route::get('/api/testing', [
        'uses' => 'ApiDataController@index',
        'as' => 'api.index',
        'middleware' => 'permission:view-api'
    ]);
    Route::post('/api/test/check', [
        'uses'=> 'ApiDataController@test',
        'as' => 'api.test',
        'middleware'=> 'permission:test-api'
    ]);

    //files routes

    Route::get('/files/index', [
        'uses'=> 'FileController@index',
        'as' => 'file.index',
        'middleware'=> 'permission:file-index'
    ]);
    Route::get('/files/create', [
        'uses'=> 'FileController@create',
        'as' => 'file.create',
        'middleware'=> 'permission:file-create'
    ]);
    Route::post('/files/create/get-data', [
        'uses'=> 'FileController@get_data',
        'as' => 'file.get_data',
        'middleware'=> 'permission:file-create'
    ]);
    Route::post('/files/store', [
        'uses'=> 'FileController@store',
        'as' => 'file.store',
        'middleware'=> 'permission:file-store'
    ]);


});
