	<?php
	session_start();
	include_once("conexao.php");
	include_once("menu_admin.php");
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

  <body>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Cadastrar Classe</h1>
  </div>
  
  <div class="row">
	<div class="col-md-12">
	  <form class="form-horizontal" method="POST" action="processa/proc_cad_classe.php" autocomplete="off">

		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Classe de</label>
			<div class="col-sm-10">
			  				  
			  <select class="form-control" name="classe" >
			  		<option value="">Selecione</option>
				  <option value="Rol">Rol do Berco</option>
				  <option value="Jardim">Jardim</option>
				  <option value="Primarios">Primarios</option>
				  <option value="Juvenis">Juvenis</option>
				  <option value="Adolescentes">Adolescentes</option>
				  <option value="Jovens">Jovens</option>
				  <option value="Adultos">Adultos</option>
				  <option value="Discipulado">Discipulado</option>
				</select>
			</div>
		  </div>

		  <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Numero da Classe*</label>
			      <div class="col-sm-10">
			        <input type="number" class="form-control" name="numerodaclasse" required="">
			      </div>
	      </div>

	      <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Nome da Classe*</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" name="nomedaclasse" required="">
			      </div>
	      </div>

		  <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Professor*</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" name="professor" required="">
			      </div>
	      </div>

		  <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Professor Associado</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" name="professorassociado">
			      </div>
	      </div>

		  <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Secretario</label>
			      <div class="col-sm-10">
			        <input type="text" class="form-control" name="secretario" >
			      </div>
	      </div>

	      <div class="form-group">
		      <label for="inputEmail3" class="col-sm-2 control-label">Alvo de Oferta*</label>
			      <div class="col-sm-10">
			        <input required="" type="number" class="form-control" name="alvodeoferta" >
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

