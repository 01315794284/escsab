<?php
	session_start();
    include_once("conexao.php");
    include_once("menu_admin.php");


//Recebendo Parâmetros
$classe					= filter_input(INPUT_POST, 'numerodaclasse', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);
$dataapontamento = explode("/", $dataapontamento2); 
$dataapontamento = $dataapontamento[2].$dataapontamento[1].$dataapontamento[0];

			//$dataapontamento = strtotime($dataapontamento2);
			//Conexão para VRF a quantidade
			$conn_termometro = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$resultado_estudo=mysqli_query($conn_termometro, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento");
			$linhas_estudo=mysqli_num_rows($resultado_estudo);


			//Consulta Oferta das Classes
			$conn_oferta_classe = mysqli_connect($servidor, $usuario, $senha, $dbname);
			$resultado_oferta_classe = mysqli_query($conn_oferta_classe, "SELECT alvodeoferta FROM classes");
			$linhas_oferta_classe = mysqli_num_rows($resultado_oferta_classe);
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

    <title>Termometro Classe</title>

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
	
	<h3>Nova Consulta <a href="pesq_termometro_classe.php"><img src="imagens/adda.png">
		<form class="form-horizontal" method="POST" action="imprimir_termometro_classe.php" autocomplete="off">
       <input type="hidden" value="<?php echo "$dataapontamento"; ?>" name="dataapontamento" >
       <input type="hidden" value="<?php echo "$classe"; ?>" name="classe" >
	  <button type="submit" class="btn btn-info">Imprimir</button>
</form>
</a>
 </h3>
  </div>
 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
	<div class="col-md-12">


<?php 
//-----------------------------------------estudo------------------------------------------------
//VRF o valor de estudo
$sqlestudo = mysqli_query($conn_termometro , "SELECT *, sum(estudo) estudo_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadosestudo = mysqli_fetch_array($sqlestudo)){
			extract($dadosestudo);
		}
$estudosabado = $estudo_sabado;
//echo "--------estudo sabado---------- $estudosabado";

//-----------------------------------------encontro------------------------------------------------
//VRF o valor de encontro
$sqlencontro = mysqli_query($conn_termometro , "SELECT *, sum(encontro) encontro_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadosencontro = mysqli_fetch_array($sqlencontro)){
			extract($dadosencontro);
		}
$encontrosabado = $encontro_sabado;
//echo "--------encontro sabado---------- $encontrosabado";

//-----------------------------------------Estudos Biblicos------------------------------------------------
//VRF o valor de estudosbiblicos
$sqlestudosbiblicos = mysqli_query($conn_termometro , "SELECT *, sum(estudosbiblicos) estudosbiblicos_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadosestudosbiblicos = mysqli_fetch_array($sqlestudosbiblicos)){
			extract($dadosestudosbiblicos);
		}
$estudosbiblicossabado = $estudosbiblicos_sabado;
//echo "--------estudosbiblicos sabado---------- $estudosbiblicossabado";

//-----------------------------------------Acao Soliária------------------------------------------------
//VRF o valor de acao
$sqlacao = mysqli_query($conn_termometro , "SELECT *, sum(acao) acao_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadosacao = mysqli_fetch_array($sqlacao)){
			extract($dadosacao);
		}
$acaosabado = $acao_sabado;
//echo "--------acao sabado---------- $acaosabado";

//-----------------------------------------presenca------------------------------------------------
//VRF o valor de presenca
$sqlpresenca = mysqli_query($conn_termometro , "SELECT *, sum(presenca) presenca_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadospresenca = mysqli_fetch_array($sqlpresenca)){
			extract($dadospresenca);
		}
$presencasabado = $presenca_sabado;
//echo "--------presenca sabado---------- $presencasabado";

//-----------------------------------------contato------------------------------------------------
//VRF o valor de presenca
$sqlcontato = mysqli_query($conn_termometro , "SELECT *, sum(contato) contato_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadoscontato = mysqli_fetch_array($sqlcontato)){
			extract($dadoscontato);
		}
$contatosabado = $contato_sabado;
//echo "--------presenca sabado---------- $presencasabado";


//-----------------------------------------qtd_alunos------------------------------------------------
//VRF o valor de qtd_alunos
$sqlqtd_alunos = mysqli_query($conn_termometro , "SELECT *, count(niveis_acesso_id) qtd_alunos FROM usuarios WHERE classe = $classe");
		while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
			extract($dadosqtd_alunos);
		}
