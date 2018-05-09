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
use Illuminate\Support\Facades\Input;

Route::get('/', 'HomeController@get')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home-test');

/** TEST */
Route::get('/help', 'HelpController@get')->middleware('auth');
Route::post('/help', 'HelpController@create')->middleware('auth');

/** APP */
Route::get('/users', 'UserController@get')->name('usuarios');

Route::get('/projects', 'ProjectController@getList')->name('proyecto');
Route::get('/create-project', 'ProjectController@get')->name('crear-proyecto');
Route::post('/create-project', 'ProjectController@create')->name('crear-proyecto-p');

Route::get('/evaluations', 'EvaluationController@get')->name('evaluacion');

Route::get('/evaluation-cal', 'EvaluationItemController@get')->name('evaluacion-calificacion');
Route::post('/evaluation-cal', 'EvaluationItemController@operation')->name('evaluacion-calificacion-p');

Route::get('/reports', 'ReportController@get')->name('reporte');
