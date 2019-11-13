<?php
	include_once("../conexao.php");
	$id_usuarios = mysqli_real_escape_string($conn, $_POST['id_usuarios']);
	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$login = mysqli_real_escape_string($conn, $_POST['login']);
	$senha = mysqli_real_escape_string($conn, $_POST['senha']);
	$endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
	$datanascimento = mysqli_real_escape_string($conn, $_POST['datanascimento']);
	$databatismo = mysqli_real_escape_string($conn, $_POST['databatismo']);
	$telefone1 = mysqli_real_escape_string($conn, $_POST['telefone1']);
	$telefone2 = mysqli_real_escape_string($conn, $_POST['telefone2']);
	$classe = mysqli_real_escape_string($conn, $_POST['classe']);
	$adventista = mysqli_real_escape_string($conn, $_POST['adventista']);
	$licao = mysqli_real_escape_string($conn, $_POST['licao']);
	$niveis_acesso_id = mysqli_real_escape_string($conn, $_POST['niveis_acesso_id']);
	
	$result_usuarios = "UPDATE usuarios SET `nome`='$nome', `email`='$email', `login`='$login', `senha`='$senha', `endereco`='$endereco', `datanascimento`='$datanascimento', `databatismo`='$databatismo', `telefone1`='$telefone1', `telefone2`='$telefone2', `classe`='$classe', `adventista`='$adventista', `licao`='$licao', `niveis_acesso_id`='$niveis_acesso_id'  WHERE id_usuarios = '$id_usuarios'";

	$resultado_usuarios = mysqli_query($conn, $result_usuarios);	
		header("Location: ../listar_aluno.php");
?>