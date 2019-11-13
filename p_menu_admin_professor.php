<?php
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
  session_start();}
  $dia = date("d/m/Y");
  $usuario_logado = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Sloan ALT">
    <link rel="icon" href="imagens/es.ico">

    <title>Administrativo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
  </head>

  <body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">

      <div class="list-group list-group-flush">
        <a href="p_administrativo_professor.php"><button type="button" class="btn btn-dark btn-lg btn-block">Inicio</button></a>
        
        <a href="p_cad_check.php"><button type="button" class="btn btn-success btn-lg btn-block">+ Apontamento</button></a>
        <a href="p_cad_usuario_visitante.php"><button type="button" class="btn btn-success btn-lg btn-block">+ Visitante</button></a>

        <a href="p_listar_aluno.php"><button type="button" class="btn btn-warning btn-lg btn-block">= Alunos</button></a>
        <a href="p_listar_visitante.php"><button type="button" class="btn btn-warning btn-lg btn-block">= Visitantes</button></a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-light" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>
        <a href="p_pesq_termometro_classe.php" class="btn btn-info">Termometro</a>
        <a href="sair.php" class="btn btn-danger">Sair</a>

      </nav>
      <center><?php echo"$dia - $usuario_logado"; ?></center>

      <div class="container-fluid">
      <div class="container theme-showcase" role="main">  

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/path/to/bootstrap.css" rel="stylesheet" type="text/css" />

    <link href="/path/to/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="/path/to/custom.css" rel="stylesheet" type="text/css" />

    </head>
<body>

    <script src="/path/to/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="/path/to/bootstrap.js" type="text/javascript"></script>
</body>
</html>
 <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
