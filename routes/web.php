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
/** Login */
Route::get('/login', 'AuthController@getLogin')->name('login');
Route::post('/login', 'AuthController@login')->name('login-p');
Route::get('/logout', 'AuthController@getLogout')->name('logout');
Route::get('/register', 'AuthController@getRegister')->name('registro');
Route::post('/register', 'AuthController@createUser')->name('registro-p');

/** TEST */
Route::get('/help', 'HelpController@get');
Route::post('/help', 'HelpController@create');

/** APP */
Route::get('/users', 'UserController@get')->name('usuarios');
Route::get('/detail-user', 'UserController@detailUser')->name('detalle-usuario');

Route::get('/projects', 'ProjectController@getList')->name('proyecto');
Route::get('/create-project', 'ProjectController@get')->name('crear-proyecto');
Route::post('/create-project', 'ProjectController@create')->name('crear-proyecto-p');

Route::get('/detail-project', 'ProjectController@getDetailProject')->name('detalle-proyecto');
Route::get('/register-project', 'ProjectController@getproyectregister')->name('proyecto-registrar');

Route::get('/evaluations', 'EvaluationController@get')->name('evaluacion');
Route::post('/evaluations', 'EvaluationController@operation')->name('evaluacion-p');

Route::get('/evaluation-cal', 'EvaluationItemController@get')->name('evaluacion-calificacion');
Route::post('/evaluation-cal', 'EvaluationItemController@operation')->name('evaluacion-calificacion-p');

Route::get('/reports', 'ReportController@get')->name('reporte');

Route::get('/requests', 'AuthController@getusertemp')->name('peticion');
<<<<<<< HEAD

=======
>>>>>>> 4b27b826fe3e8d3d1bd7e93f02d3f56ef6e2c9bd

Route::get('/attached', 'ProjectController@getFile')->name('archivo-mostrar');
Route::post('/detail-project', 'ProjectController@createFile')->name('archivo-crear');

