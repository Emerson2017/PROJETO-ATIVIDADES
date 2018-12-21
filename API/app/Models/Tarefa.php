<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
	protected $fillable = ['name', 'description', 'limit_time', 'priority', 'completed'];


    public function allTarefas(){
		return self::all();
    }

    public function saveTarefa($request){
		$data = $request->all();
		$tarefa = new Tarefa();
		$tarefa->fill($data);
		$tarefa->completed = false;
		$tarefa->save();
		return response("Registro criado com Sucesso!", 200);
    }

    public function deleteTarefa($id){
		$tarefa = self::find($id);
		$tarefa->delete();
		return response("Registro deletado com sucesso!", 200);
    }

    public function getTarefa($id){
		return $tarefa = self::find($id);
    }

}
