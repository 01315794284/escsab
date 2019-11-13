<?php	
	session_start();
    include_once("conexao.php");
$mes = date("n");
$ano = date("Y");


$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);
$classe					= filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);
$dataatual				= filter_input(INPUT_POST, 'dataapontamento2', FILTER_SANITIZE_STRING);
$datanova				= strtotime($dataapontamento2);


	$dia = date("j");
$mes = date("n");
$ano = date("Y");
//$hoje = date(" j, F, Y, g:i a");                 // March 10, 2001, 5:16 pm
//echo "$hoje";

	$impressao = "";	
/*	$impressao = '<table border=1';	
	$impressao .= '<thead>';
	$impressao .= '<tr>';
	$impressao .= '<th>Nome</th>';
	$impressao .= '<th>Login</th>';
	$impressao .= '<th>E-mail</th>';
	$impressao .= '<th>Senha</th>';
	$impressao .= '<th>Endereço</th>';
	$impressao .= '<th>Data Nascimento</th>';
	$impressao .= '<th>Data Batismo</th>';
	$impressao .= '<th>Tel</th>';
	$impressao .= '<th>Tel</th>';
	$impressao .= '<th>Acesso</th>';
	$impressao .= '<th>Classe</th>';
	$impressao .= '</tr>';
	$impressao .= '</thead>';
	$impressao .= '<tbody>';*/
	
	$result_alunos = "SELECT classe, dataapontamento, presenca, acao, encontro, contato, estudo, estudosbiblicos, qtdestudosbiblicos, oferta FROM apontamento where dataapontamento=$dataapontamento2 and classe=$classe";
	$resultado_alunos = mysqli_query($conn, $result_alunos);

	while($linhas_alunos = mysqli_fetch_assoc($resultado_alunos)){
		//echo "Nome: ";
		$impressao .= $linhas_alunos['classe'] . 					"<br><b>Membros Presentes: ------------------------------------------------------------------------------------------------  </b> ";
		$impressao .= $linhas_alunos['presenca'] . 					"<br><b>Ação Solidária: ------------------------------------------------------------------------------------------------------ </b> ";
		$impressao .= $linhas_alunos['acao'] . 						"<br><b>Encontro Extra Classe: -------------------------------------------------------------------------------------------- </b> ";		
		$impressao .= $linhas_alunos['encontro'] . 					"<br><b>Contatos Missionários: --------------------------------------------------------------------------------------------- </b> ";
		$impressao .= $linhas_alunos['contato'] . 					"<br><b>Estudo da Lição/Bíblia: -------------------------------------------------------------------------------------------- </b> ";		
		$impressao .= $linhas_alunos['estudo'] . 					"<br><b>Quantos Membros dando Estudos Bíblicos: ------------------------------------------------------------------- </b> ";		
		$impressao .= $linhas_alunos['estudosbiblicos'] . 			"<br><b>Quantidade de Estudos Bíblicos: --------------------------------------------------------------------------------- </b> ";		
		$impressao .= $linhas_alunos['qtdestudosbiblicos'] . 		"<br><b>Oferta: -------------------------------------------------------------------------------------------------------------</b> R$ ";		
		$impressao .= $linhas_alunos['oferta'] . 					"<hr>";

				
	}


	//$impressao .= '</tbody>';
	//$impressao .= '</table';


	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	 
	// Carrega seu HTML
	$dompdf->load_html('
			<h2 style="text-align: center;"><img src="imagens/logoclasse.jpeg"> Dados do Termômetro da Classe <img src="imagens/logoes2.jpeg"> </h2>
			'. $impressao .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Ter_Classe.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
	header("Location: ../administrativo_professor.php");
?>