<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "listadecursos";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname) or die (' Não foi possível conectar');