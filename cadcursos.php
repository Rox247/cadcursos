<?php
	include_once("conexao.php");
	$result_cursos = "SELECT * FROM cursos";
	$resultado_cursos = mysqli_query($conn, $result_cursos);
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="imagex/png" href="img/cadastro.ico">
		<title>Cadastro de Cursos</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<h2>Olá, <?php echo $_SESSION['usuario'];?></h2>
			<h5>Horário de login: <?php date_default_timezone_set('America/Sao_Paulo');
  echo date('d/m/Y \à\s H:i:s');?></h5>
			<h2><a href="logout.php">Sair</a></h2>
			<div class="page-header">
				<h1>Cursos disponíveis</h1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div>
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Curso</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="http://localhost/cadastro/processa_cad.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="recipient-name" class="control-label">Nome:</label>
									<input name="nome" type="text" class="form-control">
								</div>
								<div class="form-group">
									<label for="message-text" class="control-label">Detalhes:</label>
									<textarea name="detalhes" class="form-control"></textarea>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nome do Curso</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_cursos = mysqli_fetch_assoc($resultado_cursos)){ ?>
								<tr>
									<td><?php echo $rows_cursos['id']; ?></td>
									<td><?php echo $rows_cursos['nome']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_cursos['id']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_cursos['id']; ?>" data-whatevernome="<?php echo $rows_cursos['nome']; ?>"  data-whateverdetalhes="<?php echo $rows_cursos['detalhes']; ?>">Editar</button>
										
										<a href="processa_apagar.php?id=<?php echo $rows_cursos['id']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>
								<div class="modal fade" id="myModal<?php echo $rows_cursos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_cursos['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<p><?php echo $rows_cursos['id']; ?></p>
												<p><?php echo $rows_cursos['nome']; ?></p>
												<p><?php echo $rows_cursos['detalhes']; ?></p>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		
		
	
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Cursos</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="http://localhost/cadastro/processa.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label">Detalhes:</label>
								<textarea name="detalhes" class="form-control" id="detalhes-text"></textarea>
							</div>
							<input name="id" type="hidden" id="id_curso">
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger">Alterar</button>
							</div>
						</form>
					</div>			  
				</div>
			</div>
		</div>
		
		
		
		

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) 
				var recipient = button.data('whatever')
				var recipientnome = button.data('whatevernome')
				var recipientdetalhes = button.data('whateverdetalhes')
				var modal = $(this)
				modal.find('.modal-title').text('ID do Curso: ' + recipient)
				modal.find('#id_curso').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#detalhes-text').val(recipientdetalhes)
			})
		</script>
	</body>
</html>