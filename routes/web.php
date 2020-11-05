<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//password reset
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//posts
Route::resource('posts','PostController');
//comments
Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store' ]);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
//profile and users
// Route::post('createstudent', 'UserController@createstudent')->name('createstudent');
Route::get('author/{id}', 'UserController@author')->name('users.author');
Route::resource('users', 'UserController');


//courses
Route::resource('courses', 'CourseController')->except('create');
//pages
// Route::get('/', 'PagesController@getIndex');
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
//video chat
// Route::get('rooms', "VideoRoomsController@index");
// Route::prefix('room')->middleware('auth')->group(function() {
//    Route::get('join/{roomName}', 'VideoRoomsController@joinRoom');
//    Route::post('create', 'VideoRoomsController@createRoom');
// });
//messages
Route::get('/messages', 'MessageController@index')->name('messages.index');
Route::get('/messages/{ids}', 'MessageController@chat')->name('messages.chat');
//Generating the Access Token
Route::post('/token', 'TokenController@generate');

//zoomintegration

Route::get('/', function () {
    return view('app');
});

Route::get('/{any}', function () {
    return view('app');
})->where('any','.*');