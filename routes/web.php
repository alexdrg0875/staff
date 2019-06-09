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

use App\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'admin'], function (){

    Route::resource('admin/users', 'AdminUsersController');
});

Route::group(['middleware' => 'user'], function () {

    Route::get('/admin', function() {
        return view('admin.index');
    });
    Route::get('/admin/staff/tree/' , 'AdminStaffController@tree');
    Route::get('/admin/staff/tree/{id}' , 'AdminStaffController@tree_data');
    Route::get('/admin/staff/fetch_data', 'AdminStaffController@fetch_data');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('admin/staff', 'AdminStaffController');
    Route::resource('admin/positions', 'AdminPositionsController');
    Route::resource('admin/medias', 'AdminMediasController');
});

