<?php
session_start();
include_once("../conexao.php");
echo "$id_usuarios";
$id_usuarios 				=$_GET["id_usuarios"];

$query = "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuarios` = $id_usuarios";
$resultado = mysql_query($query);
$linhas = mysql_affected_rows();
header("Location: ../listar_aluno.php");