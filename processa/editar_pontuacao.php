<?php
	include_once("../conexao.php");
	$id_pontuacao = mysqli_real_escape_string($conn, $_POST['id_pontuacao']);
	$classe = mysqli_real_escape_string($conn, $_POST['classe']);
	$atividade = mysqli_real_escape_string($conn, $_POST['atividade']);
	$pontuacao = mysqli_real_escape_string($conn, $_POST['pontuacao']);
	$observacao = mysqli_real_escape_string($conn, $_POST['observacao']);
	$data = mysqli_real_escape_string($conn, $_POST['data']);
	
	$result_pontuacao = "UPDATE pontuacao SET `classe`='$classe', `atividade`='$atividade', `pontuacao`='$pontuacao', `observacao`='$observacao', `data`='$data' WHERE id_pontuacao = '$id_pontuacao'";

	$resultado_pontuacao = mysqli_query($conn, $result_pontuacao);	
		header("Location: ../listar_pontuacao.php");
?>