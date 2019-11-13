<?php
  session_start();
  $nomelogado = $_SESSION['usuarioNome'];
 // include_once("menu_admin.php");
include_once("conexao.php");
$ano = date("Y");
  //Selecionar a maior pontuacao

  $resultado_apontamento=mysqli_query($conn, "SELECT Max(dataapontamento)  FROM apontamento");
  $linhas_datas=mysqli_num_rows($resultado_apontamento);
 // $resultado=mysqli_query($conn, "SELECT *, sum(pontuacao) ponto order by pontuacao DESC");
  //$linhas=mysqli_num_rows($resultado);

  $resultado_max_classe=mysqli_query($conn, "SELECT Max(numerodaclasse)  FROM classes ");
  $linhas_max_classe=mysqli_num_rows($resultado_max_classe);

// Aniversariantes
$mes_atual = date("m");
$resultado_aniversario=mysqli_query($conn, "SELECT * FROM usuarios WHERE Month(datanascimento) = '$mes_atual' ORDER BY classe ASC");
  $linhas_aniversario=mysqli_num_rows($resultado_aniversario);


      //Consulta Oferta das Classes
      $resultado_oferta_classe = mysqli_query($conn, "SELECT alvodeoferta FROM classes");
      $linhas_oferta_classe = mysqli_num_rows($resultado_oferta_classe);


$sqlmaior_classe = mysqli_query($conn , "SELECT *, max(numerodaclasse) maior_classe FROM classes");
    while ($dadosmaior_classe = mysqli_fetch_array($sqlmaior_classe)){
      extract($dadosmaior_classe);
    }
