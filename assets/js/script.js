$(document).ready(function(){
	GetAllTarefas();
	getAllPrioritys();
});

var arrPrioritys = [];
function inputArray(data){
	var prioritys = data;
	prioritys.forEach(function(value, index){
		arrPrioritys.push(value);
	});
}


function ShowContentEmpty(){
	$('#container-tarefas').append(`
		<div id="content-empty">
			<p>NO MOMENTO NÃO EXISTEM TAREFAS CADASTRADAS.</p>
			<img id="empty-tarefa" src="assets/img/empty-tarefa.png">
		</div>

		`);

	$('#container-tarefas').css({
		"display": "flex",
		"align-items": "center",
		"justify-content": "center"
	});
}

function GetAllTarefas(){
	$URL =  "API/public/";
	  $.ajax({
	  method: "GET",
	  url: $URL + "tarefa",
	  dataType: "JSON",

	  success: function(data,textStatus,xhr){
		if(xhr.status == "204"){
			ShowContentEmpty();
		}else if(xhr.status == "200"){
			ShowTarefas(data);
		}
	   },
	  error: function(data){

	  }});
}


function verifyPriority(prioridade){
	var priority = prioridade;

	var muitoAlta = ["MUITO ALTA", 0];
	var alta = ["ALTA", 0];
	var media = ["MEDIA", 0];
	var baixa = ["BAIXA", 0];


	var IsMuitoAlta = false;
	for (var i = 0; i < arrPrioritys.length ; i++) {
			if(muitoAlta[0] == arrPrioritys[i]['priority'] && muitoAlta[1] == arrPrioritys[i]['completed']){
				IsMuitoAlta = true;
				break;
			}
	}

	var IsAlta = false;
	for (var i = 0; i < arrPrioritys.length ; i++) {
			if(alta[0] == arrPrioritys[i]['priority'] && alta[1] == arrPrioritys[i]['completed']){
				IsAlta = true;
				break;
			}
	}

	var IsMedia = false;
	for (var i = 0; i < arrPrioritys.length ; i++) {
			if(media[0] == arrPrioritys[i]['priority'] && media[1] == arrPrioritys[i]['completed']){
				IsMedia = true;
				break;
			}
	}

	var IsBaixa = false;
	for (var i = 0; i < arrPrioritys.length ; i++) {
			if(baixa[0] == arrPrioritys[i]['priority'] && baixa[1] == arrPrioritys[i]['completed']){
				IsBaixa = true;
				break;
			}
	}

	if(priority == "BAIXA" && IsMedia || priority == "BAIXA" && IsAlta ||
		priority == "BAIXA" && IsMuitoAlta){
		return false;
	}else if(priority == "MEDIA" && IsAlta || priority == "MEDIA" && IsMuitoAlta){
		return false;
	}else if(priority == "ALTA" && IsMuitoAlta){
		return false;
	}

	return true;

}



