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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/unpaid', 'UsersController@unpaid')->name('users.unpaid');
Route::post('users/{user}/attach', 'UsersController@attach')->name('users.attach');
Route::post('users/{user}/detach/{id}', 'UsersController@detach')->name('users.detach');
Route::resource('users', 'UsersController');

Route::resource('membershipFee', 'MembershipFeeController')->only('index', 'update');

Route::patch('teams/{team}/detach/{id}', 'TeamController@detach')->name('teams.detach');
Route::resource('teams', 'TeamController');


Route::get('/', 'startPageController@startpage')->name('startpage');
 