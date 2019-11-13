
<?php
    include_once("conexao.php");
	include_once("menu_admin.php");
	
	//Informacoes das Classes
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado=mysqli_query($conn, "SELECT * FROM pontuacao order by classe, id_pontuacao desc");
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

    <title>Listar Pontuacao</title>

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

    <!--Filtro da Tabela-->
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script> 
	<script src="js/filtro.js"></script>

    <link href="css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="js/bootstrap-datepicker.min.js"></script> 
    <script src="js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>
  </head>

  <body>
<div class="container theme-showcase" role="main" id="divConteudo">      
  <div class="page-header">
	<h1>Pontuacoes Cadastradas <a href="cad_pontuacao.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table" id="tabela">
		<thead>
		 					<tr>
								<th>Classe</th>
								<th>Atividade</th>
								<th>Pontuacao</th>
								<th>Obervacao</th>
								<th>Data</th>
								<th>Acoes</th>
							</tr>
							<tr>
								<th><input type="text" id="txtColuna1"/></th>
								<th><input type="text" id="txtColuna2"/></th>
								<th><input type="text" id="txtColuna3"/></th>
								<th><input type="text" id="txtColuna4"/></th>
								<th><input type="text" id="txtColuna5"/></th>
							</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['classe']; ?></td>
									<td><?php echo $linhas['atividade']; ?></td>
									<td><?php echo $linhas['pontuacao']; ?></td>
									<td><?php echo $linhas['observacao']; ?></td>
									<td><?php echo $linhas['data']; ?></td>

							<td>
									
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_pontuacao']; ?>" 
										data-whateverclasse="<?php echo $linhas['classe']; ?>"  
										data-whateveratividade="<?php echo $linhas['atividade']; ?>"
										data-whateverpontuacao="<?php echo $linhas['pontuacao']; ?>"
										data-whateverobservacao="<?php echo $linhas['observacao']; ?>"
										data-whateverdata="<?php echo $linhas['data']; ?>"
										>Editar</button>
										
									<a href="processa/apagar_pontuacao.php?id_pontuacao=<?php echo $linhas['id_pontuacao']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_pontuacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['id_pontuacao']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_pontuacao']; ?></p>
												<b>classe</b>: <?php echo $linhas['classe']; ?></p>
												<b>Atividade: </b>: <?php echo $linhas['atividade']; ?></p>
												<b>Pontuacao:</b>: <?php echo $linhas['pontuacao']; ?></p>
												<b>Observacao:</b>: <?php echo $linhas['observacao']; ?></p>
												<b>Data</b>: <?php echo $linhas['data']; ?></p>
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
						<h4 class="modal-title" id="ModalLabel">Pontuacao</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_pontuacao.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="recipient-classe" class="control-label">Classe:</label>
									<select name="classe" type="text" class="form-control" id="recipient-classe">
										<?php
											$result_classe = "SELECT * FROM classes ORDER BY id_classes";
											$resultado_classe2 = mysqli_query($conn, $result_classe);
											while($linhas_classe = mysqli_fetch_assoc($resultado_classe2)){ ?>
												<option required="" value="<?php echo $linhas_classe['id_classes']; ?>"><?php echo $linhas_classe['id_classes']; ?><?php echo " | "; ?><?php echo $linhas_classe['classe']; ?><?php echo " | "; ?><?php echo $linhas_classe['professor']; ?></option> <?php
											}
										?>
									</select>
							  </div>
							<div class="form-group">
							<label for="recipient-atividade" class="control-label">Atividade</label>
								<select name="atividade" type="text" class="form-control" id="recipient-atividade">
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
							<div class="form-group">
								<label for="recipient-pontuacao" class="control-label">Pontuacao:</label>
								<input name="pontuacao" type="text" class="form-control" id="recipient-pontuacao">
							</div>
							<div class="form-group">
								<label for="recipient-observacao" class="control-label">Observacao:</label>
								<input name="observacao" type="text" class="form-control" id="recipient-observacao">
							</div>
							<div class="form-group">
								<label for="recipient-data" class="control-label">Data:</label>
								<input name="data" type="text" class="form-control" id="recipient-data">
							</div>
							
							<input name="id_pontuacao" type="hidden" id="id_pontuacao">
							
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
				var recipientatividade = button.data('whateveratividade')
				//var recipientatividade = button.data('whatever')
				var recipientpontuacao = button.data('whateverpontuacao')
				var recipientobservacao = button.data('whateverobservacao')
				var recipientdata = button.data('whateverdata')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID da Atividade: ' + recipient)
				modal.find('#id_pontuacao').val(recipient)
				modal.find('#recipient-classe').val(recipientclasse)
				modal.find('#recipient-atividade').val(recipientatividade)
				modal.find('#recipient-pontuacao').val(recipientpontuacao)
				modal.find('#recipient-observacao').val(recipientobservacao)
				modal.find('#recipient-data').val(recipientdata)
			})
		</script>
		 <script type="text/javascript">
      $('#data').datepicker({  
        format: "dd/mm/yyyy",
        //startView: 3, 
        language: "pt-BR",
        todayHighlight: true,
        autoclose: true,
        clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
      });</script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/personalizado.js"></script>
  </body>
</html>

