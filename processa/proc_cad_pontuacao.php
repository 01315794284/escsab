<?php
session_start();
include_once("../conexao.php");

$classe 				= filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);// $_POST["classe"];//
$atividade 				= filter_input(INPUT_POST, 'atividade', FILTER_SANITIZE_STRING);// $_POST["atividade"];//
$pontuacao 				= filter_input(INPUT_POST, 'pontuacao', FILTER_SANITIZE_STRING);// $_POST["pontuacao"];//
$observacao 			= filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_STRING);// $_POST["atividade"];//
$data 					= filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);// $_POST["atividade"];//


$result_pontuacao = "INSERT INTO `iasdfonseca`.`pontuacao` (
`id_pontuacao`,
`classe`, 
`atividade`, 
`pontuacao`, 
`observacao`,
`data`) 
VALUES (
'', 
'$classe', 
'$atividade', 
'$pontuacao',
'$observacao', 
'$data')";
$resultado_pontuacao = mysqli_query($conn, $result_pontuacao);

	header("Location: ../cad_pontuacao.php");
