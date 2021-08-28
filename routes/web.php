<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('/user/trashedUsers', 'App\Http\Controllers\UserController@trashedUsers');
	Route::get('/user/restoreUser/{user}', 'App\Http\Controllers\UserController@restoreUser');
	Route::delete('/user/deletePermanently/{user}', 'App\Http\Controllers\UserController@deletePermanently');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('articles','App\Http\Controllers\ArticleController');
// Route for get articles for yajra post request.
Route::get('get-articles', 'App\Http\Controllers\ArticleController@getArticles')->name('get-articles');
	Route::get('leaveapps', 'App\Http\Controllers\LeavesController@leaveApplications');
	Route::resource('leaves', 'App\Http\Controllers\LeavesController');
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
	// Resource Route for article.

});
Route::get('user/notifications', 'App\Http\Controllers\UserController@notifications');


