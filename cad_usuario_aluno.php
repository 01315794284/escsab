<?php
    include_once("conexao.php");
    include_once("menu_admin.php");
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
  session_start();}
  $dia = date("d/m/Y");
  $usuario_logado = $_SESSION['usuarioNome'];
  
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado=mysqli_query($conn, "SELECT * FROM classes");
	$linhas=mysqli_num_rows($resultado);
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

    <title>Cadastrar Aluno</title>

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

  <body>

    <div class="container theme-showcase" role="main">      
  <div class="page-header">
  <h1>Cadastrar Novo Aluno</h1>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/proc_cad_usuario_aluno.php" autocomplete="off">
    
    	<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Casse</label>
			<div class="col-sm-10">
				<select class="form-control" name="classes">
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
        <input type="text" class="form-control" name="endereco" >
      </div>
      </div>

      <form class="form-horizontal">
         <div class="form-group">
          <label class="col-sm-2 control-label">Data de Nascimento</label>
          <div class="col-sm-10">
            <div class="input-group date">
              <input type="date" class="form-control" name="datanascimento" id="datanascimento" >
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

          </div>
          </div>

      <form class="form-horizontal">
         <div class="form-group">
          <label class="col-sm-2 control-label">Data de Batismo</label>
          <div class="col-sm-10">
            <div class="input-group date">
              <input type="date" class="form-control" name="databatismo" id="databatismo">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>

          </div>
          </div>
          
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Telefone 1</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="telefone1" >
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Telefone 2</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="telefone2">
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Login*</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="login" placeholder="" required="">
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Senha*</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="senha"  required="">
      </div>
      </div>
            
      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Adventista*</label>
      <div class="col-sm-10">
        <select class="form-control" name="adventista">
          <option value="sim">Sim</option>
          <option value="nao">Nao</option>
        </select>
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Possui Licao*</label>
      <div class="col-sm-10">
        <select class="form-control" name="licao">
          <option value="sim">Sim</option>
          <option value="nao">Nao</option>
        </select>
      </div>
      </div>

      <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Nivel de Acesso*</label>
      <div class="col-sm-10">
        <select class="form-control" name="niveis_acesso_id">
          <option value="2">Aluno</option>
          <option value="1">Professor</option>
          <option value="3">Admin</option>
        </select>
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
<div class="container">
      
      
    
   <!-- <script type="text/javascript">
      $('#databatismo').datepicker({  
        format: "yyyy-mm-dd", 
        startView: 3, 
        language: "pt-BR",
        autoclose: true,
        clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
      });</script>
      <script type="text/javascript">
      $('#datanascimento').datepicker({  
        format: "yyyy-mm-dd", 
        startView: 3,
        language: "pt-BR",
        autoclose: true,
        clearBtn: true,
        //startDate: '+0d',
      });</script>

    IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

