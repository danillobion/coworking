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
Route::get('/config.project', 'HomeController@projects')->name('config_project');
Route::get('/config.news', 'HomeController@news')->name('config_news');


//nao logado
Route::get('/projetos', function(){return view('project');})->name('projects');
Route::get('/news', function(){return view('news');})->name('news');
