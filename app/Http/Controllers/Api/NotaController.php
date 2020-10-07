<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Nota;


class NotaController extends Controller
{
    public function selectNotaById($id){
        try{
            $nota = Nota::where('aluno_id', $id)->firstOrFail();
            return $nota;
        }catch(\Exception $erro ){
            return ['Erro' => 'erro', 'Details' => $erro];
      }
    }

    public function create(Request $request){
        try{
            $nota = new Nota();

            $nota->aluno_id = $request->aluno_id;
            $nota->semestre1 = $request->semestre1;
            $nota->semestre2 = $request->semestre2;
            $nota->materia = $request->materia;
            $nota->save();

            return $nota;

        }catch(\Exception $erro ){
          return ['Erro' => 'erro', 'Details' => $erro];
        }
    }
}
