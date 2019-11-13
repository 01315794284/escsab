<?php
  session_start();
    include_once("p_menu_admin_professor.php");
    include_once("conexao.php");

  //Nome e (Número da Classe + Login Professor)
  $nomeprofessor = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];

	//Consultas SQL 
  include "sql/p/admin_professor/sql_p_administrativo_professor.php";

  

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
    
    <h2><center> Classe <?php echo "$numerologin"; ?></center></h2>
  </div>
<body role="document">
             <center><font size="200" face="Verdana"><?php echo "Total de Pontos: $pontuacaoclasse";  ?></font></center>

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



<!--Aniversariantes-->
            <h1><center>Aniversariantes </center></h1>

<div class="container theme-showcase" role="main">      
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th><center>Nome</center></th>
            <th><center>Aniversário</center></th>
          </tr>
        </thead>
              <tbody>
                <?php while($linhas_aniversario = mysqli_fetch_assoc($resultado_aniversario)){ ?>
                  <tr>
                    <td><center><?php echo $linhas_aniversario['nome']; ?></center></td>
                    <td><center><?php echo date("d-m-Y",strtotime($linhas_aniversario['datanascimento'])); ?></center></td>
                  </tr>
                <?php } ?>
            </tbody>
      </table>
    </div>
  </div>    
 </div>


    <center><h1>Termometro <?php echo " $datadia/$datames/$dataano";?></h1></center>
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
