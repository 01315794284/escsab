<?php
session_start();
include_once("../conexao.php");

$nome 				= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);// $_POST["nome"];//
$email 				= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);// $_POST["email"];//
$endereco 			= filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);// $_POST["endereco"];//
$datanascimento		= filter_input(INPUT_POST, 'datanascimento', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$databatismo 		= filter_input(INPUT_POST, 'databatismo', FILTER_SANITIZE_STRING);// $_POST["databatismo"];//
$telefone1 			= filter_input(INPUT_POST, 'telefone1', FILTER_SANITIZE_STRING);// $_POST["telefone1"];//
$telefone2			= filter_input(INPUT_POST, 'telefone2', FILTER_SANITIZE_STRING);// $_POST["telefone2"];//
$login				= filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);// $_POST["login"];//
$senha 				= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);// $_POST["senha"];//
$niveis_acesso_id 	= filter_input(INPUT_POST, 'niveis_acesso_id', FILTER_SANITIZE_STRING);// $_POST["niveis_acesso_id"];//
$classes 			= filter_input(INPUT_POST, 'classes', FILTER_SANITIZE_STRING);// $_POST["niveis_acesso_id"];//
$licao 				= filter_input(INPUT_POST, 'licao', FILTER_SANITIZE_STRING);// $_POST["niveis_acesso_id"];//
$adventista 		= filter_input(INPUT_POST, 'adventista', FILTER_SANITIZE_STRING);// $_POST["niveis_acesso_id"];//


$result_usuario = "INSERT INTO `usuarios` (`id_usuarios`, `nome`, `login`, `email`, `senha`, `endereco`, `datanascimento`, `databatismo`, `telefone1`, `telefone2`, `niveis_acesso_id`, `classe`, `licao`, `adventista`) VALUES (NULL, '$nome', '$login', '$email', '$senha', '$endereco', '$datanascimento', '$databatismo', '$telefone1', '$telefone2', '$niveis_acesso_id', '$classes', '$licao', '$adventista')";
$resultado_usuario = mysqli_query($conn, $result_usuario);


 
if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../listar_aluno.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: ../listar_aluno.php");
}
