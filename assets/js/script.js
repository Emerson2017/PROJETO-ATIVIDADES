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

function ShowTarefas(data){
	var tarefas = data;

	tarefas.forEach(function(value, index){
		$("#container-tarefas").append(`
			<div class="tarefa">
				<div class="nome-tarefa">
					<h5>TAREFA: </h5>
					<p class="ML5">`+value.name+`</p>
				</div>
				<div class="criacao">
					<h5>CRIADA EM: </h5>
					<p class="ML5">`+value.created_at+`</p>
				</div>
			</div>
			`);
	})
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

$(function(){
	$('#btn-post').click(function(){
		var complete = false;
		if ($("#inputCompleted").prop("checked")){
			var complete = true;
		}
		var  data = {
			name: $("#inputName").val(),
			description : $("#inputDescription").val(),
			limit_time :  $("#inputLimit").val(),
			priority : $("#inputPriority").val(),
			completed : complete
		};
		PostTarefa(data);
	});
});