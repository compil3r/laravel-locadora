 <?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('/', 'FuncionariosController');

Route::resource('funcionarios', 'FuncionariosController');

Route::resource('clientes', 'ClienteController');

Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

Route::resource('locacao', 'LocacaoController');

Route::resource('filmes', 'FilmeController');

Route::get('/locar', ['as' => 'locar', 'uses' => 'LocacaoController@create']);