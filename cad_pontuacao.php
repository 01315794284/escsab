<?php
	session_start();
    include_once("conexao.php");
    include_once("menu_admin.php");

    $data = date('d/m/Y');
    
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

    <title>Cadastrar Pontos</title>

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
  <h1>Cadastrar Pontos</h1>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/proc_cad_pontuacao.php" autocomplete="off">
    
    	<div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Classe</label>
			<div class="col-sm-10">
				<select class="form-control" name="classe">
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

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Atividade</label>
			<div class="col-sm-10">
				<select class="form-control" name="atividade">
					<option value="">Selecione</option>
					<?php
						$result_atividade = "SELECT id_atividade,atividade FROM atividade";
						$resultado_atividade2 = mysqli_query($conn, $result_atividade);
						while($linhas_atividade = mysqli_fetch_assoc($resultado_atividade2)){ ?>
							<option value="<?php echo $linhas_atividade['atividade']; ?>">
								<?php echo $linhas_atividade['atividade']; ?></option> <?php
						}
					?>
				</select>
		  </div>
		  </div>


      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Pontos*</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="pontuacao" required="">
      </div>
      </div>
      
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Observacao</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="observacao" >
      </div>
      </div>

      <div class="form-group">
		<label class="col-sm-2 control-label">Data do Apontamento</label>
			<div class="col-sm-10">
				<div class="input-group date">
					<input type="text" class="form-control" value="<?php echo "$data" ?>" name="data" id="data" >
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
<div class="container">

 <!--Script de Data-->
	<script type="text/javascript">
	      $('#data').datepicker({  
	        format: "dd/mm/yyyy",
	        startView: 3, 
	        language: "pt-BR",
          todayHighlight : true,
          todayHighlight: true,
          autoclose: true,
	        //daysOfWeekDisabled : "0,1,2,3,4,5" , 
	        maxViewMode : 0 , 
	    	//todayBtn : "ligado" , 
	        clearBtn: true
	        //minViewMode: 3,
	       // startDate: '+0d',
	      });</script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

