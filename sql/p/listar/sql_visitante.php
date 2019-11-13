<?php
  //Nome e (Número da Classe + Login Professor)
	
	$resultado=mysqli_query($conn, "SELECT * FROM visitantes order by id_visitantes DESC");
	$linhas=mysqli_num_rows($resultado);