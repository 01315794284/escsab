<?php
  session_start();
    include_once("p_menu_admin_professor.php");
    include_once("conexao.php");
$mes = date("n");
$ano = date("Y");

  //Nome e (Número da Classe + Login Professor)
  $nomeprofessor = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];

  //Selecionar a maior pontuação
  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado=mysqli_query($conn, "SELECT * FROM pontuacao where classe = $numerologin");
  $linhas=mysqli_num_rows($resultado);

  $sqlpontos = mysqli_query($conn , "SELECT *, sum(pontuacao) pontuacao_classe FROM pontuacao WHERE classe=$numerologin");
		while ($dadospontos = mysqli_fetch_array($sqlpontos)){
			extract($dadospontos);
		}
$pontuacaoclasse = $pontuacao_classe;



  $conn_apontamento = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado_apontamento=mysqli_query($conn_apontamento, "SELECT Max(dataapontamento)  FROM apontamento where classe = $numerologin");
  $linhas_datas=mysqli_num_rows($resultado_apontamento);

$conn_nome = mysqli_connect($servidor, $usuario, $senha, $dbname);
    $resultado_nome=mysqli_query($conn_nome, "SELECT * FROM classes where professor = $nomeprofessor");
    $linhas_nome=$resultado_nome;
    echo "$linhas_nome";

    $sql_nome_associado = mysqli_query($conn_apontamento , "SELECT *, (professorassociado) nomeprofessorassociado FROM classes where numerodaclasse = $numerologin");
    while ($dados_nome_associado = mysqli_fetch_array($sql_nome_associado)){
      extract($dados_nome_associado);
    }  

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Sloan ALT">
    <link rel="icon" href="../imagens/es.ico">

    <title>Professor</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  </head>

	
<div class="container theme-showcase" role="main">

  <div class="page-header">
  	
    <br>
    <h3><center><img width="70px" src='imagens/classe2.jpeg' class='img-responsive'></center></h3>
    
    <h2><center>Bem Vindo(a) <br> <?php echo "$nomeprofessor e $nomeprofessorassociado <br>"; ?> Classe N-<?php echo "$numerologin"; ?></center></h2>
  </div>
<body role="document">
                 	 <center><font size="200" face="Verdana"><?php echo "Total de Pontos: $pontuacaoclasse";  ?></font></center>

   
<?php
//VRF o valor de estudosbiblicos
$sqlmaiordata = mysqli_query($conn_apontamento , "SELECT *, max(dataapontamento) maior_data FROM apontamento where classe = $numerologin");
    while ($dadosmaiordata = mysqli_fetch_array($sqlmaiordata)){
      extract($dadosmaiordata);
    }
