
<?php
session_start();
include_once("../conexao.php");
$id_atividade				= $_GET["id_atividade"];
	$result_atividade = "DELETE FROM atividade WHERE id_atividade = $id_atividade";
	$resultado_atividade = mysqli_query($conn, $result_atividade);
	
	header("Location: ../cad_1000.php");

	
