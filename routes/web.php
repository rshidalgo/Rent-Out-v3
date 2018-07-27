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

/*
Route::get('/hello', function () {
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name. ' with an id of '.$id;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/admin/condos', 'PagesController@condo');
// Route::get('/admin/users', 'PagesController@user');
// Route::get('/admin/users/{$id}/paid', 'PagesController@index', function($id)
// {
//     return 'Hello World this is user_id '.$id;
// })->name('paid');

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'EmailConfirmController@confirm'
]);

Route::post('reserved{post}', 'PostController@reserve');
Route::post('reactivate{post}', 'PostController@reactivate');
Route::post('remove{post}', 'PostController@remove');

Route::resource('post', 'PostController');
Route::get('/admin/users', 'AdminController@users_index');
Route::get('paid{admin}', 'AdminController@user_paid');
Route::get('block{admin}', 'AdminController@user_block');
Route::post('activate{admin}', 'AdminController@condo_active');
Route::post('deactivate{admin}', 'AdminController@condo_inactive');

Route::resource('admin', 'AdminController');
Route::get('search', 'PostController@search')->name('search');

Route::get('sitevisit','Email@siteVisit');
Route::get('reserve','Email@reserve');
Route::get('book','Email@book');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/profile', 'UserController@profile');
Route::post('/profile/update', 'UserController@update');

Route::get('excel', 'ExcelController@export');
Route::get('/report', 'ExcelController@excel');
