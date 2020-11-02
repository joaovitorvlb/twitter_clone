<?php

	session_start();

	if(!$_SESSION['usuario']){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$texto_tweet = $_POST['text_tweet'];
	$usuario = $_SESSION['usuario'];


	if($texto_tweet == '' || $usuario == ''){
		die();
	}

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "INSERT INTO tweet (id_usuario, tweet) VALUES ('$usuario', '$texto_tweet')";

	mysqli_query($link, $sql);

?>