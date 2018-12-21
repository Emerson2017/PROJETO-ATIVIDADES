<!DOCTYPE html>
<html>
	<head>
		<title>GERENCIAMENTO DE TAREFAS</title>
		<meta charset=utf-8>
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>

		<!-- BOOTSTRAP -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
							<option value="MEDIA">MEDIA</option>
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
						<label class="label-edit-prazo" for="inputLimit">Prazo: <p id="error-prazo"></p></label>
						<input type="date" name="limit_time" placeholder="prazo" class="form-control" required="required" id="prazo-edit">
					</div>
					<div class="form-group">
						<label class="label-edit-error" for="inputPriority">Prioridade: <p id="error-prioridade"></p></label>
						<select name="" class="form-control" required="required"  id="priority-edit">
							<option value="" disabled selected>Selecione uma prioridade</option>
							<option value="MUITO ALTA">MUITO ALTA</option>
							<option value="ALTA">ALTA</option>
							<option value="MEDIA">MEDIA</option>
							<option value="BAIXA">BAIXA</option>
						</select>
					</div>
					<div class="form-group">
						<label for="inputDescription">Descrição: </label>
						<textarea rows="4" cols="50" name="description"  class="form-control" required="required"  id="description-edit"></textarea>
					</div>

					<div  class="form-group">
						<label for="inputCompleted">STATUS</label>
						<select class="form-control" required="required" id="edit-Completed">
							<option value="0">EM ANDAMENTO</option>
							<option value="1">CONCLUÍDA</option>
						</select>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" id="btn-edit" data-id="" data-status="" value="ATUALIZAR"/>
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


		<!-- POPPER JS -->
		<script src="assets/js/popper.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>