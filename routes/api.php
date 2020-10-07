<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('Api')->group(function(){
  Route::post('/aluno', 'AlunoController@create');

  Route::get('/aluno', 'AlunoController@list');
  Route::get('/aluno/{id}', 'AlunoController@selectById');

  Route::put('/aluno/{id}', 'AlunoController@update');

  Route::delete('/aluno/{id}', 'AlunoController@delete');
});


Route::namespace('Api')->group(function(){
  Route::post('/nota', 'NotaController@create');

  Route::get('/nota/{aluno_id}', 'NotaController@selectNotaById');

});


Route::namespace('Api')->group(function(){
    Route::post('/escola', 'EscolaController@create');

    Route::get('/escola', 'EscolaController@list');

    Route::put('/escola/{id}', 'EscolaController@update');

    Route::delete('/escola/{id}', 'EscolaController@delete');
});


Route::namespace('Api')->group(function(){
    Route::post('/turma', 'TurmaController@create');

    Route::get('/turma', 'TurmaController@list');

    Route::put('/turma/{id}', 'TurmaController@update');

    Route::delete('/turma/{id}', 'TurmaController@delete');
});