//$maior_classe = $maior_classe;

    $sqlmaiordata = mysqli_query($conn , "SELECT *, max(dataapontamento) dataapontamento FROM apontamento");
    while ($dadosmaiordata = mysqli_fetch_array($sqlmaiordata)){
      extract($dadosmaiordata);
    }
    //MAIOR DATA
    $datadia = $dataapontamento[6].$dataapontamento[7];
    $datames = $dataapontamento[4].$dataapontamento[5];
    $dataano = $dataapontamento[0].$dataapontamento[1].$dataapontamento[2].$dataapontamento[3];


  $conn_id = mysqli_connect($servidor, $usuario, $senha, $dbname);
  $resultado_id=mysqli_query($conn_id, "SELECT Max(id_apontamento)  FROM apontamento");
  $linhas_datas=mysqli_num_rows($resultado_id);


      //Conexao para VRF a quantidade
      $resultado_estudo=mysqli_query($conn, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento");
      $linhas_estudo=mysqli_num_rows($resultado_estudo);


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Sloan ALT">
    <link rel="icon" href="imagens/es.ico">

    <title>Administrativo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
  </head>

  
<div class="container theme-showcase" role="main">  
<!--Aniversariantes-->
            <h1><center>Aniversariantes </center></h1>

<div class="container theme-showcase" role="main">      
  <div class="row">
  <div class="col-md-12">
    <table class="table">
   
    <thead>
     <tr>
                <th><center>Nome</center></th>
                <th><center>Classe</center></th>
                <th><center>Aniversario</center></th>
    </tr>
    </thead>
    <tbody>
<?php while($linhas_aniversario = mysqli_fetch_assoc($resultado_aniversario)){ ?>
                <tr>
                  <td><?php echo $linhas_aniversario['nome']; ?></td>
                  <td><?php echo $linhas_aniversario['classe']; ?></td>
                  <td><?php echo $linhas_aniversario['datanascimento']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>
    </div>

  <div class="page-header">
    <h1><center>Pontuacao <a href="cad_pontuacao.php" ><img src="imagens/addv.png"></a></center></h1>
  </div>
 
<body role="document">

    <div class="container theme-showcase" role="main">      
  <div class="row">
  <div class="col-md-12">
    <table class="table">
   
    <thead>
     <tr>
                <th><center>Classe</center></th>
                <th><center>Pontuacao</center></th>
    </tr>
    </thead>
    <tbody>

      <?php
        for ($i=1; $i <= $maior_classe; $i++) { 
        $sqlpontos = mysqli_query($conn , "SELECT *, Sum(pontuacao) ponto FROM pontuacao WHERE classe=$i");
          while ($dadospontos = mysqli_fetch_array($sqlpontos)){
            extract($dadospontos);
                          }
        echo "<tr>";
                  echo "<td><center>". $i ."</center></td>";//</center>";
                  echo "<td><center>". $ponto ."</center></td>";//</center>";
        echo "</tr>";
            }
?>
            </tbody>
           </table>
        </div>
      </div>    
    </div>
</div>
  <?php
//VRF o valor de estudosbiblicos
$sqlmaiordata = mysqli_query($conn , "SELECT *, max(dataapontamento) dataapontamento FROM apontamento");
    while ($dadosmaiordata = mysqli_fetch_array($sqlmaiordata)){
      extract($dadosmaiordata);
    }

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
$sqlestudo = mysqli_query($conn , "SELECT *, sum(estudo) estudosabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosestudo = mysqli_fetch_array($sqlestudo)){
      extract($dadosestudo);
    }
//-----------------------------------------encontro------------------------------------------------
//VRF o valor de encontro
$sqlencontro = mysqli_query($conn , "SELECT *, sum(encontro) encontrosabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosencontro = mysqli_fetch_array($sqlencontro)){
      extract($dadosencontro);
    }
//-----------------------------------------Estudos Biblicos------------------------------------------------
//VRF o valor de estudosbiblicos
$sqlestudosbiblicos = mysqli_query($conn , "SELECT *, sum(estudosbiblicos) estudosbiblicossabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosestudosbiblicos = mysqli_fetch_array($sqlestudosbiblicos)){
      extract($dadosestudosbiblicos);
    }
/*-----------------------------------------QTD Estudosbiblicos------------------------------------------------
//VRF o valor de qtdestudosbiblicos
$sqlqtdestudosbiblicos = mysqli_query($conn , "SELECT *, sum(qtdestudosbiblicos) qtdestudosbiblicos_sabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosqtdestudosbiblicos = mysqli_fetch_array($sqlqtdestudosbiblicos)){
      extract($dadosqtdestudosbiblicos);
    }
$qtdestudosbiblicossabado = $qtdestudosbiblicos_sabado;
//echo "--------qtdestudosbiblicos sabado---------- $qtdestudosbiblicossabado";*/

//-----------------------------------------Acao Soliária------------------------------------------------
//VRF o valor de acao
$sqlacao = mysqli_query($conn , "SELECT *, sum(acao) acaosabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosacao = mysqli_fetch_array($sqlacao)){
      extract($dadosacao);
    }
//-----------------------------------------presenca------------------------------------------------
//VRF o valor de presenca
$sqlpresenca = mysqli_query($conn , "SELECT *, sum(presenca) presencasabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadospresenca = mysqli_fetch_array($sqlpresenca)){
      extract($dadospresenca);
    }
//-----------------------------------------contato------------------------------------------------
//VRF o valor de presenca
$sqlcontato = mysqli_query($conn , "SELECT *, sum(contato) contatosabado FROM apontamento WHERE dataapontamento=$dataapontamento");
    while ($dadoscontato = mysqli_fetch_array($sqlcontato)){
      extract($dadoscontato);
    }
//-----------------------------------------qtd_alunos------------------------------------------------
//VRF o valor de qtd_alunos
$sqlqtd_alunos = mysqli_query($conn , "SELECT *, count(niveis_acesso_id) qtd_alunos_total FROM usuarios");
    while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
      extract($dadosqtd_alunos);
    }
//-----------------------------------------QTD Visitas Adventistas------------------------------------------------
  $resultado_adventista_sabado = mysqli_query($conn , "SELECT sum(adventista) adventista_sabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosqtd_adventista_sabado = mysqli_fetch_array($resultado_adventista_sabado)){
      extract($dadosqtd_adventista_sabado);
    }
//-----------------------------------------QTD Visitas Não Adventistas------------------------------------------------
  $resultado_naoadventista_sabado = mysqli_query($conn , "SELECT sum(naoadventista) naoadventista_sabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosqtd_naoadventista_sabado = mysqli_fetch_array($resultado_naoadventista_sabado)){
      extract($dadosqtd_naoadventista_sabado);
    }
//-----------------------------------------oferta------------------------------------------------
//VRF o valor de oferta
$sqloferta = mysqli_query($conn , "SELECT *, sum(oferta) ofertasabado FROM apontamento WHERE dataapontamento=$dataapontamento ");
    while ($dadosoferta = mysqli_fetch_array($sqloferta)){
      extract($dadosoferta);
    }
//-----------------------------------------alvo de oferta------------------------------------------------
//VRF o valor de alvodeoferta
$sqlalvodeoferta = mysqli_query($conn , "SELECT *, sum(alvodeoferta) valordeoferta FROM classes ");
    while ($dadosalvodeoferta = mysqli_fetch_array($sqlalvodeoferta)){
      extract($dadosalvodeoferta);
    }
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

            <h1><center>Termometro <?php echo " $datadia/$datames/$dataano";?></center></h1>
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
      </div>    
      </div>
<div class="container theme-showcase" role="main">    
  <div class="page-header">
  <h3><form class="form-horizontal" method="POST" action="imprimir_termometro_geral.php" autocomplete="off">
       <input type="hidden" value="<?php echo "$dataapontamento"; ?>" name="dataapontamento" >
    <button type="submit" class="btn btn-success">Imprimir</button> 
</form>
</a>
 </h3>
  </div>

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

<?php
    include_once("menu_admin.php");
