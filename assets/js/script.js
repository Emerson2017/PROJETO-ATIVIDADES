$(document).ready(function(){
	GetAllTarefas();
});


function GetAllTarefas(){
	$URL =  "API/public/";
	  $.ajax({
	  method: "GET",
	  url: $URL + "tarefa",
	  dataType: "JSON",
	  success: function(data) {
		ShowTarefas(data);
	  }});
}


 function PostTarefa(data){
	$URL =  "API/public/";
	  $.ajax({
	  method: "POST",
	  url: $URL + "tarefa",
	  dataType:  "JSON",
	  data: data,
	  success: function(data) {
		GetAllTarefas();
	  }
	});
}