<?php
session_start();
include('conexao_login.php'); // incluindo a conexão ao bd
if (empty($_POST['usuario']) || empty($_POST['senha'])) { 
	header('Location: cadcursos.php'); 
	exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT usuario_id, usuario FROM `usuario` WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if($row == 1){
	$_SESSION['usuario'] = $usuario;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado']= true;
	header('Location: index.php');
	exit();
}