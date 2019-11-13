<?php
session_start();
include_once("../conexao.php");
$id_classes				= $_GET["id_classes"];
	$result_classe = "DELETE FROM classes WHERE id_classes = $id_classes";
	$resultado_classe = mysqli_query($conn, $result_classe);
	
	header("Location: ../listar_classe.php");