$qtd_alunos_total = $qtd_alunos;
//echo "--------Alunos Total---------- $qtd_alunos_total";

//-----------------------------------------oferta------------------------------------------------
//VRF o valor de oferta
$sqloferta = mysqli_query($conn_termometro , "SELECT *, sum(oferta) oferta_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
		while ($dadosoferta = mysqli_fetch_array($sqloferta)){
			extract($dadosoferta);
		}
$ofertasabado = $oferta_sabado;
//echo "--------oferta sabado---------- $ofertasabado";

//-----------------------------------------QTD Visitas Adventistas------------------------------------------------
	$resultado_adventista_classe=mysqli_query($conn, "SELECT adventista FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
	$linhas_visitantes_adventistas=mysqli_num_rows($resultado_adventista_classe);

//-----------------------------------------QTD Visitas Não Adventistas------------------------------------------------
	$resultado_nao_adventista_classe=mysqli_query($conn, "SELECT naoadventista FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
	$linhas_visitantes_nao_adventistas=mysqli_num_rows($resultado_nao_adventista_classe);

//-----------------------------------------alvo de oferta------------------------------------------------
//VRF o valor de alvodeoferta
$sqlalvodeoferta = mysqli_query($conn_oferta_classe , "SELECT *, sum(alvodeoferta) valor_oferta FROM classes WHERE numerodaclasse = $classe");
		while ($dadosalvodeoferta = mysqli_fetch_array($sqlalvodeoferta)){
			extract($dadosalvodeoferta);
		}
$valordeoferta = $valor_oferta;
//echo "--------oferta sabado---------- $ofertasabado";

			//Cálculos - Exceto QTD Estudos Bíblicos		
		 	$total_estudo = (($estudosabado *100)/$qtd_alunos_total);
			$total_encontro = (($encontrosabado*100)/$qtd_alunos_total);
			$total_presenca = (($presencasabado*100)/$qtd_alunos_total);
			$total_contato = (($contatosabado*100)/$qtd_alunos_total);
			$total_estudosbiblicos = (($estudosbiblicossabado*100)/$qtd_alunos_total);
			$total_acao = (($acaosabado*100)/$qtd_alunos_total);
			$total_qtdofertas = (($ofertasabado*100)/$valordeoferta);
						?>	
						<html>
						<head>
						<style>
						table {
						  font-family: arial, sans-serif;
						  border-collapse: collapse;
						  width: 100%;
						}

						td, th {
						  border: 1px solid #dddddd;
						  text-align: left;
						  padding: 8px;
						}

						tr:nth-child(even) {
						  background-color: #CBE2F1;
						}
						</style>
						</head>
						<body>
						<h1><center>  Classe:<?php echo " $numerodaclasse | "; echo "$classe | "; echo "Data: $dataapontamento2 | ";  echo "$professor" ;?> </center></h1>
						<!-- Tabela com Resultados  -->
						<h3><img src="imagens/termometro.png" class="img-responsive" ></h3>
						<div class="container theme-showcase" role="main">      
						<table style="width:100%">
						  <tr>
						    <th>Item</th>
						    <th>%</th> 
						    <th>Realidade</th> 
						  </tr>
						  <tr>
						    <td>Estudaram a Licao Diariamente</td>
						    <td><?php echo ceil($total_estudo)."%<br>";?></td>
						    <td><?php if ($total_estudo <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudo >= 26 and $total_estudo <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudo >= 51 and $total_estudo <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Membros Presentes</td>
						    <td><?php echo ceil($total_presenca)."%<br>";?></td>
						    <td><?php if ($total_presenca <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_presenca >= 26 and $total_presenca <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_presenca >= 51 and $total_presenca <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <td>Realizacao de Acoes Solidarias</td>
						    <td><?php echo ceil($total_acao)."%<br>";?></td>
						    <td><?php if ($total_acao <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_acao >= 26 and $total_acao <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_acao >= 51 and $total_acao <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Encontro Extra Classe</td>
						    <td><?php echo ceil($total_encontro)."%<br>";?></td>
						    <td><?php if ($total_encontro <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_encontro >= 26 and $total_encontro <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_encontro >= 51 and $total_encontro <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Contatos Missionarios</td>
						    <td><?php echo ceil($total_contato)."%<br>";?></td>
						    <td><?php if ($total_contato <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_contato >= 26 and $total_contato <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_contato >= 51 and $total_contato <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  
						  <tr>
						    <td>Membros Dando Estudos Biblicos</td>
						    <td><?php echo ceil($total_estudosbiblicos)."%<br>";?></td>
						    <td><?php if ($total_estudosbiblicos <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 26 and $total_estudosbiblicos <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 51 and $total_estudosbiblicos <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						  <tr>
						    <td>Ofertas</td>
						    <td><?php echo ceil($total_qtdofertas)."%<br>";?></td>
						    <td><?php if ($total_qtdofertas <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 26 and $total_qtdofertas <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 51 and $total_qtdofertas <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
						    </td>
						  </tr>
						</table>

						<!-- Valores Retornados da Consulta do Banco  -->
						<h3><center>Valores da Consulta</center></h3>
						<table style="width:100%">
						  <tr>
						    <th>Item</th>
						    <th>Quantidade</th> 
						  </tr>
						  <tr>
						    <td>QTD Estudo licao</td>
						    <td><?php echo "$estudosabado";?></td>
						  </tr>
						  <tr>
						    <td>QTD Presentes na ES</td>
						    <td><?php echo "$presencasabado";?></td>
						  </tr>
						  <tr>
						    <td>QTD Acao Solidaria</td>
						    <td><?php echo "$acaosabado";?></td>
						  </tr>
						  <tr>
						    <td>QTD Presentes Extra Classe</td>
						    <td><?php echo "$encontrosabado";?></td>
						  </tr>
						  <tr>
						    <td>QTD Contatos Missionarios</td>
						    <td><?php echo "$contatosabado";?></td>
						  </tr>
						  <tr>
						    <td>QTD Alunos Dando Estudos</td>
						    <td><?php echo "$estudosbiblicossabado";?></td>
						  </tr>
						  <tr>
						    <td>Visitantes Adventistas</td>
						    <td><?php while($linhas_visitantes_adventistas = mysqli_fetch_assoc($resultado_adventista_classe)){ ?><?php echo $linhas_visitantes_adventistas['adventista']; ?> <?php } ?></td>
						  </tr>
						  <tr>
						    <td>Visitantes Nao Adventistas</td>
						    <td><?php while($linhas_visitantes_nao_adventistas = mysqli_fetch_assoc($resultado_nao_adventista_classe)){ ?><?php echo $linhas_visitantes_nao_adventistas['naoadventista']; ?><?php } ?></td>
						  </tr>
						  <tr>
						    <td>QTD Alunos Matriculados</td>
						    <td><?php echo "$qtd_alunos_total";?></td>
						  </tr>
						  <tr>
						    <td>Ofertas</td>
						    <td><?php echo "$ofertasabado";?></td>
						  </tr>
						  
						</table>



						</body>
						</html>

						<!--

-->
			</div>		
			</div>

			






			   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>	
	</body>
</html>
