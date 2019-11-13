
<?php
session_start();
include_once("../conexao.php");
$id_apontamento				= $_GET["id_apontamento"];
	$result_usuario = "DELETE FROM apontamento WHERE id_apontamento = $id_apontamento";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	
	header("Location: ../p_listar_apontamento.php");
