<?php

// API ROUTES


Route::group(['prefix' => 'tarefa'], function(){
	Route::get('', 'TarefaController@allTarefas');
	Route::get('/{id}', 'TarefaController@getTarefa');
	Route::get('/Prioritys/all', 'TarefaController@allPrioritys');

	Route::post('', 'TarefaController@saveTarefa');
	Route::post('/delete/{id}', 'TarefaController@deleteTarefa');
	Route::post('/edit/{id}', 'TarefaController@editTarefa');
}); 
 

























