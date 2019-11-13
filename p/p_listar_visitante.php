
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
	$resultado=mysqli_query($conn, "SELECT * FROM visitantes order by id_visitantes DESC");
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

    <title>Listar Alunos</title>

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
	<h1>Visitantes Cadastrados <a href="p_cad_usuario_visitante.php"><img src="imagens/addv.png"></a></h1>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
								<th>Nome</th>
						<!--		<th>Login</th>
								<th>E-mail</th>
								<th>Endereço</th>
								<th>Nascimento</th>
								<th>Telefone</th>-->
								<th>Estudo Biblico</th>
								<th>Oracao</th>
								<th>Visita</th>
								<th>Classe Cadastrou</th>
							<!--	<th>Data de Cadastro</th>-->
								<th>Acoes</th>
							  </tr>
							</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['nome']; ?></td>
					<!--				<td><?php echo $linhas['email']; ?></td>
									<td><?php echo $linhas['endereco']; ?></td>
									<td><?php echo $linhas['datanascimento']; ?></td>
									<td><?php echo $linhas['telefone1']; ?></td>-->
									<td><?php echo $linhas['estudobiblico']; ?></td>
									<td><?php echo $linhas['oracao']; ?></td>
									<td><?php echo $linhas['visita']; ?></td>
									<td><?php echo $linhas['numerodaclasse']; ?></td>
							<!--		<td><?php echo $linhas['datacadastro']; ?></td>-->
									
							<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $linhas['id_visitantes']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_visitantes']; ?>" 
										data-whatevernome="<?php echo $linhas['nome']; ?>"  
										data-whateveremail="<?php echo $linhas['email']; ?>"
										data-whateverendereco="<?php echo $linhas['endereco']; ?>"
										data-whateverdatanascimento="<?php echo $linhas['datanascimento']; ?>"
										data-whatevertelefone1="<?php echo $linhas['telefone1']; ?>"
										data-whateverestudobiblico="<?php echo $linhas['estudobiblico']; ?>"
										data-whateveroracao="<?php echo $linhas['oracao']; ?>"
										data-whatevervisita="<?php echo $linhas['visita']; ?>"
										data-whatevernumerodaclasse="<?php echo $linhas['numerodaclasse']; ?>"
										data-whateverdatacadastro="<?php echo $linhas['datacadastro']; ?>"
										>Editar</button>
										

										<a href="processa/p_apagar_usuario_visitante.php?id_visitantes=<?php echo $linhas['id_visitantes']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_visitantes']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_visitantes']; ?></p>
												<b>Nome</b>: <?php echo $linhas['nome']; ?></p>
												<b>Email: </b>: <?php echo $linhas['email']; ?></p>
												<b>Endereco</b>: <?php echo $linhas['endereco']; ?></p>
												<b>Data de Nascimento</b>: <?php echo $linhas['datanascimento']; ?></p>
												<b>Telefone</b>: <?php echo $linhas['telefone1']; ?></p>
												<b>Estudo Biblico</b>: <?php echo $linhas['estudobiblico']; ?></p>
												<b>Oracao</b>: <?php echo $linhas['oracao']; ?></p>
												<b>Visita</b>: <?php echo $linhas['visita']; ?></p>
												<b>Classe de Cadastro</b>: <?php echo $linhas['numerodaclasse']; ?></p>
												<b>Data do Cadastro</b>: <?php echo $linhas['datacadastro']; ?></p>

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
						<h4 class="modal-title" id="ModalLabel">Visitantes</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="processa/p_editar_visitante.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="recipient-email" class="control-label">Email:</label>
								<input name="email" type="text" class="form-control" id="recipient-email">
							</div>
							<div class="form-group">
								<label for="recipient-endereco" class="control-label">Endereco:</label>
								<input name="endereco" type="text" class="form-control" id="recipient-endereco">
							</div>
							<div class="form-group">
								<label for="recipient-datanascimento" class="control-label">Data de Nascimento:</label>
								<input name="datanascimento" type="text" class="form-control" id="recipient-datanascimento">
							</div>
							<div class="form-group">
								<label for="recipient-telefone1" class="control-label">Telefone 1:</label>
								<input name="telefone1" type="text" class="form-control" id="recipient-telefone1">
							</div>
							<div class="form-group">
								<label for="recipient-estudobiblico" class="control-label">Estudo Biblico:</label>
								<select class="form-control" name="estudobiblico" id="recipient-estudobiblico" required="">
						          <option value="sim">Sim</option>
						          <option value="nao">Nao</option>
						        </select>
							</div>
							<div class="form-group">
								<label for="recipient-oracao" class="control-label">Oracao:</label>
								<select class="form-control" name="oracao" id="recipient-oracao" required="">
						          <option value="sim">Sim</option>
						          <option value="nao">Nao</option>
						        </select>
							</div>
							<div class="form-group">
								<label for="recipient-visita" class="control-label">Aceita Visita:</label>
								<select class="form-control" name="visita" id="recipient-visita" required="">
						          <option value="sim">Sim</option>
						          <option value="nao">Nao</option>
						        </select>
							</div>
							<div class="form-group">
					      <label for="recipient-datacadastro" class="control-label">Classe que Cadastrou</label>
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
							<div class="form-group">
								<label for="recipient-datacadastro" class="control-label">Data de Cadastro:</label>
								<input name="datacadastro" type="text" class="form-control" id="recipient-datacadastro">
							</div>
							<input name="id_visitantes" type="hidden" id="id_visitantes">
							
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



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#Modal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientemail = button.data('whateveremail')
				var recipientendereco = button.data('whateverendereco')
				var recipientdatanascimento = button.data('whateverdatanascimento')
				var recipienttelefone1 = button.data('whatevertelefone1')
				var recipientestudobiblico = button.data('whateverestudobiblico')
				var recipientoracao = button.data('whateveroracao')
				var recipientvisita = button.data('whatevervisita')
				var recipientdatacadastro = button.data('whateverdatacadastro')
				var recipientnumerodaclasse = button.data('whatevernumerodaclasse')

				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Visitante: ' + recipient)
				modal.find('#id_visitantes').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#recipient-email').val(recipientemail)
				modal.find('#recipient-endereco').val(recipientendereco)
				modal.find('#recipient-datanascimento').val(recipientdatanascimento)
				modal.find('#recipient-telefone1').val(recipienttelefone1)
				modal.find('#recipient-estudobiblico').val(recipientestudobiblico)
				modal.find('#recipient-oracao').val(recipientoracao)
				modal.find('#recipient-visita').val(recipientvisita)
				modal.find('#recipient-datacadastro').val(recipientdatacadastro)
				modal.find('#recipient-numerodaclasse').val(recipientnumerodaclasse)

			})
		</script>
		<script src="js/personalizado.js"></script>
	</body>
</html>