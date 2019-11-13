<?php
	session_start();
    include_once("menu_admin.php");
    include_once("conexao.php");

?>
<?php
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

    <title>Cadastrar Pontuacao</title>
    <!-- Preenchimento Automático -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

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

<!-- Mudancas aqui devem ser feitas também em "function.php"-->
<script type='text/javascript'>
      $(document).ready(function(){
        $("input[name='numerodaclasse']").blur(function(){
          var $classe = $("input[name='classe']");
          var $pontuacao = $("input[name='pontuacao']");
          var $professor = $("input[name='professor']");
          $.getJSON('function.php',{ 
            numerodaclasse: $( this ).val() 
          },function( json ){
            $classe.val( json.classe );
            $pontuacao.val( json.pontuacao );
            $professor.val( json.professor );

          });
        });
      });
    </script>


    <div class="container theme-showcase" role="main">      
  <div class="page-header">
  <h1>Cadastrar Pontuacao</h1>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/proc_cad_pontuacao.php" autocomplete="off">
    
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Classe</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="numerodaclasse" placeholder="Digite o N da Classe"><br>
      </div>
      </div>

      <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Pontos*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="pontuacaonova"><br>
          </div>
      </div>

      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Classe</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="classe"><br>
      </div>
      </div>

      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Professor</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="professor"><br>
      </div>
      </div>
		
		<div class="form-group">
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-success">Cadastrar</button>
	      </div>
      </div>

      <!-- Esse campo pega a pontuacao anterior. Nao é exibido, mas necessário pra soma da nova pontuacao, mais esse campo-->
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label"></label>
          <div class="col-sm-10">
            <input type="hidden" class="form-control" name="pontuacao"><br>
          </div>
          </div>
    </form>
  </div>
  </div>
  <div class="container theme-showcase" role="main">      
  <div class="row">
  <div class="col-md-12">
    <table class="table">
    <thead>
     <tr>
                <th>Numero da Classe</th>
                <th>Classe</th>
                <th>Professor</th>
    </tr>
    </thead>
    <tbody>
      <?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                <tr>
                  <td><?php echo $linhas['numerodaclasse']; ?></td>
                  <td><?php echo $linhas['classe']; ?></td>
                  <td><?php echo $linhas['professor']; ?></td>
              <td>
                  </td>
                </tr>

                <?php } ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>
</div> <!-- /container -->
<div class="container">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
