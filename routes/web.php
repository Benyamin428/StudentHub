<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. 
|
*/

Route::get('/', 'PagesController@index');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/assignments/create', [
    'uses' => 'AssignmentsController@store',
    'as' => 'teacher',
    'middleware' => 'roles',
    'roles' => ['Teacher']
]);

Route::resource('assignments', 'AssignmentsController');
Auth::routes();


Route::get('/dashboard', 'DashboardController@index');

Route::get('/admin', [
    'uses' => 'RolesController@getAdminPage',
    'as' => 'admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('/admin/assign-roles', [
    'uses' => 'RolesController@postAdminAssignRoles',
    'as' => 'admin.assign',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('/add_subject', 'SubjectController@index');

Route::post('/add_subject', 'SubjectController@postSubject');

Route::get('group_chat', 'ChatController@index');
Route::get('group_chat/1', 'ChatController@chat');
Route::post('send', 'ChatController@send');

Route::post('saveToSession','ChatController@saveToSession');
Route::post('getOldMessage','ChatController@getOldMessage');
