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
Route::namespace('Admin')->prefix('admin')->group(function (){
    $this->get('/panel','PanelController@index');
    $this->resource('articles','ArticleController');
    $this->resource('Courses', 'CourseController');
    $this->resource('episodes', 'EpisodeController');
    $this->post('/panel/upload-image','PanelController@UploadImageSubject');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
