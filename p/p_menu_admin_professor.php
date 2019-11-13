<?php
  $nomeprofessor = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];
    include_once("conexao.php");
  
$dia = date("j");
$mes = date("n");
$ano = date("Y");

//$hoje = date(" j, F, Y, g:i a");                 // March 10, 2001, 5:16 pm
//echo "$hoje";
  $conn_apontamento = mysqli_connect($servidor, $usuario, $senha, $dbname);

$sql_nome_associado = mysqli_query($conn_apontamento , "SELECT *, (professorassociado) nomeprofessorassociado FROM classes where numerodaclasse = $numerologin");
    while ($dados_nome_associado = mysqli_fetch_array($sql_nome_associado)){
      extract($dados_nome_associado);
    } 

?>
<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="p_administrativo_professor.php">Escola Sabatina</a>

</div>
	<div id="navbar" class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class= "btn btn-secondary"' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Adicionar <span class="caret"></span></a>
												<ul class="dropdown-menu">
												<li><a href="p_cad_check.php">Apontamento</button></a>
												<li><a href="p_cad_usuario_visitante.php">Visitante</button></a>
							</ul>
						</li>
					</ul>
						<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class= "btn btn-secondary"' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar <span class="caret"></span></a>
												<ul class="dropdown-menu">
												<li><a href="p_listar_aluno.php">Aluno</button></a>
												<li><a href="p_listar_visitante.php">Visitante</button></a>
							</ul>
						</li>
					</ul>
					<!--Relatório  -->
					</ul>
						<ul class="nav navbar-nav">
								<li class="dropdown">
									<a href="#" class= "btn btn-light"' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatorio <span class="caret"></span></a>
												<ul class="dropdown-menu">
												<li><a href="p_pesq_termometro_classe.php">Termometro Classe</button></a>
												
							</ul>
						</li>
					</ul>
					<!--Relatório Fim -->

					<a class="navbar-brand" href="sair.php">Sair</a>

				</div><!--/.nav-collapse -->
					<font color="#FF8C00"> <?php echo "$dia/$mes/$ano - Ola $nomeprofessor e $nomeprofessorassociado";?></font>
			</div>
			
		</nav>
		