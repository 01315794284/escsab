<?php
	include_once("../conexao.php");
	$id_apontamento = mysqli_real_escape_string($conn, $_POST['id_apontamento']);
	$classe = mysqli_real_escape_string($conn, $_POST['classe']);
	$dataapontamento = mysqli_real_escape_string($conn, $_POST['dataapontamento']);
	$estudo = mysqli_real_escape_string($conn, $_POST['estudo']);
	$acao = mysqli_real_escape_string($conn, $_POST['acao']);
	$encontro = mysqli_real_escape_string($conn, $_POST['encontro']);
	$contato = mysqli_real_escape_string($conn, $_POST['contato']);
	$estudosbiblicos = mysqli_real_escape_string($conn, $_POST['estudosbiblicos']);
	$oferta = mysqli_real_escape_string($conn, $_POST['oferta']);
	$presenca = mysqli_real_escape_string($conn, $_POST['presenca']);
	$adventista = mysqli_real_escape_string($conn, $_POST['adventista']);
	$naoadventista = mysqli_real_escape_string($conn, $_POST['naoadventista']);

	
	$result_usuarios = "UPDATE apontamento SET `classe`='$classe', `dataapontamento`='$dataapontamento', `estudo`='$estudo', `acao`='$acao', `encontro`='$encontro', `contato`='$contato', `estudosbiblicos`='$estudosbiblicos', `oferta`='$oferta', `presenca`='$presenca', `adventista`='$adventista', `naoadventista`='$naoadventista'  WHERE id_apontamento = '$id_apontamento'";

	$resultado_usuarios = mysqli_query($conn, $result_usuarios);	
		header("Location: ../p_listar_apontamento.php");
?>