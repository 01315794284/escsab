<?php
	include_once("../conexao.php");
	$id_atividade = mysqli_real_escape_string($conn, $_POST['id_atividade']);
	$atividade = mysqli_real_escape_string($conn, $_POST['atividade']);
	
	$result_usuarios = "UPDATE atividade SET `atividade`='$atividade' WHERE id_atividade = '$id_atividade'";

	$resultado_usuarios = mysqli_query($conn, $result_usuarios);	
		header("Location: ../cad_1000.php");
?>