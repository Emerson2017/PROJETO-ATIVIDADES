<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
	protected $tarefa = null;

	public function __construct(Tarefa $Tarefa){
		$this->tarefa = $Tarefa;
	}

	public function allTarefas(){
		return $this->tarefa->allTarefas();
	}

	public function saveTarefa(Request $request){
		return $this->tarefa->saveTarefa($request);
	}

	public function deleteTarefa($id){
		return $this->tarefa->deleteTarefa($id);
	}

	public  function getTarefa($id){
		return $this->tarefa->getTarefa($id);
	}

	public  function editTarefa($id, Request $request){
		return $this->tarefa->editTarefa($id, $request);
	}

	public function allPrioritys(){
		return $this->tarefa->allPrioritys();
	}
}
