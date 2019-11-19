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

Route::get('/', 'HomeController@awal');

Auth::routes();

Route::group(['middleware' => ['auth.sentinel','hasAdmin']], function () {
    Route::get('/admin.index', 'AdminController@index')->name('admin.index');
    Route::get('/admin.dataUser', 'AdminController@dataUser')->name('admin.dataUser');
    Route::delete('/admin.delete', 'AdminController@destroy')->name('admin.destroy');
    Route::post('/admin.tambahuser', 'AdminController@store')->name('admin.store');
    Route::get('/admin.edituser/{users}/edit', 'AdminController@edit')->name('admin.edit');
    Route::delete('/admin.deleteuser/{id}', 'AdminController@destroy')->name('admin.destroy');
    Route::resource('jobs', 'JobsController');
    Route::resource('tipejob', 'TipeJobController');
    Route::resource('company', 'CompanyController');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth.sentinel','hasUser']], function () {
    Route::get('/visitor.index', 'VisitorController@index')->name('visitor.index');
    Route::get('/visitor.profile', 'VisitorController@profile')->name('visitor.profile');
    Route::post('/visitor.profile.store', 'VisitorController@store')->name('biodata.store');
    Route::put('/visitor.profile.update/{id}', 'VisitorController@update')->name('biodata.update');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth.sentinel');
Route::get('signup','SentinelController@signup')->name('signup');
Route::post('signup_store','SentinelController@signup_store')->name('signup.store');
Route::get('signin', 'SentinelController@login')->name('signin');
Route::post('login.store', 'SentinelController@login_store')->name('login.store');
