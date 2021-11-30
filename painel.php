<head>
	<title>Redirecionamento</title>
	<link rel="shortcut icon" type="imagex/png" href="img/cadastro.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body align = center>
<?php
include('verifica_login.php');
?>
<h2>Olá, <?php echo $_SESSION['usuario'];?> você está logado, Deseja:</h2>
<h2><a href="cadcursos.php">Ir para a tela de cadastros</a></h2>
<h1>Ou</h1>
<h2><a href="logout.php">Sair</a></h2>
<img src="img/loading.gif" align="center">
</body>

