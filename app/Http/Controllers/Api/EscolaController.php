<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Escola;


class EscolaController extends Controller
{
    public function create(Request $request){
        try{
            $escola = new Escola();

            $escola->nome = $request->nome;
            $escola->ensino = $request->ensino;
            $escola->cep = $request->cep;
            $escola->save();

            return ['Escola' => $escola];

        }catch(\Exception $erro){
            return ['Erro' => 'erro', 'Details' => $erro];
        }
    }

    public function list(){
        $escola = Escola::All();
        return $escola;
    }

    public function update(Request $request, $id){
        try{
            $escola = Escola::find($id);

            $escola->nome = $request->nome;
            $escola->ensino = $request->ensino;
            $escola->cep = $request->cep;
            $escola->save();

            return $escola;

        }catch(\Exception $erro ){
            return ['Erro' => 'erro', 'Details' => $erro];
        }
    }

    public function delete($id){
        try{

            $escola = Escola::find($id);
            $escola->delete();

            return ['retorno' => 'deletou'];

        }catch(\Exception $erro ){
          return ['Erro' => 'erro', 'Details' => $erro];
        }
    }
}
