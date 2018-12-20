<!DOCTYPE html>
<html>
	<head>
		<title>GERENCIAMENTO DE TAREFAS</title>
		<meta charset=utf-8>
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>

		<!-- font OSWALD -->
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>

	<body>
		<header class="header">
			<div>
				<h2>GERENCIMANETO DE TAREFAS</h2>
				<button id="new-tarefa" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">+ NOVA TAREFA</button>
			</div>
		</header>

		<!--MODAL-->
		<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Cadastro de Tarefas</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<section>
					<input type="text" name="name" placeholder="name" id="inputName" class="form-control">
					<input type="text" name="description" placeholder="description" id="inputDescription" class="form-control">
					<input type="date" name="limit_time" placeholder="limit_time" id="inputLimit" class="form-control">
					<input type="text" name="priority" placeholder="priority" id="inputPriority" class="form-control">
					<input type="checkbox" name="completed" id="inputCompleted" class="form-check-label">
				</section>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="btn-post">cadastrar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<section id="container-geral">
			<div id="container-tarefas">

			</div>
		</section>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	</body>
</html>