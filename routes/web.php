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

        
Auth::routes();


Route::group(['middleware' => 'auth'], function() {
Route::get('/home', 'UsersController@index')->name('home');
Route::get('/users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::post('/users/{id}/update', 'UsersController@update')->name('users.update');
Route::get('/users/{id}/destroy', 'UsersController@destroy')->name('users.destroy');
     
});

Route::get('/',array('as'=>'login',function(){
      return view('auth.login');
}));

           