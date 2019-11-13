<?php
session_start();
include_once("../conexao.php");

$atividade 				= filter_input(INPUT_POST, 'atividade', FILTER_SANITIZE_STRING);// $_POST["atividade"];//

$result_atividade = "INSERT INTO `atividade` (`id_atividade`, `atividade`) VALUES (NULL, '$atividade')";
$resultado_atividade = mysqli_query($conn, $result_atividade);


 
if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../cad_1000.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: ../cad_1000.php");
}
