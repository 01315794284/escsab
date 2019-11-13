
<?php
	session_start();
	  include_once("p_menu_admin_professor.php");
    include_once("conexao.php");
$mes = date("n");
$ano = date("Y");

  //Nome e (Número da Classe + Login Professor)
  $nomeprofessor = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];
  
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

    <title>Classes Cadastradas</title>

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

    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="js/bootstrap-datepicker.min.js"></script> 
    <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
  </head>

  <body>
<div class="container theme-showcase" role="main">      
  <div class="page-header">
	<h1>Classes Cadastradas <a href="cad_classe.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		 <tr>
								<th>#</th>
								<th>Professor</th>
								<th>Numero da Classe</th>
								<th>Nome da Classe</th>
								<th>Classe de</th>
								<th>Alvo de Oferta</th>
								<th>Pontuacao</th>
								<th>Acoes</th>
		</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['id_classes']; ?></td>
									<td><?php echo $linhas['professor']; ?></td>
									<td><?php echo $linhas['numerodaclasse']; ?></td>
									<td><?php echo $linhas['nomedaclasse']; ?></td>
									<td><?php echo $linhas['classe']; ?></td>
									<td><?php echo $linhas['alvodeoferta']; ?></td>
									<td><?php echo $linhas['pontuacao']; ?></td>
							<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_classes']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_classes']; ?>" 
										data-whateverprofessor="<?php echo $linhas['professor']; ?>"
										data-whateverprofessorassociado="<?php echo $linhas['professorassociado']; ?>"
										data-whateversecretario="<?php echo $linhas['secretario']; ?>"
										data-whatevernumerodaclasse="<?php echo $linhas['numerodaclasse']; ?>"
										data-whatevernomedaclasse="<?php echo $linhas['nomedaclasse']; ?>"
										data-whateverclasse="<?php echo $linhas['classe']; ?>"
										data-whateverpontuacao="<?php echo $linhas['pontuacao']; ?>"
										data-whateveralvodeoferta="<?php echo $linhas['alvodeoferta']; ?>"

										>Editar</button>
										
										<a href="processa/apagar_classe.php?id_classes=<?php echo $linhas['id_classes']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_classes']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['classe']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_classes']; ?></p>
												<b>Professor: </b>: <?php echo $linhas['professor']; ?></p>
												<b>Professor Associado</b>: <?php echo $linhas['professorassociado']; ?></p>
												<b>Secretario</b>: <?php echo $linhas['secretario']; ?></p>
												<b>Numero da Classe</b>: <?php echo $linhas['numerodaclasse']; ?></p>
												<b>Nome da Classe</b>: <?php echo $linhas['nomedaclasse']; ?></p>
												<b>Classe de</b>: <?php echo $linhas['classe']; ?></p>
												<b>Pontuacao</b>: <?php echo $linhas['pontuacao']; ?></p>
												<b>Alvo de Oferta</b>: <?php echo $linhas['alvodeoferta']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
								<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ModalLabel">Classes</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_classe.php" enctype="multipart/form-data" autocomplete="off">
							
							<div class="form-group">
								<label for="recipient-professor" class="control-label">Professor:</label>
								<input name="professor" type="text" class="form-control" id="recipient-professor" required="">
							</div>

							<div class="form-group">
								<label for="recipient-professorassociado" class="control-label">Professor Associado:</label>
								<input name="professorassociado" type="text" class="form-control" id="recipient-professorassociado">
							</div>

							<div class="form-group">
								<label for="recipient-numerodaclasse" class="control-label">Numero da Classe:</label>
								<input name="numerodaclasse" type="text" class="form-control" id="recipient-numerodaclasse">
							</div>

							<div class="form-group">
								<label for="recipient-nomedaclasse" class="control-label">Nome da Classe:</label>
								<input name="nomedaclasse" type="text" class="form-control" id="recipient-nomedaclasse">
							</div>

							  <div class="form-group">
								<label for="recipient-classe" class="control-label">Classe</label>
								  <select name="classe" type="text" class="form-control" id="recipient-classe" class="form-control" required="">				  
								  		<option value="0">Selecione</option>
									  <option value="Rol">Rol do Berço</option>
									  <option value="Jardim">Jardim</option>
									  <option value="Primarios">Primários</option>
									  <option value="Juvenis">Juvenis</option>
									  <option value="Adolescentes">Adolescentes</option>
									  <option value="Jovens">Jovens</option>
									  <option value="Adultos">Adultos</option>
									  <option value="Interessados-Visitantes">Interessados/Visitantes</option>
									  <option value="Discipulado">Discipulado</option>
									</select>
							  </div>

								<div class="form-group">
									<label for="recipient-pontuacao" class="control-label">Pontuacao:</label>
									<input name="pontuacao" type="text" class="form-control" id="recipient-pontuacao">
								</div>

								<div class="form-group">
									<label for="recipient-alvodeoferta" class="control-label">Alvo de Oferta:</label>
									<input name="alvodeoferta" type="text" class="form-control" id="recipient-alvodeoferta">
								</div>

							<input name="id_classes" type="hidden" id="id_classes">
							
							<!--Ações-->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-success">Alterar</button>
							</div>
						</edit>
					</div>			  
				</div>
			</div>
		</div>



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#Modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientprofessor = button.data('whateverprofessor')
				var recipientprofessorassociado = button.data('whateverprofessorassociado')
				var recipientsecretario = button.data('whateversecretario')
				var recipientnumerodaclasse = button.data('whatevernumerodaclasse')
				var recipientnomedaclasse = button.data('whatevernomedaclasse')
				var recipientclasse = button.data('whateverclasse')
				var recipientpontuacao = button.data('whateverpontuacao')
				var recipientalvodeoferta = button.data('whateveralvodeoferta')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID da Classe: ' + recipient)
				modal.find('#id_classes').val(recipient)
				modal.find('#recipient-professor').val(recipientprofessor)
				modal.find('#recipient-professorassociado').val(recipientprofessorassociado)
				modal.find('#recipient-secretario').val(recipientsecretario)
				modal.find('#recipient-numerodaclasse').val(recipientnumerodaclasse)
				modal.find('#recipient-nomedaclasse').val(recipientnomedaclasse)
				modal.find('#recipient-classe').val(recipientclasse)
				modal.find('#recipient-pontuacao').val(recipientpontuacao)
				modal.find('#recipient-alvodeoferta').val(recipientalvodeoferta)
			})
		</script>
		<script src="js/personalizado.js"></script>
	</body>
</html>