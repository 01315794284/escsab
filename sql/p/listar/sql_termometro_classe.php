<?php

	//Conexão para VRF a quantidade
	$resultado_estudo=mysqli_query($conn, "SELECT * FROM apontamento WHERE dataapontamento=$dataapontamento");
	$linhas_estudo=mysqli_num_rows($resultado_estudo);


	//Consulta Oferta das Classes
	$resultado_oferta_classe = mysqli_query($conn, "SELECT alvodeoferta FROM classes");
	$linhas_oferta_classe = mysqli_num_rows($resultado_oferta_classe);	