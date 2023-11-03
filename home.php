<?php
include('./controller/protect.php');
include('controller/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/home.css">
		<title>Home</title>
		<style>
			<?php include('css/home.css'); ?>
		</style>
	</head>
	<body>
		<!-- Navbar -->
		<nav>
			<div class="center">
				<h1 class="logoName">Raízes do Conhecimento</h1>
			</div>
		</nav>
		<!-- Container tabela -->
		<div class="container">
			<div class="title">
				<p class="title-text">Buscar</p>
			</div>
			<!-- Div select -->
		<div>
			<form method="post" action="./controller/processar_filtro.php">
				<div class="divTurma">
					<label for="turma">Turma:</label>
					<select id="turma" name="turma" onchange="atualizarTabela()">
						<option value="todas">Todas</option>
						<!-- Pega os nomes das turmas dinamicamente no bd -->
						<?php
							$conn = new mysqli("$SERVIDOR", "$USUARIO", "$SENHA", "$BASE");
	
							// Checar se a conexão foi bem sucedida
							if ($conn->connect_error) {
								die("Conexão falhou: " . $conn->connect_error);
							}
	
							// Consulta SQL para obter as turmas
							$sql = "SELECT * FROM turma";
							$result = $conn->query($sql);
	
							// Exibir as opções de turma
							while ($row = $result->fetch_assoc()) {
								echo "<option value='".$row['ID_turma']."'>".$row['ano']."</option>";
							}
	
							$conn->close();
						?>
					</select>
				</div>
				
				<div class="divDisciplina">
					<label for="disciplina">Disciplina:</label>
					<select id="disciplina" name="disciplina" onchange="atualizarTabela()">
						<option value="todas">Todas</option>
						<!-- Pega os nomes das disciplina dinamicamente no bd -->
						<?php
							$conn = new mysqli("$SERVIDOR", "$USUARIO", "$SENHA", "$BASE");
	
							// Checar se a conexão foi bem sucedida
							if ($conn->connect_error) {
								die("Conexão falhou: " . $conn->connect_error);
							}
	
							// Consulta SQL para obter as disciplinas
							$sql = "SELECT * FROM disciplina";
							$result = $conn->query($sql);
	
							// Exibir as opções de disciplina
							while ($row = $result->fetch_assoc()) {
								echo "<option value='".$row['ID_disciplina']."'>".$row['nome']."</option>";
							}
	
							$conn->close();
						?>
					</select>
				</div>
    		<input type="submit" value="Filtrar">
			</form>
			<a href="./controller/logout.php">
				<div class="exit">
					Sair
				</div>
			</a>
		</div>
		</div>
	</body>
</html>