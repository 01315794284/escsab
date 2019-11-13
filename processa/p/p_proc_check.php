<?php
session_start();
include_once("../conexao.php");
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);// $_POST["email"];//
$classe					= filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);// $_POST["email"];//

$final						= $_POST['campos'];//

$i=0;
$resultado='';
$contador=0;//Conta quantos alunos foram marcados

while ( $i <= $final) {
	if (isset($_POST['id_presenca'.$i])) {
	$contador++;
		$resultado.=$_POST['id_presenca'.$i].';';
	} $i++ ; 
//$numero = $final-$i;//
}
$_SESSION['qtdalunospresente'] = $contador;
$_SESSION['dataapontamento'] = $dataapontamento2;


		$dataapontamento = explode("/", $dataapontamento2); 
        $dataapontamento = $dataapontamento[2].$dataapontamento[1].$dataapontamento[0];

//$dataapontamento = date('d/m/Y', strtotime($dataapontamento2));

$result_apontamento = " INSERT INTO `checkbox` (
`id_check`, 
`dataapontamento`,  
`classe`,  
`resultado` ) VALUES 
(NULL, 
'$dataapontamento',
'$classe',
'$resultado')";

$resultado_apontamento = mysqli_query($conn, $result_apontamento);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../p_cad_apontamento.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: ../p_cad_apontamento.php");
}
