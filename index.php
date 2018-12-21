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
				<h2>GERENCIAMENTO DE TAREFAS</h2>
				<button id="new-tarefa" class="btn btn-primary" data-toggle="modal" data-target="#modalCadastro">+ NOVA TAREFA</button>
			</div>
		</header>

		<!--MODAL DE CADASTRO-->
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
				<form id="formCadastro">
					<div class="form-group">
						<label for="inputName">Nome:</label>

						<input  required="required" type="text" name="name" placeholder="nome" id="inputName" class="form-control" />

					</div>
					<div class="form-group">
						<label for="inputLimit">Prazo: </label>
						<input type="date" name="limit_time" placeholder="prazo" id="inputLimit" class="form-control" required="required">
					</div>
					<div class="form-group">
						<label for="inputPriority">Prioridade: </label>
						<select id="inputPriority" name="" class="form-control" required="required">
							<option value="" disabled selected>Selecione uma prioridade</option>
							<option value="MUITO ALTA">MUITO ALTA</option>
							<option value="ALTA">ALTA</option>
							<option value="MÉDIA">MÉDIA</option>
							<option value="BAIXA">BAIXA</option>
						</select>
					</div>
					<div class="form-group">
						<label for="inputDescription">Descrição: </label>
						<textarea rows="4" cols="50" name="description" id="inputDescription" class="form-control" required="required"></textarea>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn-post" value="CADASTRAR"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
		      </div>
		    </div>
		  </div>
		</div>


		<!--MODAL DE VISUALIZAÇÃO DA TAREFA-->
		<div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">DETALHES DA TAREFA</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<form id="formView">
					<div id="content-read-tarefa" class="flex-center">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
		      </div>
		    </div>
		  </div>
		</div>

		<!--MODAL DE EDIÇÃO DA TAREFA -->
		<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">EDIÇÃO DA TAREFA</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<form id="formEdit">
					<div class="form-group">
						<label for="inputName">Nome:</label>
						<input  required="required" type="text" name="name" placeholder="nome" class="form-control" id="name-edit" />

					</div>
					<div class="form-group">
						<label for="inputLimit">Prazo: </label>
						<input type="date" name="limit_time" placeholder="prazo" class="form-control" required="required" id="prazo-edit">
					</div>
					<div class="form-group">
						<label for="inputPriority">Prioridade: </label>
						<select name="" class="form-control" required="required"  id="priority-edit">
							<option value="" disabled selected>Selecione uma prioridade</option>
							<option value="MUITO ALTA">MUITO ALTA</option>
							<option value="ALTA">ALTA</option>
							<option value="MÉDIA">MÉDIA</option>
							<option value="BAIXA">BAIXA</option>
						</select>
					</div>
					<div class="form-group">
						<label for="inputDescription">Descrição: </label>
						<textarea rows="4" cols="50" name="description"  class="form-control" required="required"  id="description-edit"></textarea>
					</div>

					<div  class="form-group">
						<label for="inputCompleted">STATUS</label>
						<select name="" class="form-control" required="required" id="edit-Completed">
							<option value="" disabled selected>STATUS DA TAREFA</option>
							<option value="0">EM ANDAMENTO</option>
							<option value="1">CONCLUÍDA</option>
						</select>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn-edit" data-id="" value="ATUALIZAR"/>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
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