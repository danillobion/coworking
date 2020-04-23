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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
//logado
Route::get('/home', 'HomeController@index')->name('config_home');

  //project
Route::get('/config.project', 'HomeController@projects')->name('config_project');
Route::post('/add.project', 'ProjectController@addProject')->name('add_project');
Route::post('/edit.project', 'ProjectController@editProject')->name('edit_project');
Route::post('/delete.project', 'ProjectController@deleteProject')->name('delete_project');

  //news
Route::get('/config.news', 'HomeController@news')->name('config_news');
Route::post('/add.news', 'NewsController@addNews')->name('add_news');
Route::post('/edit.news', 'NewsController@editNews')->name('edit_news');
Route::post('/delete.news', 'NewsController@deleteNews')->name('delete_news');


//nao logado
Route::get('/projetos', function(){return view('project');})->name('projects');
Route::get('/news', function(){return view('news');})->name('news');
