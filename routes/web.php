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


	Route::group(['prefix'=>'section'],function(){
	
		Route::get('/add','SectionController@add')->name('section_add');
		Route::post('/add','SectionController@add_do')->name('section_add_do');
	

		Route::get('/edit/{id}','SectionController@edit')->name('section_edit');
		Route::post('/edit','SectionController@edit_do')->name('section_edit_do');

		Route::get('/view','SectionController@view')->name('section_view');

		Route::get('/delete/{id}','SectionController@delete')->name('section_delete');
	});




});
