
<?php
session_start();
include_once("../conexao.php");
$id_usuarios				= $_GET["id_usuarios"];
	$result_usuario = "DELETE FROM usuarios WHERE id_usuarios = $id_usuarios";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	
	header("Location: ../listar_aluno.php");
