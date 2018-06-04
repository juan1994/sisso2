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
Route::get('/rememberpassword', 'AuthController@getReset')->name('recordar-contrasena');
Route::post('/rememberpassword', 'AuthController@operationReset')->name('recordar-contrasena-p');
Route::get('/resetpassword', 'AuthController@getResetPassword')->name('restablecer-contrasena');
Route::post('/resetpassword', 'AuthController@operationResetPassword')->name('restablecer-contrasena-p');

/** APP */
Route::get('/users', 'UserController@get')->name('usuarios');
Route::post('/users', 'UserController@operationStatusUser')->name('usuarios-op');
Route::get('/detail-user', 'UserController@getDetailUser')->name('detalle-usuario');
Route::post('/detail-user', 'UserController@operationUser')->name('actualizar-usuario');

Route::get('/projects', 'ProjectController@getList')->name('proyecto');
Route::get('/detail-project', 'ProjectController@getDetailProject')->name('detalle-proyecto');
Route::get('/register-project', 'ProjectController@getProjectRegister')->name('proyecto-registrar');
Route::post('/register-project', 'ProjectController@createProjectRegister')->name('proyecto-registrar-p');
Route::get('/update-project', 'ProjectController@getUpdateProject')->name('proyecto-actualizar');
Route::post('/update-project', 'ProjectController@updateProject')->name('proyecto-actualizar-p');

Route::get('/evaluations', 'EvaluationController@get')->name('evaluacion');
Route::post('/evaluations', 'EvaluationController@operation')->name('evaluacion-p');

Route::get('/evaluation-cal', 'EvaluationItemController@get')->name('evaluacion-calificacion');
Route::post('/evaluation-cal', 'EvaluationItemController@operation')->name('evaluacion-calificacion-p');

Route::get('/reports', 'ReportController@get')->name('reporte');

Route::get('/requests', 'AuthController@getusertemp')->name('peticion');
Route::post('/requests', 'AuthController@createUserTemp')->name('peticion-p');


Route::get('/attached', 'ProjectController@getFile')->name('archivo-mostrar');
Route::post('/detail-project', 'ProjectController@operation')->name('archivo-crear');

Route::resource('user-code', 'UserController',
                ['only' => ['show']]);

