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
    // Admin Controller
    Route::get('/admin.index', 'AdminController@index')->name('admin.index');
    Route::get('/admin.show/{id}', 'AdminController@show')->name('admin.show');
    Route::get('/admin.dataUser', 'AdminController@dataUser')->name('admin.dataUser');
    Route::delete('/admin.delete', 'AdminController@destroy')->name('admin.destroy');
    Route::post('/admin.tambahuser', 'AdminController@store')->name('admin.store');
    Route::get('/admin.edituser/{users}/edit', 'AdminController@edit')->name('admin.edit');
    Route::delete('/admin.deleteuser/{id}', 'AdminController@destroy')->name('admin.destroy');
    Route::get('/admin.userhapus','AdminController@userHapus')->name('admin.userHapus');
    Route::post('/admin.useraktif/{id}','AdminController@userAktif')->name('admin.userAktif');
    Route::put('/admin.updateuser/{id}', 'AdminController@update')->name('admin.update');

    // Controller Resource
    Route::resource('jobs', 'JobsController');
    Route::resource('tipejob', 'TipeJobController');
    Route::resource('company', 'CompanyController');
    Route::resource('manage', 'ManageApplyController');
    Route::get('/manage.approve','ManageApplyController@approve')->name('manage.approve');
    Route::get('/manage.reject','ManageApplyController@reject')->name('manage.reject');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth.sentinel','hasUser']], function () {
    Route::get('/visitor.index', 'VisitorController@index')->name('visitor.index');
    Route::get('/visitor.profile', 'VisitorController@profile')->name('visitor.profile');
    Route::post('/visitor.profile.store/{id}', 'VisitorController@store')->name('biodata.store');
    Route::put('/visitor.profile.update/{id}', 'VisitorController@update')->name('biodata.update');
    Route::get('/detail-job/{id}','VisitorController@detail_job')->name('detail_job');
    // Apply CV
    Route::post('/appycv', 'ApplyController@store')->name('apply.store');
});

Route::get('/cari-kerjaan','VisitorController@cari_kerjaan')->name('cari_kerjaan');
Route::get('/list-job','VisitorController@list_job')->name('list-job');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth.sentinel');
Route::get('signup','SentinelController@signup')->name('signup');
Route::post('signup_store','SentinelController@signup_store')->name('signup.store');
Route::get('signin', 'SentinelController@login')->name('signin');
Route::post('login.store', 'SentinelController@login_store')->name('login.store');
