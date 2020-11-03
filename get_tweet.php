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

	$id_usuario = $row['id'];

	$sql = "SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, t.tweet, u.usuario ";
    $sql .= "FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";
    $sql .= "WHERE id_usuario = '$id_usuario' ORDER BY data_inclusao DESC";

	$resultado_id = mysqli_query($link, $sql);

	if($resultado_id){

		while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){

			echo '<a href="#" class="list-group-item">';

			echo '<h4 class="list-group-item-heading">' . $registro['usuario'] . ' <small> - ' . $registro['data_inclusao_formatada'] . '</small></h4>';
			echo '<p class="list-group-item-text">' . $registro['tweet'] . '</p>';

			echo '</a>';
		}
	}else{
	
		echo 'Erro na consulta de tweets no banco de dados!';
		error_log(mysqli_error($link));
	}
?>