function ShowTarefas(data){
	var tarefas = data;
	$('#container-tarefas').css({
		"display": "block"
	});
	tarefas.forEach(function(value, index){
		var status = null;
		value.completed ? status = "Concluída" : status = "Em Andamento";

		$("#container-tarefas").append(`
			<div class="tarefa flex-row">
				<div class="subtarefa">
					<div class="nome-tarefa flex-row">
						<h5><strong>TAREFA:</strong> </h5>
						<p class="ML5">`+value.name+`</p>
					</div>
					<div class="criacao flex-row">
						<h5><strong>STATUS:</strong></h5>
						<p class="ML5">`+status+`</p>
					</div>
				</div>


				<div class="subtarefa2">
					<div class="row-reverse container-priority">
						<p>`+value.priority+`</p>
						<h5><strong>Prioridade: </strong></h5>
					</div>

					<div class="container-buttons row-reverse">
						<button href="`+value.id+`" type="button" class="btn btn-danger btn-delete">EXCLUIR</button>
						<button data-id="`+value.id+`" class="btn btn-info  btn-view" data-target="#modalView" data-toggle="modal">VER</button>
						<button data-id="`+value.id+`" data-status="`+value.completed+`" class="btn btn-success modal-edit" data-target="#modalEdit" data-toggle="modal">EDITAR</button>
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
	  },
	  error: function(data){
	  },
	  complete: function(){
		$("#container-tarefas").html('');
		console.log("teste");
		GetAllTarefas();
		arrPrioritys = [];
		getAllPrioritys();
	  }
	});
}

$(function(){
	$('#formCadastro').submit(function(event) {
		event.preventDefault();

		var  data = {
			name: $("#inputName").val(),
			description : $("#inputDescription").val(),
			limit_time :  $("#inputLimit").val(),
			priority : $("#inputPriority").val(),
			completed : false
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



function ReadTarefa(tarefa){
	var status = null;
	tarefa.completed ? status = "Concluída" : status = "Em Andamento";
	$('#content-read-tarefa').append(`
		<div><strong>ID:</strong> `+tarefa.id+`</div>
		<div><strong>NOME:</strong> `+tarefa.name+`</div>
		<div><strong>PRAZO:</strong> `+tarefa.limit_time+`</div>
		<div><strong>PRIORIDADE:</strong> `+tarefa.priority+`</div>
		<div class="view-desc"><strong>DESCRIÇÃO:</strong> `+tarefa.description+`</div>
		<div><strong>STATUS:</strong> `+status+`</div>


		`);

}




function getTarefa(id){
	$URL =  "API/public/tarefa/"+id;
	  $.ajax({
	  method: "GET",
	  url: $URL,
	  dataType: "JSON",
	  sucess: function(data){
	  },
	  error: function(data){
	  },
	  complete:function(data){
		$('#content-read-tarefa').html('');
		ReadTarefa(data.responseJSON);
	  }

	});

}


$(function(){
	$('body').on('click', '.btn-view', function(){
		var id = $(this).attr('data-id');
		getTarefa(id);
	});
});



 function editTarefa(id, data){
	$URL =  "API/public/tarefa/edit/"+id;
		  $.ajax({
		  method: "POST",
		  url: $URL,
		  dataType:  "JSON",
		  data: data,
		  success: function(){
		  },
		  error: function(data){
		  },
		  complete: function(data){
			$("#container-tarefas").html('');
			GetAllTarefas();
			$('#modalEdit').modal('hide');
		  }
		});
}




function inputValues(data, status){
	$('#name-edit').val(data.name);
	$('#prazo-edit').val(data.limit_time);
	$('#priority-edit').val(data.priority);
	$('#description-edit').val(data.description);
	$('#edit-Completed').val(status);

}



$(function(){
	$('body').on('click', '.modal-edit', function(){
		var id = $(this).attr('data-id');
		var  status = $(this).attr('data-status');
		var statusDB = status == 1 ? "1" : "0";
		arrPrioritys = [];
		getAllPrioritys();
		$('#error-prioridade').html('');
		$('#priority-edit').css("border-color", "#ced4da");
		$('#error-prazo').html('');
		$('#btn-edit').attr('data-id', id);
		$('#btn-edit').attr('data-status', status);

		$URL =  "API/public/tarefa/"+id;
		$.ajax({
		  method: "GET",
		  url: $URL,
		  dataType: "JSON",
		  complete: function(data){
			$tarefa = data.responseJSON;
			inputValues($tarefa, statusDB);
		  }});
	});
});


function getAllPrioritys(){
	  $URL =  "API/public/tarefa/Prioritys/all";

	  $.ajax({
	  method: "GET",
	  url: $URL,
	  dataType: "JSON",
	  sucess:function(data){
	  }, error:  function(data){
	  }, complete:  function(data){
		inputArray(data.responseJSON);
	  }

	});
}


$(function(){
	$('#formEdit').submit(function(event) {
		event.preventDefault();
		var id = $('#btn-edit').attr('data-id');
		var statusDB = $('#btn-edit').attr('data-status');
		var prazo = $("#prazo-edit").val();
		var date = new Date(prazo.split('/').reverse().join('/'));
		var statusInput = $("#edit-Completed").val();
		$('#prazo-edit').css("border-color", "#ced4da");
		$('#error-prazo').html('');

		if(statusDB != statusInput && statusInput == 1){
			if (date < new Date()) {
				$('#error-prazo').html('PRAZO ESGOTADO.');
				$('#prazo-edit').css("border-color", "red");
				return false;
			}

			if(!verifyPriority($('#priority-edit').val())){
				$('#error-prioridade').html('EXISTEM TAREFAS COM MAIOR PRIORIDADE EM ANDAMENTO');
				$('#priority-edit').css("border-color", "red");
				return false;
			}
		}

		var status = null;
		if ($("#edit-Completed").val() == 0){
			status = false;
		}else{
			status = true;
		}

		var  data = {
			name: $("#name-edit").val(),
			description : $("#description-edit").val(),
			limit_time :  $("#prazo-edit").val(),
			priority : $("#priority-edit").val(),
			completed : status
		};

		editTarefa(id, data);
	});
})