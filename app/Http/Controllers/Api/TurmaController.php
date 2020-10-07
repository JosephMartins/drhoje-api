<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Turma;

class TurmaController extends Controller
{
    public function create(Request $request){
        try{
            $turma = new Turma();

            $turma->turma = $request->turma;
            $turma->escola_id = $request->escola_id;
            $turma->save();

            return ['Turma' => $turma];

        }catch(\Exception $erro){
            return ['Erro' => 'erro', 'Details' => $erro];
        }
    }

    public function list(){
        $turma = Turma::All();
        return $turma;
    }

    public function update(Request $request, $id){
        try{
            $turma = Turma::find($id);

            $turma->turma = $request->turma;
            $turma->escola_id = $request->escola_id;
            $turma->save();

            return $turma;
        }catch(\Exception $erro ){
            return ['Erro' => 'erro', 'Details' => $erro];
        }
    }

    public function delete($id){
        try{

            $turma = Turma::find($id);
            $turma->delete();

            return ['retorno' => 'deletou'];

        }catch(\Exception $erro ){
          return ['Erro' => 'erro', 'Details' => $erro];
        }
    }

}
