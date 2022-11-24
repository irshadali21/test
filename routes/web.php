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

// Route::get('/test/{id}', 'HomeController@test');

// Route::get('/migrate', function () {
//     $exitCode = Artisan::call('migrate');
//     return 'migrate';
// });
// Route::get('/migrate/rollback', function () {
//     $exitCode = Artisan::call('migrate:rollback');
//     return 'migrate:rollback';
// });

// Route::get('/clear-cache', function () {
//     $exitCode = Artisan::call('optimize:clear');
//     return 'optimize:cleare'; //Return anything
// });
// Route::get('/link-storage', function () {
//     $exitCode = Artisan::call('storage:link');
//     return 'storage linked'; //Return anything
// });

Route::get('/emailtemplatecheck', function () {
    return view('lavelina.email');
});

Route::get('/', function () {
    return redirect()->route('home');
});

//////////////////////////
Route::get('/assignment', [
    'uses' => 'AssignmentController@index',
    'as' => 'assignment.index',
]);
Route::get('/certificate/dummy', [
    'uses' => 'AssignmentController@certificate',
    'as' => 'certificate.dummy',
]);
Route::get('/pdf2', [
    'uses' => 'AssignmentController@pdf2',
    'as' => 'assignment.index',
]);



Route::group(['middleware' => ['auth', 'verified', 'admin']], function () {

    //crud routes

    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

    Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

    Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

    Route::post(
        'generator_builder/generate-from-file',
        '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
    )->name('io_generator_builder_generate_from_file');

});


//////////////////////
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified', 'stampCheck']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/components', function () {
        return view('components');
    })->name('components');

    Route::resource('users', 'UserController');

    Route::post('/users/Update/{id}', [
        'uses' => 'UserController@update_user',
        'as' => 'users.update_user',
    ]);

    Route::get('/profile', 'UserController@profile')->name('profile.edit');

    Route::post('/profile', 'UserController@profileUpdate')->name('profile.update');

    Route::resource('roles', 'RoleController')->except('show');

    Route::resource('permissions', 'PermissionController')->except(['show', 'destroy', 'update']);

    Route::get('/activity-log', 'SettingController@activity')->name('activity-log.index');

    Route::get('/settings', 'SettingController@index')->name('settings.index');

    Route::post('/settings', 'SettingController@update')->name('settings.update');

    Route::get('media', function () {
        return view('media.index');
    })->name('media.index');



    //files routes

    Route::resource('files', 'FileController');

    Route::post('/files/create/get-data-database', [
        'uses' => 'FileController@get_data_database',
        'as' => 'files.get_data_database',
    ]);
    Route::post('/files/create/get-data-creditsafe', [
        'uses' => 'FileController@get_data_api',
        'as' => 'files.get_data_api',
    ]);

    Route::get('/files/file/client/{id}', [
        'uses' => 'FileController@client_assignment',
        'as' => 'files.client_assignment',
    ]);

    Route::get('/files/file/advisor/{id}', [
        'uses' => 'FileController@advoiser_assignment',
        'as' => 'files.advoiser_assignment',
    ]);
    Route::get('/files/file/client/download/{id}', [
        'uses' => 'FileController@client_assignment_download',
        'as' => 'files.client_assignment_download',
    ]);

    Route::get('/files/file/advisor/download/{id}', [
        'uses' => 'FileController@advoiser_assignment_download',
        'as' => 'files.advoiser_assignment_download',
    ]);

    //Certificate

    Route::get('certificate/test', function () {
        return view('certificate.test');});

    Route::resource('certificate', 'CertificateController');
    
    Route::get('/certificate/send/{id}', [
        'uses' => 'CertificateController@send',
        'as' => 'certificate.send',
    ]);
    
    Route::post('/search', [
        'uses' => 'HomeController@search',
        'as' => 'search',
    ]);
    
    //Reports
    
    Route::get('/reports', [
        'uses' => 'ReportController@index',
        'as' => 'reports.index',
    ]);

    Route::post('/reports', [
        'uses' => 'ReportController@create',
        'as' => 'getreport',
    ]);
    

    //LaVelina
    Route::resource('lavelina', 'LaVelinaController');

      //download csv
      Route::post('/download/csv', [
        'uses' => 'DownloadController@download_csv',
        'as' => 'download.csv',
    ]);

});




Route::resource('laVelinaClusters', 'LaVelinaClusterController');
