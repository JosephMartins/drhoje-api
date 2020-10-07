<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Aluno;
use App\Matricula;

class AlunoController extends Controller
{

    public function create(Request $request){
        \DB::beginTransaction();
        try{
            $aluno = new Aluno();

            $aluno->nome = $request->nome;
            $aluno->idade = $request->idade;
            $aluno->save();

            $matricula = new Matricula();
            $matricula->matricula = $request->matricula;
            $matricula->aluno_id = $aluno->id;
            $matricula->save();
            \DB::commit();
            return ['Aluno' => $aluno, 'Matricula' => $matricula];

        }catch(\Exception $erro){
            return ['Erro' => 'erro', 'Details' => $erro];
            \DB::rollback();
        }
    }

    public function list(){
        $aluno = \DB::table('alunos')
                        ->join('matriculas', 'alunos.id', '=', 'matriculas.aluno_id')
                        ->select('alunos.*', 'matriculas.matricula')
                        ->get();
        return $aluno;
    }



    public function selectById($id){
        $aluno = Aluno::find($id);
        return $aluno;
    }

    public function update(Request $request, $id){
        try{
            $aluno = Aluno::find($id);

            $aluno->nome = $request->nome;
            $aluno->matricula = $request->matricula;
            $aluno->idade = $request->idade;

            $aluno->save();
            return $aluno;

        }catch(\Exception $erro ){
            return ['Erro' => 'erro', 'Details' => $erro];
        }
    }

    public function delete($id){
        try{

            $aluno = Aluno::find($id);
            $aluno->delete();
            return ['retorno' => 'ok'];

        }catch(\Exception $erro ){
          return ['Erro' => 'erro', 'Details' => $erro];
        }
    }


}
