<?php	
  session_start();
  $numerologin = $_SESSION['usuarioLogin'];

	include_once("conexao.php");
	$dia = date("j");
$mes = date("n");
$ano = date("Y");
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);
//$hoje = date(" j, F, Y, g:i a");                 // March 10, 2001, 5:16 pm
//echo "$hoje";

	$impressao = "";	
/*	$impressao = '<table border=1';	
	$impressao .= '<thead>';
	$impressao .= '<tr>';
	$impressao .= '<th>classe</th>';
	$impressao .= '<th>presenca</th>';
	$impressao .= '<th>E-mail</th>';
	$impressao .= '<th>encontro</th>';
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
	
	$result_alunos = "SELECT classe,presenca,acao,encontro,contato,estudo,estudosbiblicos,oferta FROM apontamento where dataapontamento=$dataapontamento2 and classe=$numerologin ";
	$resultado_alunos = mysqli_query($conn, $result_alunos);
	while($linhas_alunos = mysqli_fetch_assoc($resultado_alunos)){
		//echo "classe: ";
		$impressao .= "<i><u><b> Classe</i></u> |";
		$impressao .= $linhas_alunos['classe'] . 			" | <br><b>Presenca:</b> ";
		$impressao .= $linhas_alunos['presenca'] . 			" | <b>Ação Missionária :  </b>";
		$impressao .= $linhas_alunos['acao'] . 				" | <b>Encontro Extra Classe: </b>";
		$impressao .= $linhas_alunos['encontro'] . 			" | <b>Contatos Missionários:</b>";
		$impressao .= $linhas_alunos['contato'] . 			" <br><b>Estudo Bíblia/Lição: </b>";		
		$impressao .= $linhas_alunos['estudo'] . 			" | <b>Estudos Biblicos: </b>";		
		$impressao .= $linhas_alunos['estudosbiblicos'] . 	" | <b>Oferta: R$ </b>";		
		$impressao .= $linhas_alunos['oferta'] . 			"<hr>";

				
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
			<h2 style="text-align: center;"><img src="imagens/logoclasse.jpeg">Termômetro Classe</h2>
			'. $impressao .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"Termometro_Classe_Esc_Sab_Fonseca.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>