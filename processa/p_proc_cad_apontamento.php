<?php
session_start();
include_once("../conexao.php");
$classe 				= filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);// $_POST["nome"];//
$dataapontamento2		= filter_input(INPUT_POST, 'dataapontamento', FILTER_SANITIZE_STRING);// $_POST["email"];//
$estudo 				= filter_input(INPUT_POST, 'estudo', FILTER_SANITIZE_STRING);// $_POST["nome"];//
$acao	 				= filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);// $_POST["email"];//
$encontro 				= filter_input(INPUT_POST, 'encontro', FILTER_SANITIZE_STRING);// $_POST["email"];//
$contato				= filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);// $_POST["endereco"];//
$estudosbiblicos 		= filter_input(INPUT_POST, 'estudosbiblicos', FILTER_SANITIZE_STRING);// $_POST["complemento"];//
$oferta					= filter_input(INPUT_POST, 'oferta', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$presenca				= filter_input(INPUT_POST, 'presenca', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$adventista				= filter_input(INPUT_POST, 'adventista', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//
$naoadventista				= filter_input(INPUT_POST, 'naoadventista', FILTER_SANITIZE_STRING);// $_POST["datanascimento"];//

		$dataapontamento = explode("/", $dataapontamento2); 
        $dataapontamento = $dataapontamento[2].$dataapontamento[1].$dataapontamento[0];

//$dataapontamento = date('d/m/Y', strtotime($dataapontamento2));

$result_apontamento = " INSERT INTO `apontamento` (
`id_apontamento`, 
`classe`, 
`dataapontamento`,  
`estudo`, 
`acao`, 
`encontro`, 
`contato`, 
`estudosbiblicos`, 
`presenca`, 
`adventista`, 
`naoadventista`, 
`oferta`) VALUES 
(NULL, 
'$classe', 
'$dataapontamento',
'$estudo', 
'$acao', 
'$encontro', 
'$contato', 
'$estudosbiblicos', 
'$presenca', 
'$adventista', 
'$naoadventista', 
'$oferta')";

$resultado_apontamento = mysqli_query($conn, $result_apontamento);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: ../p_administrativo_professor.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado</p>";
	header("Location: ../p_administrativo_professor.php");
}