$dataapontamento = $maior_data;
//echo "--------maiordata---------- $dataapontamento";

      $dataapontamento2 = strtotime($dataapontamento);
      //Conexão para VRF a quantidade
      $conn_termometro = mysqli_connect($servidor, $usuario, $senha, $dbname);
      $resultado_estudo=mysqli_query($conn_termometro, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
      $linhas_estudo=mysqli_num_rows($resultado_estudo);


      //Consulta Oferta das Classes
      $conn_oferta_classe = mysqli_connect($servidor, $usuario, $senha, $dbname);
      $resultado_oferta_classe = mysqli_query($conn_oferta_classe, "SELECT alvodeoferta FROM classes where numerodaclasse = $numerologin");
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
  

 
<body role="document">
    <div class="container theme-showcase" role="main">      
  <div class="row">
  <div class="col-md-12">


<?php 

//-----------------------------------------estudo------------------------------------------------
//VRF o valor de estudo
$sqlestudo = mysqli_query($conn_termometro , "SELECT *, sum(estudo) estudo_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosestudo = mysqli_fetch_array($sqlestudo)){
      extract($dadosestudo);
    }
$estudosabado = $estudo_sabado;
//echo "--------estudo sabado---------- $estudosabado";

//-----------------------------------------encontro------------------------------------------------
//VRF o valor de encontro
$sqlencontro = mysqli_query($conn_termometro , "SELECT *, sum(encontro) encontro_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosencontro = mysqli_fetch_array($sqlencontro)){
      extract($dadosencontro);
    }
$encontrosabado = $encontro_sabado;
//echo "--------encontro sabado---------- $encontrosabado";

//-----------------------------------------Estudos Biblicos------------------------------------------------
//VRF o valor de estudosbiblicos
$sqlestudosbiblicos = mysqli_query($conn_termometro , "SELECT *, sum(estudosbiblicos) estudosbiblicos_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosestudosbiblicos = mysqli_fetch_array($sqlestudosbiblicos)){
      extract($dadosestudosbiblicos);
    }
$estudosbiblicossabado = $estudosbiblicos_sabado;
//echo "--------estudosbiblicos sabado---------- $estudosbiblicossabado";

/*-----------------------------------------QTD Estudosbiblicos------------------------------------------------
//VRF o valor de qtdestudosbiblicos
$sqlqtdestudosbiblicos = mysqli_query($conn_termometro , "SELECT *, sum(qtdestudosbiblicos) qtdestudosbiblicos_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosqtdestudosbiblicos = mysqli_fetch_array($sqlqtdestudosbiblicos)){
      extract($dadosqtdestudosbiblicos);
    }
$qtdestudosbiblicossabado = $qtdestudosbiblicos_sabado;
//echo "--------qtdestudosbiblicos sabado---------- $qtdestudosbiblicossabado";*/

//-----------------------------------------Acao Soliária------------------------------------------------
//VRF o valor de acao
$sqlacao = mysqli_query($conn_termometro , "SELECT *, sum(acao) acao_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosacao = mysqli_fetch_array($sqlacao)){
      extract($dadosacao);
    }
$acaosabado = $acao_sabado;
//echo "--------acao sabado---------- $acaosabado";

//-----------------------------------------presenca------------------------------------------------
//VRF o valor de presenca
$sqlpresenca = mysqli_query($conn_termometro , "SELECT *, sum(presenca) presenca_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
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
$sqlqtd_alunos = mysqli_query($conn_termometro , "SELECT *, count(niveis_acesso_id) qtd_alunos FROM usuarios WHERE classe = $numerologin");
    while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
      extract($dadosqtd_alunos);
    }
$qtd_alunos_total = $qtd_alunos;
//echo "--------Alunos Total---------- $qtd_alunos_total";

//-----------------------------------------QTD Visitas Adventistas------------------------------------------------
  $resultado_adventista_sabado = mysqli_query($conn_termometro , "SELECT sum(adventista) adventista_sabado1 FROM apontamento WHERE dataapontamento=$dataapontamento AND classe = $numerologin");
    while ($dadosqtd_adventista_sabado = mysqli_fetch_array($resultado_adventista_sabado)){
      extract($dadosqtd_adventista_sabado);
    }
$adventista_sabado = $adventista_sabado1;

//-----------------------------------------QTD Visitas Não Adventistas------------------------------------------------
  $resultado_naoadventista_sabado = mysqli_query($conn_termometro , "SELECT sum(naoadventista) naoadventista_sabado1 FROM apontamento WHERE dataapontamento=$dataapontamento AND classe = $numerologin");
    while ($dadosqtd_naoadventista_sabado = mysqli_fetch_array($resultado_naoadventista_sabado)){
      extract($dadosqtd_naoadventista_sabado);
    }
$naoadventista_sabado = $naoadventista_sabado1;

//-----------------------------------------oferta------------------------------------------------
//VRF o valor de oferta
$sqloferta = mysqli_query($conn_termometro , "SELECT *, sum(oferta) oferta_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosoferta = mysqli_fetch_array($sqloferta)){
      extract($dadosoferta);
    }
$ofertasabado = $oferta_sabado;
//echo "--------oferta sabado---------- $ofertasabado";

//-----------------------------------------alvo de oferta------------------------------------------------
//VRF o valor de alvodeoferta
$sqlalvodeoferta = mysqli_query($conn_oferta_classe , "SELECT *, sum(alvodeoferta) valor_oferta FROM classes where numerodaclasse = $numerologin");
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
              width: 1000%;
            }

            td, th {
              border: 0px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #CBE2F1;
            }
            </style>
            </head>
            <br><br><br><br><br><br><br><br><br><br>
            <body>

            <h1><center>Termometro da Igreja - Ultima Semana</center></h1>
            <div class="container theme-showcase" role="main">    
            <div class="page-header">
            <h3>
                <form class="form-horizontal" method="POST" action="p_listar_apontamento.php" autocomplete="off">
                  <center><button type="submit" class="btn btn-warning">Editar Apontamento</button> </center>
                </form>
           </h3>
          </div>
          </div>

            <!-- Tabela com Resultados  -->
            <h3><img src="imagens/termometro.png" class="img-responsive" ></h3>
            <div class="container theme-showcase" role="main">      
            <table style="width:100%">
              <tr>
                <th>Item</th>
                <th>%</th> 
                <th>QTD</th> 
                <th>Realidade</th> 
              </tr>
              <tr>
                <td>Estudaram a Licao Diariamente</td>
                <td><?php echo ceil($total_estudo)."%<br>";?></td>
                <td><?php echo "$estudosabado/$qtd_alunos_total";?></td>
                <td><?php if ($total_estudo <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudo >= 26 and $total_estudo <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudo >= 51 and $total_estudo <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
              <tr>
                <td>Membros Presentes</td>
                <td><?php echo ceil($total_presenca)."%<br>";?></td>
                <td><?php echo "$presencasabado/$qtd_alunos_total";?></td>

                <td><?php if ($total_presenca <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_presenca >= 26 and $total_presenca <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_presenca >= 51 and $total_presenca <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
              <td>Realizacao de Acoes Solidarias</td>
                <td><?php echo ceil($total_acao)."%<br>";?></td>
                <td><?php echo "$acaosabado/$qtd_alunos_total";?></td>

                <td><?php if ($total_acao <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_acao >= 26 and $total_acao <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_acao >= 51 and $total_acao <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
              <tr>
                <td>Encontro Extra Classe</td>
                <td><?php echo ceil($total_encontro)."%<br>";?></td>
                <td><?php echo "$encontrosabado/$qtd_alunos_total";?></td>

                <td><?php if ($total_encontro <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_encontro >= 26 and $total_encontro <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_encontro >= 51 and $total_encontro <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
              <tr>
                <td>Contatos Missionarios</td>
                <td><?php echo ceil($total_contato)."%<br>";?></td>
                <td><?php echo "$contatosabado/$qtd_alunos_total";?></td>

                <td><?php if ($total_contato <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_contato >= 26 and $total_contato <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_contato >= 51 and $total_contato <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
              <tr>
                <td>Membros Dando Estudos Biblicos</td>
                <td><?php echo ceil($total_estudosbiblicos)."%<br>";?></td>
                <td><?php echo "$estudosbiblicossabado/$qtd_alunos_total";?></td>

                <td><?php if ($total_estudosbiblicos <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 26 and $total_estudosbiblicos <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_estudosbiblicos >= 51 and $total_estudosbiblicos <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
              <tr>
                <td>Ofertas</td>
                <td><?php echo ceil($total_qtdofertas)."%<br>";?></td>
                <td><?php echo "$ofertasabado";?></td>

                <td><?php if ($total_qtdofertas <= 25) {echo "<img src='imagens/25.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 26 and $total_qtdofertas <=50) {echo "<img src='imagens/50.png' class='img-responsive'>";}elseif ($total_qtdofertas >= 51 and $total_qtdofertas <=75) {echo "<img src='imagens/75.png' class='img-responsive'>";}else {echo "<img src='imagens/100.png' class='img-responsive'>";}?>
                </td>
              </tr>
            </table>

            <!-- Valores Retornados da Consulta do Banco  -->
            <h3>Valores da Consulta</h3>
            <table style="width:100%">
              
              <tr>
                <td>Visitantes Adventistas</td>
                <td><?php echo "$adventista_sabado";?></td>
              </tr>
              <tr>
                <td>Visitantes Nao Adventistas</td>
                <td><?php echo "$naoadventista_sabado";?></td>
              </tr>
              
            </table>
            <div class="container theme-showcase" role="main">    
            <div class="page-header">
            <h3>
                <form class="form-horizontal" method="POST" action="p_listar_apontamento.php" autocomplete="off">
                  <center><button type="submit" class="btn btn-warning">Editar Apontamento</button> </center>
                </form>
           </h3>
            </div>
            </div>

            <!--<h3>
                <form class="form-horizontal" method="POST" action="p_imprimir_termometro_classe.php" autocomplete="off">
                  <input type="hidden" value="<?php echo "$dataapontamento"; ?>" name="dataapontamento" >
                  <input type="hidden" value="<?php echo "$numerologin"; ?>" name="classe" >
                  <center><button type="submit" class="btn btn-warning">Imprimir Apontamento</button> </center>
                </form>
           </h3>
            </div>
            </div>-->


            </body>
            </html>

            <!--


<h1><center>Atividades Realizadas</center></h1>
 <div class="container theme-showcase" role="main">      
  <div class="row">
  <div class="col-md-12">
    <table class="table">
    <thead>
     <tr>
                <th>Atividade</th>
                <th>Pontuacao</th>
                <th>Obs</th>
                <th>Data</th>
    </tr>
    </thead>
    <tbody>
      <?php while($linhas = mysqli_fetch_assoc($resultado)){ ?>
                <tr>
                  <th><?php echo $linhas['atividade']; ?></th>
                  <th><?php echo $linhas['pontuacao']; ?></th>
                 <th><?php echo $linhas['observacao']; ?></th>
                  <th><?php echo $linhas['data']; ?></th>
                </tr>

                <?php } ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>
        


      </div>    
      </div>
-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  <script src="js/ckeditor/ckeditor.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
