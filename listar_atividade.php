
<?php
    include_once("conexao.php");
	include_once("menu_admin.php");
	
	//Informacoes das Classes
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$resultado=mysqli_query($conn, "SELECT * FROM atividade");
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

    <title>Ativiaddes Cadastradas</title>

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
	<h1>Atividades Cadastradas <a href="cad_atividade.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		 <tr>
								<th>#</th>
								<th>Atividade</th>
								<th>Descricao</th>
								<th>Classificacao</th>
								<th>Acoes</th>
		</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['id_atividade']; ?></td>
									<td><?php echo $linhas['atividade']; ?></td>
									<td><?php echo $linhas['descricao']; ?></td>
									<td><?php echo $linhas['classificacao']; ?></td>
							<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_atividade']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_atividade']; ?>" 
										data-whateveratividade="<?php echo $linhas['atividade']; ?>"
										data-whateverdescricao="<?php echo $linhas['descricao']; ?>"
										data-whateverclassificacao="<?php echo $linhas['classificacao']; ?>"

										>Editar</button>
										
										<a href="processa/apagar_atividade.php?id_atividade=<?php echo $linhas['id_atividade']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_atividade']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['id_atividade']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Acao > Visualizar-->
												<p><?php echo $linhas['id_atividade']; ?></p>
												<b>Atividade</b>: <?php echo $linhas['atividade']; ?></p>
												<b>Descricao</b>: <?php echo $linhas['descricao']; ?></p>
												<b>Classificacao</b>: <?php echo $linhas['classificacao']; ?></p>
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
						<h4 class="modal-title" id="ModalLabel">Atividades</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/editar_atividade.php" enctype="multipart/form-data" autocomplete="off">
							
							<div class="form-group">
								<label for="recipient-atividade" class="control-label">Atividade:</label>
								<input name="atividade" type="text" class="form-control" id="recipient-atividade" required="">
							</div>

							  <div class="form-group">
								<label for="recipient-classificacao" class="control-label">Classificacao</label>
								 <select name="classificacao" type="text" class="form-control" id="recipient-classificacao" class="form-control" required="">				  
								  		<option value="0">Selecione</option>
									    <option value="semanal">Semanal</option>
									    <option value="mensal">Mensal</option>
									    <option value="desafio">Desafio</option>
								</select>
							  </div>

								<div class="form-group">
									<label for="recipient-descricao" class="control-label">Descricao:</label>
									<input name="descricao" type="text" class="form-control" id="recipient-descricao">
								</div>

							<input name="id_atividade" type="hidden" id="id_atividade">
							
							<!--Acoes-->
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
				var recipientatividade = button.data('whateveratividade')
				var recipientdescricao = button.data('whateverdescricao')
				var recipientclassificacao = button.data('whateverclassificacao')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID da Classe: ' + recipient)
				modal.find('#id_atividade').val(recipient)
				modal.find('#recipient-atividade').val(recipientatividade)
				modal.find('#recipient-descricao').val(recipientdescricao)
				modal.find('#recipient-classificacao').val(recipientclassificacao)
			})
		</script>
		<script src="js/personalizado.js"></script>
	</body>
</html>
