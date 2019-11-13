
<?php
session_start();
include_once("../conexao.php");
$id_pontuacao				= $_GET["id_pontuacao"];
	$result_pontuacao = "DELETE FROM pontuacao WHERE id_pontuacao = $id_pontuacao";
	$resultado_pontuacao = mysqli_query($conn, $result_pontuacao);
	
	header("Location: ../listar_pontuacao.php");
