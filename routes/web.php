<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//posts
Route::resource('posts','PostController');
//comments
Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store' ]);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
//profile and users
// Route::post('createstudent', 'UserController@createstudent')->name('createstudent');
Route::get('author/{id}', 'UserController@index')->name('users.index');
Route::resource('users', 'UserController')->except('index');

//courses
Route::resource('courses', 'CourseController')->except('create');
//pages
Route::get('/', 'PagesController@getIndex');
Route::get('aboutus', 'PagesController@getAbout');
Route::get('contactus', ['uses'=>'PagesController@getContact', 'as'=>'home']);
Route::post('contactus', 'PagesController@postContact');
//classrooms
Route::resource('classrooms', 'ClassroomController')->except('store');
Route::post('classrooms/{course_id}', 'ClassroomController@store')->name('classrooms.store');
//students
Route::resource('students', 'StudentController');
//supervisor
Route::resource('supervisors', 'SupervisorController');
