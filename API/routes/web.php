<?php

// API ROUTES

Route::group(['prefix' => 'atividade'], function(){
	Route::get('', function(){
		return 'TODAS AS ATIVIDADES';
	});

	Route::get('/{id}',  function($id){
		return 'ATIVIDADE  DE ID '.$id;
	});

	
}); 
 

























