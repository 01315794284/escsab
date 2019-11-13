<?php
	session_start();
	  include_once("p_menu_admin_professor.php");
    include_once("conexao.php");

    $dia = date("d");
    $mes = date("m");
    $ano = date("Y");

  //Nome e (Número da Classe + Login Professor)
  $nomeprofessor = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];

  $numerodealunos = $_SESSION['sessao_numeroddealunos'];



  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado=mysqli_query($conn, "SELECT nome FROM usuarios");
  $linhas=mysqli_num_rows($resultado);
  $comunhao = "#5FB404";
  $relacionamento = "#0B3B39";
  $missao = "#5858FA";
  $ofertas = "#B40431";


        //QTD de Alunos
      $conn_alunos = mysqli_connect($servidor, $usuario, $senha, $dbname);

  $sqlqtd_alunos = mysqli_query($conn_alunos , "SELECT *, count(classe) qtd_alunos FROM usuarios WHERE classe = $numerologin");
    while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
      extract($dadosqtd_alunos);
    }
$qtd_alunos_total = $qtd_alunos;



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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="js/bootstrap-datepicker.min.js"></script> 
    <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
  </head>
    <title>Apontamento</title>

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
  <h1>Apontamento </h1>
  </div>
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/p_proc_cad_apontamento.php" autocomplete="off">
    
      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Classe</label>
      <div class="col-sm-10">
        <select class="form-control" name="classe" required="">
          <?php
            $result_classe = "SELECT * FROM classes where numerodaclasse=$numerologin";
            $resultado_classe2 = mysqli_query($conn, $result_classe);
            while($linhas_classe = mysqli_fetch_assoc($resultado_classe2)){ ?>
              <option required=""  value="<?php echo $linhas_classe['numerodaclasse']; ?>"><?php echo $linhas_classe['numerodaclasse']; ?>
                <?php echo "|"; ?>
                <?php echo  $linhas_classe['classe']; ?>
                <?php echo "|"; ?>
                <?php echo  $linhas_classe['professor']; ?></option> <?php
                }
          ?>

        </select>
      </div>
      </div>
      <form class="form-horizontal">
         <div class="form-group">
          <label class="col-sm-2 control-label">Data do Apontamento</label>
          <div class="col-sm-10">
            <div class="input-group date">
              <input type="text" class="form-control" readonly="readonly" name="dataapontamento" id="dataapontamento" value="<?php echo $_SESSION['dataapontamento'];?>">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

          </div>
          </div>

 <div class="container theme-showcase" role="main">      
  <div class="page-header">
  <font color=<?php echo $comunhao; ?>><h2>Comunhao</h2></font>
  </div>
 

  

<div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/p_proc_cad_apontamento.php">
    
      <div class="form-group">
	      <font color=<?php echo $comunhao;?>><label for="inputEmail3" class="col-sm-2 control-label">Quantos membros estudaram a Biblia ou a Licao Diariamente*</label></font>
		      <div class="col-sm-10">
		        <input type="number" class="form-control" name="estudo" required="" value="0" max="<?php echo "$qtd_alunos_total" ?>" placeholder="O numero maximo que pode colocar e <?php echo "$qtd_alunos_total" ?>">
		      </div>
      </div>

  <font color=<?php echo $relacionamento;?>><h2>Relacionamento</h2></font>
      <div class="form-group">
        <font color="#0B3B39"><label for="inputEmail3" class="col-sm-2 control-label">Quantos membros estao presentes*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="presenca" required="" readonly="readonly" value="<?php echo $_SESSION['qtdalunospresente'];?>" max="<?php echo "$qtd_alunos_total" ?>" placeholder="O numero maximo que pode colocar e <?php echo "$qtd_alunos_total" ?> ">
          </div>
      </div>


      <div class="form-group">
        <font color=<?php echo $relacionamento;?>><label for="inputEmail3" class="col-sm-2 control-label">Quantos membros praticaram acoes solidarias para atender as necessidades do seu proximo*</label></font>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="acao" required="" value="0" max="<?php echo "$qtd_alunos_total" ?>" placeholder="O numero maximo que pode colocar e <?php echo "$qtd_alunos_total" ?>">
          </div>
      </div>

      <div class="form-group">
        <font color=<?php echo $relacionamento;?>><label for="inputEmail3" class="col-sm-2 control-label">Quantos participaram de encontro extra classe*</label></font>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="encontro" required="" value="0" max="<?php echo "$qtd_alunos_total" ?>" placeholder="O numero maximo que pode colocar e <?php echo "$qtd_alunos_total" ?>">
          </div>
      </div>
  
      <div class="form-group">
        <font color="#0B3B39"><label for="inputEmail3" class="col-sm-2 control-label">Quantos Visitantes Adventistas*</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="adventista" required="" value="0">
          </div>
      </div>
      <div class="form-group">
        <font color="#0B3B39"><label for="inputEmail3" class="col-sm-2 control-label">Quantos Visitantes Nao Adventistas*</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="naoadventista" required="" value="0">
          </div>
      </div>
  <font color="#5858FA"><h2>Missao</h2></font>
      <div class="form-group">
        <font color=<?php echo $missao;?>><label for="inputEmail3" class="col-sm-2 control-label">Quantos membros fizeram contatos missionarios atraves de estudos Biblicos ou testemunhos*</label></font>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="contato" required="" value="0" max="<?php echo "$qtd_alunos_total" ?>" placeholder="O numero maximo que pode colocar e <?php echo "$qtd_alunos_total" ?>">
          </div>
      </div>
      
      <div class="form-group">
        <font color=<?php echo $missao;?>><label for="inputEmail3" class="col-sm-2 control-label">Quantos estao dando Estudos Biblicos*</label></font>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="estudosbiblicos" required="" value="0" max="<?php echo "$qtd_alunos_total" ?>" placeholder="O numero maximo que pode colocar e <?php echo "$qtd_alunos_total" ?>">
          </div>
      </div>


  <font color=<?php echo $ofertas;?>><h2>Ofertas</h2></font>

      <div class="form-group">
        <font color=<?php echo $ofertas;?>><label for="inputEmail3" class="col-sm-2 control-label">Ofertas*</label></font>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="oferta" required="" value="0" placeholder="R$">
          </div>
      </div>
      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Cadastrar</button>
      </div>
      </div>
    </form>
  </div>
  </div>
</div> <!-- /container -->

<!--Script de Data-->
<script type="text/javascript">
      $('#dataapontamento').datepicker({  
        format: "dd/mm/yyyy",
        startView: 3, 
        language: "pt-BR",
        daysOfWeekDisabled : "0,1,2,3,4,5" , 
        maxViewMode : 0 , 
    	todayHighlight: true,
	    autoclose: true,
        clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
      });</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
