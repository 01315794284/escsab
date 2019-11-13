<?php
session_start();
include_once("../conexao.php");
$id_visitantes				= $_GET["id_visitantes"];
	$result_visitante = "DELETE FROM visitantes WHERE id_visitantes = $id_visitantes";
	$resultado_visitante = mysqli_query($conn, $result_visitante);
	
	header("Location: ../p_listar_visitante.php");

