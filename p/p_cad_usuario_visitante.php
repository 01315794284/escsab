<?php
  session_start();
    include_once("p_menu_admin_professor.php");
    include_once("conexao.php");
$dia = date("d");
$mes = date("m");
$ano = date("Y");
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

    <title>Cadastrar Visitante</title>

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

  <body>

    <div class="container theme-showcase" role="main">      
  <div class="page-header">
  <h1>Cadastrar Visitante</h1>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/p_proc_cad_usuario_visitante.php" autocomplete="off">
    
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Nome*</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nome" required="">
      </div>
      </div>
      
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">E-mail</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email">
      </div>
      </div>
      
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Endereco</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="endereco">
      </div>
      </div>

      <form class="form-horizontal">
         <div class="form-group">
          <label class="col-sm-2 control-label">Data de Nascimento</label>
          <div class="col-sm-10">
            <div class="input-group date">
              <input type="text" class="form-control" name="datanascimento" id="datanascimento" >
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

          </div>
          </div>

      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Telefone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="telefone1"  >
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Gostaria de Uma Visita*</label>
      <div class="col-sm-10">
        <select class="form-control" name="visita" required="">
          <option value="sim">Sim</option>
          <option value="nao">Nao</option>
        </select>
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Gostaria de Oracao*</label>
      <div class="col-sm-10">
        <select class="form-control" name="oracao" required="">
          <option value="sim">Sim</option>
          <option value="nao">Nao</option>
        </select>
      </div>
      </div>

    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Interesse em Estudo Biblico*</label>
      <div class="col-sm-10">
        <select class="form-control" name="estudobiblico" required="">
          <option value="sim">Sim</option>
          <option value="nao">Nao</option>
        </select>
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Classe que Cadastrou</label>
      <div class="col-sm-10">
        <select class="form-control" name="numerodaclasse" required="">
          <?php
            $result_classe = "SELECT * FROM classes where numerodaclasse=$numerologin";
            $resultado_classe2 = mysqli_query($conn, $result_classe);
            while($linhas_classe = mysqli_fetch_assoc($resultado_classe2)){ ?>
              <option required="" value="<?php echo $linhas_classe['numerodaclasse']; ?>"><?php echo $linhas_classe['numerodaclasse']; ?>
                <?php echo "|"; ?>
                <?php echo  $linhas_classe['classe']; ?>
                <?php echo "|"; ?>
                <?php echo  $linhas_classe['professor']; ?></option> <?php
                }
          ?>
        </select>
      </div>
      </div>

         <div class="form-group">
          <label class="col-sm-2 control-label">Data do Cadastro</label>
          <div class="col-sm-10">
            <div class="input-group date">
              <input type="text" class="form-control" name="datacadastro" id="datacadastro" value="<?php echo"$dia/$mes/$ano";  ?>">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

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

   <script type="text/javascript">
      $('#datanascimento').datepicker({  
        format: "dd/mm/yyyy",
        startView: 3, 
        language: "pt-BR",
        todayHighlight: true,
      autoclose: true,
        clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
      });</script>
      <script type="text/javascript">
      $('#datacadastro').datepicker({  
        format: "dd/mm/yyyy",
        startView: 3, 
        language: "pt-BR",
        //daysOfWeekDisabled : "0,1,2,3,4,5" , 
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
