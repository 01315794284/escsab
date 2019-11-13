<?php
	session_start();	
	//Incluindo a conexão com banco de dados
	include_once("conexao.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['login'])) && (isset($_POST['senha']))){
		$login = mysqli_real_escape_string($conn, $_POST['login']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		//$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT id_usuarios, nome, niveis_acesso_id, login, senha  FROM usuarios WHERE login = '$login' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//Nível 3 = Admin
		//Nível 2 = Aluno
		//Nível 1 = Professor

		if(isset($resultado)){
			$_SESSION['usuarioId'] 					= $resultado['id_usuarios'];
			$_SESSION['usuarioNome'] 				= $resultado['nome'];
			$_SESSION['usuarioNiveisAcessoId'] 		= $resultado['niveis_acesso_id'];
			$_SESSION['usuarioLogin'] 				= $resultado['login'];
			if($_SESSION['usuarioNiveisAcessoId'] == "3"){
				header("Location: administrativo.php");
			}elseif($_SESSION['usuarioNiveisAcessoId'] == "1"){
				header("Location: p_administrativo_professor.php");
				$_SESSION['loginErro'] = "Nível de Acesso Não Autorizado";
			}else{
				header("Location: index.php");
			}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: index.php");
	}
?>