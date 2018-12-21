<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
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


    public function editTarefa($id, $request){
		$newTarefa = $request->all();
		$tarefa  = self::find($id);

		if(!$tarefa){
			return response("Tarefa não encontrada", 400);
		}

		if($newTarefa['completed'] == "true"){
			$newTarefa['completed'] = true;
		}else{
			$newTarefa['completed']  = false;
		}

		$tarefa->fill($newTarefa);
		$tarefa->completed = $newTarefa['completed'];
		$tarefa->save();
		return response($tarefa, 200);
    }

    public function allPrioritys(){
		$prioritys = DB::table('tarefas')->select('priority','completed')->get();;
		return $prioritys;
    }

}
