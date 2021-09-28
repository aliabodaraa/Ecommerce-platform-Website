<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//User Routes


Route::get('/', function () {
   // dd(Auth::user());

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

//Admin Routes
Route::group(['middleware' => ['auth','Admin']], function () {
    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('dashboard');
    Route::get('admin', function(){
     return redirect()->route('dashboard');
    });
	Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController', ['except' => ['show']]);
	Route::resource('admin/admins', 'App\Http\Controllers\Admin\AdminController', ['except' => ['show']]);
	Route::resource('admin/tracks', 'App\Http\Controllers\Admin\TrackController');
	Route::resource('admin/courses', 'App\Http\Controllers\Admin\CourseController');
	Route::resource('admin/videos', 'App\Http\Controllers\Admin\VideoController');
    Route::resource('admin/quizzes', 'App\Http\Controllers\Admin\QuizController');
    Route::resource('admin/questions', 'App\Http\Controllers\Admin\QuestionController');
    Route::resource('admin/track.courses', 'App\Http\Controllers\Admin\TrackCoursesController');
    //suppose we have foder videos inside courses folder //Route::resource('admin/courses.videos', 'App\Http\Controllers\Admin\QuestionController'); ?? why admin/courses/videos
	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\Admin\ProfileController@edit']);
           //as means alias(altenative) look like name('profile.edit')
    Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\Admin\ProfileController@update']);
    Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\Admin\ProfileController@password']);

    
    Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');

});

