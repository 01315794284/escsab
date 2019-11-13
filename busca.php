<?php
	//Incluir a conexão com banco de dados
	include_once('conexao.php');
	
	//Recuperar o valor da palavra
	$usuarios = $_POST['palavra'];
	
	//Pesquisar no banco de dados nome do curso referente a palavra digitada pelo usuário
	$usuarios = "SELECT * FROM usuarios WHERE nome LIKE '%$usuarios%'";
	$resultado_usuarios = mysqli_query($conn, $usuarios);
	
	if(mysqli_num_rows($resultado_usuarios) <= 0){
		echo "Nenhum aluno encontrado...";
	}else{
		while($linhas = mysqli_fetch_assoc($resultado_usuarios)){
			echo "<li>".$linhas['nome']."</li>";
		}
	}
?>