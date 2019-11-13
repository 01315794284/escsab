<?php

$resultado=mysqli_query($conn, "SELECT * FROM apontamento where classe = $numerologin ORDER BY id_apontamento DESC");
$linhas=mysqli_num_rows($resultado);