<?php
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
  session_start();}
$dia = date("d/m/Y");
 $usuario_logado = $_SESSION['usuarioNome'];

?>
  	<a href="administrativo.php"><button type="button" class="btn btn-dark btn-lg btn-block">Inicio</button></a>
      <a href="cad_check.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Apontamento</button></a>
      <a href="cad_usuario_aluno.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Aluno</button></a>
      <a href="cad_usuario_visitante.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Visitante</button></a>
      <a href="cad_classe.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Classe</button></a>
      <a href="cad_pontuacao.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Pontuacao</button></a>
      <a href="cad_1000.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Atividade</button></a>
      <a href="listar_aluno.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Alunos</button></a>
      <a href="listar_visitante.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Visitantes</button></a>
      <a href="listar_classe.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Classes</button></a>
      <a href="listar_apontamento.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Apontamento</button></a>
      <a href="listar_pontuacao.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Pontuacao</button></a>
      <a href="termometro_menu.php"><button type="button" class="btn btn-primary btn-lg btn-block">Termometro</button></a>
					<center><font color="#39a35b"> <?php echo "$dia - $usuario_logado";?></font></center>
  	<a href="sair.php"><button type="button" class="btn btn-danger btn-lg btn-block">Sair</button></a>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/path/to/bootstrap.css" rel="stylesheet" type="text/css" />

    <link href="/path/to/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/path/to/custom.css" rel="stylesheet" type="text/css" />

    </head>
<body>

    ...

    <script src="/path/to/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="/path/to/bootstrap.js" type="text/javascript"></script>
</body>
</html>