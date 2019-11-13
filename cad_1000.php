<?php
  session_start();
    include_once("conexao.php");
	include_once("menu_admin.php");
	
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

    <title>Atividades Cadastradas</title>

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
  <h1>Cadastrar Nova Atividade</h1>
  </div>
  
  <div class="row">
  <div class="col-md-12">
    <form class="form-horizontal" method="POST" action="processa/proc_cad_1000.php" autocomplete="off">
    
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Atividade*</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="atividade" required="">
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
   
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">
	  <table class="table">
		<thead>
		  <tr>
								<th>#</th>
								<th>Atividades</th>
								<th>Acoes</th>
			</tr>
		</thead>
		<tbody>
			<?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
								<tr>
									<td><?php echo $linhas['id_atividade']; ?></td>
									<td><?php echo $linhas['atividade']; ?></td>
							<td>
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#Modal" 
										data-whatever="<?php echo $linhas['id_atividade']; ?>" 
										data-whateveratividade="<?php echo $linhas['atividade']; ?>"  
										>Editar</button>
										
										<a href="processa/apagar_1000.php?id_atividade=<?php echo $linhas['id_atividade']; ?>"data-confirm='Tem certeza de que deseja excluir o item selecionado ?'"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>

									<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $linhas['id_atividade']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $linhas['atividade']; ?></h4>
											</div>
											<div class="modal-body">
												<!-- Mostrado no Ação > Visualizar-->
												<p><?php echo $linhas['id_atividade']; ?></p>
												<b>Atividade</b>: <?php echo $linhas['atividade']; ?></p>
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
						<form method="POST" action="processa/editar_1000.php" enctype="multipart/form-data" autocomplete="off">
							<div class="form-group">
								<label for="recipient-atividade" class="control-label">Atividade:</label>
								<input name="atividade" type="text" class="form-control" id="recipient-atividade">
							</div>
							
							<input name="id_atividade" type="hidden" id="id_atividade">
							
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
				var recipientatividade = button.data('whateveratividade')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID da Atividade: ' + recipient)
				modal.find('#id_atividade').val(recipient)
				modal.find('#recipient-atividade').val(recipientatividade)
			})
		</script>
		 <script type="text/javascript">
      $('#databatismo').datepicker({  
        format: "dd/mm/yyyy",
        startView: 3, 
        language: "pt-BR",
        clearBtn: true,
        //minViewMode: 3,
       // startDate: '+0d',
      });</script>
      <script type="text/javascript">
      $('#datanascimento').datepicker({  
        format: "dd/mm/yyyy", 
        startView: 3,
        language: "pt-BR",
        clearBtn: true,
        //startDate: '+0d',
      });</script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
	<script src="js/personalizado.js"></script>		
    
  </body>
</html>

