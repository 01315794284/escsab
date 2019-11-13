<?php

	$resultado_classes=mysqli_query($conn, "SELECT * FROM classes where numerodaclasse = $numerologin");
	$linhas_classes=mysqli_num_rows($resultado_classes);