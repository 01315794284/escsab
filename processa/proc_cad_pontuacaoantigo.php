<?php
	include_once("../conexao.php");
	$numerodaclasse = mysqli_real_escape_string($conn, $_POST['numerodaclasse']);
	$pontuacaonova = mysqli_real_escape_string($conn, $_POST['pontuacaonova']);
	$pontuacao = mysqli_real_escape_string($conn, $_POST['pontuacao']);

	$total = $pontuacaonova + $pontuacao;

$result_classes = "UPDATE classes SET  `pontuacao`='$total' WHERE numerodaclasse = '$numerodaclasse'";

	$resultado_classes = mysqli_query($conn, $result_classes);	
		header("Location: ../listar_classe.php");
?>