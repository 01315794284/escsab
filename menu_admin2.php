<?php
  $nomeprofessor = $_SESSION['usuarioNome'];
  $numerologin = $_SESSION['usuarioLogin'];
    include_once("conexao.php");
  
$dia = date("d/m/Y");

  $conn_apontamento = mysqli_connect($servidor, $usuario, $senha, $dbname);

$sql_nome_associado = mysqli_query($conn_apontamento , "SELECT *, (professorassociado) nomeprofessorassociado FROM classes where numerodaclasse = $numerologin");
    while ($dados_nome_associado = mysqli_fetch_array($sql_nome_associado)){
      extract($dados_nome_associado);
    } 

?>
<table class="table table-dark">
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
  	
    <tr>
      <th></th>
      <td><a href="p_cad_check.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Apontamento</button></a></td>
      <td><a href="p_listar_aluno.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Alunos</button></a></td>
    </tr>
    <tr>
      <th></th>
      <td><a href="p_cad_usuario_visitante.php"><button type="button" class="btn btn-success btn-lg btn-block">Adicionar Visitante</button></a></td>
      <td><a href="p_listar_visitante.php"><button type="button" class="btn btn-warning btn-lg btn-block">Listar Visitante</button></a></td>
    </tr>
    <tr>
      <th></th>
      <td><a href="p_pesq_termometro_classe.php"><button type="button" class="btn btn-primary btn-lg btn-block">Termometro da Classe</button></a></td>
      <td><a href="sair.php"><button type="button" class="btn btn-danger btn-lg btn-block">Sair</button></a></td>
    </tr>
  </tbody>
</table>
					<center><font color="#39a35b"> <?php echo "$dia - $professor e $nomeprofessorassociado";?></font></center>
  	<a href="p_administrativo_professor.php"><button type="button" class="btn btn-dark btn-lg btn-block">Inicio</button></a>

			</div>
			
		</nav>
		