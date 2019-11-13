<?php

	$resultado=mysqli_query($conn, "SELECT * FROM usuarios WHERE classe = $numerologin ORDER BY nome");
	$linhas=mysqli_num_rows($resultado);

	$resultado_qtd_alunos=mysqli_query($conn, "SELECT * FROM usuarios WHERE classe = $numerologin");