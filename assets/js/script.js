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
			<div class="tarefa flex-row">
				<div class="subtarefa">
					<div class="nome-tarefa flex-row">
						<h5>TAREFA: </h5>
						<p class="ML5">`+value.name+`</p>
					</div>
					<div class="criacao flex-row">
						<h5><strong>CRIADA EM:</strong></h5>
						<p class="ML5">`+value.created_at+`</p>
					</div>
				</div>


				<div class="subtarefa2">
					<div class="row-reverse">
						<p>`+value.priority+`</p>
					</div>

					<div class="container-buttons row-reverse">
						<button href="`+value.id+`" type="button" class="btn btn-danger btn-delete">EXCLUIR</button>
						<button class="btn btn-info">VER</button>
						<button class="btn btn-success">EDITAR</button>
					</div>
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
	  dataType:  "text",
	  data: data,
	  success: function(){
		// tratamento caso a requisição seja sucesso
	  },
	  error: function(data){
		console.log(data);
		// tratamento do erro e apresentação
	  },
	  complete: function(){
		$("#container-tarefas").html('');
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
		$('#modalCadastro').modal('hide');
	});
});


 function DeleteTarefa(id){
	$URL =  "API/public/tarefa/delete/"+id;

	  $.ajax({
	  method: "POST",
	  url: $URL,
	  dataType:  "JSON",
	  success: function(){
	  },
	  error: function(data){
		console.log(data);
	  },
	  complete: function(){
		location.reload();
	  }
	});
}

$(function(){
	$('body').on('click', '.btn-delete', function(){
		var id = $(this).attr('href');
		DeleteTarefa(id);
	});
});