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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
	if(Auth::check()){
		return redirect('/admin');
	} else{
		return view('home');
	}
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/order', 'AdminController@order')->name('admin.order');

# Photo
Route::get('/admin/getData', 'AdminController@getData')->name('admin.getData');
Route::get('/admin/insert', 'AdminController@insertData')->name('admin.insert');
Route::post('/admin/insert-process', 'AdminController@insertDataProcess')->name('admin.insertProcess');
Route::post('/admin/edit-process', 'AdminController@editDataProcess')->name('admin.editProcess');
Route::post('/admin/delete-process', 'AdminController@deleteDataProcess')->name('admin.deleteProcess');
Route::get('/admin/check-process', 'AdminController@checkDataProcess')->name('admin.checkProcess');

Route::get('/galery', 'GaleryController@index')->name('galery');


Route::get('/logout', 'AdminController@logout')->name('admin.logout');