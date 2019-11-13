<?php
  //Selecionar a maior pontuação
  $resultado=mysqli_query($conn, "SELECT * FROM pontuacao where classe = $numerologin");
  $linhas=mysqli_num_rows($resultado);

  $sqlpontos = mysqli_query($conn , "SELECT *, sum(pontuacao) pontuacao_classe FROM pontuacao WHERE classe=$numerologin");
		while ($dadospontos = mysqli_fetch_array($sqlpontos)){
			extract($dadospontos);
		}
$pontuacaoclasse = $pontuacao_classe;

// Aniversariantes
//Datas 
  $mes_atual = date("m");
  $resultado_aniversario=mysqli_query($conn, "SELECT * FROM usuarios WHERE Month(datanascimento) = '$mes_atual' AND classe=$numerologin ORDER BY datanascimento, classe, nome");
    $linhas_aniversario=mysqli_num_rows($resultado_aniversario);


    $resultado_nome=mysqli_query($conn, "SELECT * FROM classes where professor = $nomeprofessor");
    $linhas_nome=$resultado_nome;
    echo "$linhas_nome";

    $sql_nome_associado = mysqli_query($conn , "SELECT *, (professorassociado) nomeprofessorassociado FROM classes where numerodaclasse = $numerologin");
    while ($dados_nome_associado = mysqli_fetch_array($sql_nome_associado)){
      extract($dados_nome_associado);
    } 

//VRF o valor de estudosbiblicos
$sqlmaiordata = mysqli_query($conn , "SELECT *, max(dataapontamento) dataapontamento FROM apontamento where classe = $numerologin");
while ($dadosmaiordata = mysqli_fetch_array($sqlmaiordata)){
  extract($dadosmaiordata);
}


//MAIOR DATA
$datadia = $dataapontamento[6].$dataapontamento[7];
$datames = $dataapontamento[4].$dataapontamento[5];
$dataano = $dataapontamento[0].$dataapontamento[1].$dataapontamento[2].$dataapontamento[3];

$dataapontamento2 = strtotime($dataapontamento);
      //Conexão para VRF a quantidade
      $resultado_estudo=mysqli_query($conn, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
      $linhas_estudo=mysqli_num_rows($resultado_estudo);


      //Consulta Oferta das Classes
      $resultado_oferta_classe = mysqli_query($conn, "SELECT alvodeoferta FROM classes where numerodaclasse = $numerologin");
      $linhas_oferta_classe = mysqli_num_rows($resultado_oferta_classe);



//Consultas e Contas de Apontamento

//-----------------------------------------estudo------------------------------------------------
//VRF o valor de estudo
$sqlestudo = mysqli_query($conn , "SELECT *, sum(estudo) estudosabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosestudo = mysqli_fetch_array($sqlestudo)){
      extract($dadosestudo);
    }
//-----------------------------------------encontro------------------------------------------------
//VRF o valor de encontro
$sqlencontro = mysqli_query($conn , "SELECT *, sum(encontro) encontrosabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosencontro = mysqli_fetch_array($sqlencontro)){
      extract($dadosencontro);
    }
//-----------------------------------------Estudos Biblicos------------------------------------------------
//VRF o valor de estudosbiblicos
$sqlestudosbiblicos = mysqli_query($conn , "SELECT *, sum(estudosbiblicos) estudosbiblicossabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosestudosbiblicos = mysqli_fetch_array($sqlestudosbiblicos)){
      extract($dadosestudosbiblicos);
    }
/*-----------------------------------------QTD Estudosbiblicos------------------------------------------------
//VRF o valor de qtdestudosbiblicos
$sqlqtdestudosbiblicos = mysqli_query($conn , "SELECT *, sum(qtdestudosbiblicos) qtdestudosbiblicos_sabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosqtdestudosbiblicos = mysqli_fetch_array($sqlqtdestudosbiblicos)){
      extract($dadosqtdestudosbiblicos);
    }
$qtdestudosbiblicossabado = $qtdestudosbiblicos_sabado;
//echo "--------qtdestudosbiblicos sabado---------- $qtdestudosbiblicossabado";*/

//-----------------------------------------Acao Soliária------------------------------------------------
//VRF o valor de acao
$sqlacao = mysqli_query($conn , "SELECT *, sum(acao) acaosabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosacao = mysqli_fetch_array($sqlacao)){
      extract($dadosacao);
    }
//-----------------------------------------presenca------------------------------------------------
//VRF o valor de presenca
$sqlpresenca = mysqli_query($conn , "SELECT *, sum(presenca) presencasabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadospresenca = mysqli_fetch_array($sqlpresenca)){
      extract($dadospresenca);
    }
//-----------------------------------------contato------------------------------------------------
//VRF o valor de presenca
$sqlcontato = mysqli_query($conn , "SELECT *, sum(contato) contatosabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe=$classe");
    while ($dadoscontato = mysqli_fetch_array($sqlcontato)){
      extract($dadoscontato);
    }
//-----------------------------------------qtd_alunos------------------------------------------------
//VRF o valor de qtd_alunos
$sqlqtd_alunos = mysqli_query($conn , "SELECT *, count(niveis_acesso_id) qtd_alunos_total FROM usuarios WHERE classe = $numerologin");
    while ($dadosqtd_alunos = mysqli_fetch_array($sqlqtd_alunos)){
      extract($dadosqtd_alunos);
    }
//-----------------------------------------QTD Visitas Adventistas------------------------------------------------
  $resultado_adventista_sabado = mysqli_query($conn , "SELECT sum(adventista) adventista_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe = $numerologin");
    while ($dadosqtd_adventista_sabado = mysqli_fetch_array($resultado_adventista_sabado)){
      extract($dadosqtd_adventista_sabado);
    }
//-----------------------------------------QTD Visitas Não Adventistas------------------------------------------------
  $resultado_naoadventista_sabado = mysqli_query($conn , "SELECT sum(naoadventista) naoadventista_sabado FROM apontamento WHERE dataapontamento=$dataapontamento AND classe = $numerologin");
    while ($dadosqtd_naoadventista_sabado = mysqli_fetch_array($resultado_naoadventista_sabado)){
      extract($dadosqtd_naoadventista_sabado);
    }
//-----------------------------------------oferta------------------------------------------------
//VRF o valor de oferta
$sqloferta = mysqli_query($conn , "SELECT *, sum(oferta) ofertasabado FROM apontamento WHERE dataapontamento=$dataapontamento and classe = $numerologin");
    while ($dadosoferta = mysqli_fetch_array($sqloferta)){
      extract($dadosoferta);
    }
//-----------------------------------------alvo de oferta------------------------------------------------
//VRF o valor de alvodeoferta
$sqlalvodeoferta = mysqli_query($conn , "SELECT *, sum(alvodeoferta) valordeoferta FROM classes where numerodaclasse = $numerologin");
    while ($dadosalvodeoferta = mysqli_fetch_array($sqlalvodeoferta)){
      extract($dadosalvodeoferta);
    }
