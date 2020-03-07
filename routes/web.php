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
Route::get('/admin/login','CustomController@login')->name('login');
Route::post('/admin/login','CustomController@login_do')->name('login_do');
Route::post('/logout','CustomController@logout')->name('logout');



Route::group(['prefix'=>'panel','middleware'=>'auth'],function(){

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
		Route::post('/get_sections','SectionController@get_sections')->name('get_sections');

	});

	Route::group(['prefix'=>'students'],function(){

		Route::get('admission','StudentController@add')->name('students_add');
		Route::post('admission','StudentController@add_do')->name('students_add_do');

		Route::get('admission/edit/{id}','StudentController@edit')->name('students_edit');
		Route::post('admission/edit','StudentController@edit_do')->name('students_edit_do');

		Route::post('delete','StudentController@delete')->name('students_delete');

		Route::get('view','StudentController@view')->name('students_view');

		Route::get('/view-full/{id}','StudentController@view_full')->name('students_view_full');

	});


	Route::group(['prefix'=>'teachers'],function(){

		Route::get('admission','TeacherController@add')->name('teachers_add');
		Route::post('admission','TeacherController@add_do')->name('teachers_add_do');

		Route::get('admission/edit/{id}','TeacherController@edit')->name('teachers_edit');
		Route::post('admission/edit','TeacherController@edit_do')->name('teachers_edit_do');

		Route::post('delete','TeacherController@delete')->name('teachers_delete');

		Route::get('view','TeacherController@view')->name('teachers_view');

		Route::get('/view-full/{id}','TeacherController@view_full')->name('teachers_view_full');

	});



	Route::group(['prefix'=>'attendance'],function(){

		Route::get('/take','AttendanceController@add')->name('attendances_add');
		Route::post('/take','AttendanceController@add_do')->name('attendances_add_do');

		Route::get('/edit/{id}','AttendanceController@edit')->name('attendances_edit');
		Route::post('/edit','AttendanceController@edit_do')->name('attendances_edit_do');

		Route::post('delete','AttendanceController@delete')->name('attendances_delete');

		Route::get('view','AttendanceController@view')->name('attendances_view');

		Route::post('get_students','AttendanceController@get_students')->name('get_students');
		// Route::get('/view-full/{id}','TeacherController@view_full')->name('teachers_view_full');

	});


});
