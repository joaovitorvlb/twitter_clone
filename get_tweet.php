<?php

	session_start();

	if(!$_SESSION['usuario']){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario = $_SESSION['usuario'];

	$sql = "SELECT id FROM usuarios WHERE usuario = '$usuario'";

	$resultado_id = mysqli_query($link, $sql);

    $row = $resultado_id->fetch_array(MYSQLI_ASSOC);

	error_log($row['id']);

?>