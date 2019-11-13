<?php
	$servidor = "localhost";//server158.hostinger.com.br ou 185.201.11.133
	$usuario = "root";
	$senha = "";
	$dbname = "iasdfonseca";

	/*
	$servidor = "mysql.iasdfonseca.org.br";//server158.hostinger.com.br ou 185.201.11.133
	$usuario = "iasdfonseca";
	$senha = "iasdfonseca2016";
	$dbname = "iasdfonseca";
	*/
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);