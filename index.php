<!DOCTYPE html>
<html>
	<head>
		<title>GERENCIAMENTO DE TAREFAS</title>
		<meta charset=utf-8>
		<meta name=viewport content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
	</head>

	<body>
		<header class="header">
			<div>
				<h2>GERENCIMANETO DE TAREFAS</h2>
			</div>
		</header>

		<section>
			<input type="text" name="name" placeholder="name" id="inputName">
			<input type="text" name="description" placeholder="description" id="inputDescription">
			<input type="date" name="limit_time" placeholder="limit_time" id="inputLimit">
			<input type="text" name="priority" placeholder="priority" id="inputPriority">
			<input type="checkbox" name="completed" id="inputCompleted">

			<input type="submit" name="btn_submit" value="POST" id="btn-post">
		</section>


	</body>
</html>