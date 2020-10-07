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
  Route::post('/aluno/create', 'AlunoController@add');

  Route::get('/aluno', 'AlunoController@list');
  Route::get('/aluno/{id}', 'AlunoController@selectById');

  Route::put('/aluno/{id}', 'AlunoController@update');

  Route::delete('/aluno/{id}', 'AlunoController@delete');
});


Route::namespace('Api')->group(function(){
  Route::post('/nota/add', 'NotaController@add');

  Route::get('/nota/{aluno_id}', 'NotaController@selectNotaById');

});


Route::namespace('Api')->group(function(){
    Route::post('/escolas/cadastro', 'EscolaController@create');

    Route::get('/escolas/listar', 'EscolaController@list');

    Route::put('/escolas/alterar/{id}', 'EscolaController@update');

    Route::delete('/escolas/deletar/{id}', 'EscolaController@delete');
});


Route::namespace('Api')->group(function(){
    Route::post('/turma/cadastro', 'TurmaController@create');

    Route::get('/turma/list', 'TurmaController@list');

    Route::put('/turma/update/{id}', 'TurmaController@update');

    Route::delete('/turma/delete/{id}', 'TurmaController@delete');
});

