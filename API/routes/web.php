<?php

// API ROUTES


Route::group(['prefix' => 'tarefa'], function(){
	Route::get('', 'TarefaController@allTarefas');
	Route::post('', 'TarefaController@saveTarefa');
	Route::post('/delete/{id}', 'TarefaController@deleteTarefa');
	
}); 
 

























