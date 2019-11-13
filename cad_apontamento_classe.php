<?php
	session_start();
    include_once("conexao.php");
    include_once("menu_admin.php");

  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado=mysqli_query($conn, "SELECT nome, id_usuarios FROM usuarios where classe=$numerologin");
  $linhas=mysqli_num_rows($resultado);
//Pegando só o id
  $resultado_id=mysqli_query($conn, "SELECT id_usuarios FROM usuarios where classe=$numerologin");
  $linhas_id=mysqli_num_rows($resultado_id);
  $comunhao = "#5FB404";
  $relacionamento = "#0B3B39";
  $missao = "#5858FA";
  $ofertas = "#B40431";



?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Sloan">
    <link rel="icon" href="imagens/es.ico">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- DATA -->
    <link rel="stylesheet" href="css/data-1.css">
    <script src="js/site/data-2.js"></script>
    <script src="js/site/data-3.js"></script>

    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="js/bootstrap-datepicker.min.js"></script> 
    <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
  </head>
    <title>Apontamento - Escolher Classe</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Checkbox -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container theme-showcase" role="main">      
  <div class="page-header">
  <h1>Escolha da Classe </h1>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="cad_check.php" autocomplete="off">


      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Casse</label>
      <div class="col-sm-10">
        <select class="form-control" name="classes">
          <option value="">Selecione</option>
          <?php
            $result_classes = "SELECT id_classes,professor, classe, numerodaclasse FROM classes";
            $resultado_classes2 = mysqli_query($conn, $result_classes);
            while($linhas_classes = mysqli_fetch_assoc($resultado_classes2)){ ?>
              <option value="<?php echo $linhas_classes['id_classes']; ?>"><?php echo $linhas_classes['numerodaclasse']; ?><?php echo " | "; ?><?php echo $linhas_classes['classe']; ?><?php echo " | "; ?><?php echo $linhas_classes['professor']; ?></option> <?php
            }
          ?>
        </select>
      </div>
      </div>


    <input type="hidden" name="campos" value=" <?php echo "$i"; ?>">
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Escolher Classe</button>
      </div>
    </div>
    </form>
  </div>
  </div>
</div>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

