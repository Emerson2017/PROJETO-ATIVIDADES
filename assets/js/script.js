$(document).ready(function(){
	GetAllTarefas();
});


function GetAllTarefas(){
	$URL =  "API/public/"	
	  $.ajax({
	  method: "GET",
	  url: $URL + "tarefa",
	  dataType: "JSON",
	  success: function(data) {
		ShowTarefas(data);
	  }});
}