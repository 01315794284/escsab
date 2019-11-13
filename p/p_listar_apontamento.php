
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
	$resultado=mysqli_query($conn, "SELECT * FROM apontamento where classe = $numerologin ORDER BY id_apontamento DESC");
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

    <title>Listar Apontamento</title>

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
	<h1>Apontamento <a href="p_cad_check.php"><img src="imagens/addv.png"></a></h1>

  </div>

<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		 <tr>
							<!--	<th>#</th>
								<th>Classe</th>-->
								<th>Data Apontamento</th>
							<!--<th>Alunos Presente</th>
								<th>Visitantes Adv Presentes</th>
								<th>Visitantes Nao Adv Presentes</th>
								<th>Quantos Estudaram a Biblia ou Licao Diariamente</th>
								<th>Quantos Praticaram Acoes Solidarias</th>
								<th>Quantos Particiaram Extra Classe</th>
								<th>Quantos Fizeram Contatos Missionarios</th>
								<th>Quantos Deram Estudos Biblicos</th>
								<th>Oferta</th>-->
								<th>Acoes</th>
		</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
								<!--	<td><?php echo $linhas['id_apontamento']; ?></td>
									<td><?php echo $linhas['classe']; ?></td>-->
									<td><?php echo $linhas['dataapontamento']; ?></td>
								<!--	<td><?php echo $linhas['presenca']; ?></td>
									<td><?php echo $linhas['adventista']; ?></td>
									<td><?php echo $linhas['naoadventista']; ?></td>
									<td><?php echo $linhas['estudo']; ?></td>
									<td><?php echo $linhas['acao']; ?></td>
									<td><?php echo $linhas['encontro']; ?></td>
									<td><?php echo $linhas['contato']; ?></td>
									<td><?php echo $linhas['estudosbiblicos']; ?></td>
									<td><?php echo "R$ "; echo $linhas['oferta'];?></td>-->
							<td>
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_apontamento']; ?>" 
										data-whateverclasse="<?php echo $linhas['classe']; ?>"  
										data-whateverdataapontamento="<?php echo $linhas['dataapontamento']; ?>" 
										data-whateverpresenca="<?php echo $linhas['presenca']; ?>"
										data-whateveradventista="<?php echo $linhas['adventista']; ?>" 
										data-whatevernaoadventista="<?php echo $linhas['naoadventista']; ?>" 
  
										data-whateverestudo="<?php echo $linhas['estudo']; ?>"
										data-whateveracao="<?php echo $linhas['acao']; ?>"
										data-whateverencontro="<?php echo $linhas['encontro']; ?>"
										data-whatevercontato="<?php echo $linhas['contato']; ?>"
										data-whateverestudosbiblicos="<?php echo $linhas['estudosbiblicos']; ?>"
										data-whateveroferta="<?php echo $linhas['oferta']; ?>"
										>Editar</button>
										
										<a href="#"><button type="button" class="btn btn-xs btn-primary">Editar Check</button></a>

										<a href="processa/p_apagar_apontamento.php?id_apontamento=<?php echo $linhas['id_apontamento']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>

									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_apontamento']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['dataapontamento']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_apontamento']; ?></p>
												<b>Classe</b>: <?php echo $linhas['classe']; ?></p>
												<b>Data do Apontamento</b>: <?php echo $linhas['dataapontamento']; ?></p>
												<b>Numero de Presentes</b>: <?php echo $linhas['presenca']; ?></p>
												<b>Numero Visitantes ADV Presentes</b>: <?php echo $linhas['adventista']; ?></p>
												<b>Numero Visitantes NAO ADV Presentes</b>: <?php echo $linhas['naoadventista']; ?></p>

												<b>Estudo Biblia/Licao: </b>: <?php echo $linhas['estudo']; ?></p>
												<b>Acao Missionaria:</b>: <?php echo $linhas['acao']; ?></p>
												<b>Encontro Extra Classe:</b>: <?php echo $linhas['encontro']; ?></p>
												<b>Contatos Missionarios</b>: <?php echo $linhas['contato']; ?></p>
												<b>Estudos Biblicos</b>: <?php echo $linhas['estudosbiblicos']; ?></p>
												<b>Oferta</b>: <?php echo $linhas['oferta']; ?></p>
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
						<h4 class="modal-title" id="ModalLabel">Apontamentos</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/p_editar_apontamento.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="recipient-classe" class="control-label">Classe:</label>
								<input name="classe" type="text" class="form-control" id="recipient-classe">
							</div>
							<div class="form-group">
								<label for="recipient-dataapontamento" class="control-label">Data do Apontamento:</label>
								<input name="dataapontamento" type="text" class="form-control" id="recipient-dataapontamento">
							</div>
							<div class="form-group">
								<label for="recipient-presenca" class="control-label">Membros Presente:</label>
								<input name="presenca" type="text" class="form-control" id="recipient-presenca">
							</div>
							<div class="form-group">
								<label for="recipient-adventista" class="control-label">Visitantes Adventistas:</label>
								<input name="adventista" type="text" class="form-control" id="recipient-adventista">
							</div>
							<div class="form-group">
								<label for="recipient-naoadventista" class="control-label">Visitantes Nao Adventistas:</label>
								<input name="naoadventista" type="text" class="form-control" id="recipient-naoadventista">
							</div>
							<div class="form-group">
								<label for="recipient-estudo" class="control-label">Estudo Licao/Biblia:</label>
								<input name="estudo" type="text" class="form-control" id="recipient-estudo">
							</div>
							<div class="form-group">
								<label for="recipient-acao" class="control-label">Acao Missionaria:</label>
								<input name="acao" type="text" class="form-control" id="recipient-acao">
							</div>
							<div class="form-group">
								<label for="recipient-encontro" class="control-label">Encontro Extra Classe:</label>
								<input name="encontro" type="text" class="form-control" id="recipient-encontro">
							</div>
							<div class="form-group">
								<label for="recipient-contato" class="control-label">Contatos Missionarios:</label>
								<input name="contato" type="text" class="form-control" id="recipient-contato">
							</div>
							<div class="form-group">
								<label for="recipient-estudosbiblicos" class="control-label">Estudos Biblicos:</label>
								<input name="estudosbiblicos" type="text" class="form-control" id="recipient-estudosbiblicos">
							</div>
							<div class="form-group">
								<label for="recipient-oferta" class="control-label">Ofertas:</label>
								<input name="oferta" type="text" class="form-control" id="recipient-oferta">
							</div>
							<input name="id_apontamento" type="hidden" id="id_apontamento">
							
							<!--Ações-->
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-success">Alterar</button>
							</div>
						</form>
					</div>			  
				</div>
			</div>
		</div>



		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#Modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientclasse = button.data('whateverclasse')
				var recipientdataapontamento = button.data('whateverdataapontamento')
				var recipientpresenca = button.data('whateverpresenca')
				var recipientadventista = button.data('whateveradventista')
				var recipientnaoadventista = button.data('whatevernaoadventista')
				var recipientestudo = button.data('whateverestudo')
				//var recipientestudo = button.data('whatever')
				var recipientacao = button.data('whateveracao')
				var recipientencontro = button.data('whateverencontro')
				var recipientcontato = button.data('whatevercontato')
				var recipientestudosbiblicos = button.data('whateverestudosbiblicos')
				var recipientoferta = button.data('whateveroferta') 
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Apontamento: ' + recipient)
				modal.find('#id_apontamento').val(recipient)
				modal.find('#recipient-classe').val(recipientclasse)
				modal.find('#recipient-dataapontamento').val(recipientdataapontamento)
				modal.find('#recipient-presenca').val(recipientpresenca)
				modal.find('#recipient-adventista').val(recipientadventista)
				modal.find('#recipient-naoadventista').val(recipientnaoadventista)
				modal.find('#recipient-estudo').val(recipientestudo)
				modal.find('#recipient-acao').val(recipientacao)
				modal.find('#recipient-encontro').val(recipientencontro)
				modal.find('#recipient-contato').val(recipientcontato)
				modal.find('#recipient-estudosbiblicos').val(recipientestudosbiblicos)
				modal.find('#recipient-oferta').val(recipientoferta)
			})
		</script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/personalizado.js"></script>
  </body>
</html>