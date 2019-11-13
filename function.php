<?php
include_once("conexao.php");

function retorna($numerodaclasse, $conn){
	$result_aluno = "SELECT * FROM classes WHERE numerodaclasse = '$numerodaclasse' LIMIT 1";
	$resultado_pontuacao = mysqli_query($conn, $result_aluno);
	if($resultado_pontuacao->num_rows){
		$linhas_pontuacao = mysqli_fetch_assoc($resultado_pontuacao);
		$valores['classe'] = $linhas_pontuacao['classe'];
		$valores['pontuacao'] = $linhas_pontuacao['pontuacao'];
		$valores['professor'] = $linhas_pontuacao['professor'];
	}else{
		$valores['classe'] = 'Classe Não Existe';
	}
	return json_encode($valores);
}

if(isset($_GET['numerodaclasse'])){
	echo retorna($_GET['numerodaclasse'], $conn);
}
?>