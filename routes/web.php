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

Route::get('/','MainController@index');


Route::group(['prefix'=>'panel'],function(){

	Route::get('/dashboard','PanelController@dashboard')->name('admin_dashboard');

	Route::group(['prefix'=>'class'],function(){
	
		Route::get('/add','ClassController@add')->name('class_add');
		Route::post('/add','ClassController@add_do')->name('class_add_do');
	

		Route::get('/edit/{id}','ClassController@edit')->name('class_edit');
		Route::post('/edit','ClassController@edit_do')->name('class_edit_do');

		Route::get('/view','ClassController@view')->name('class_view');
	});


});
