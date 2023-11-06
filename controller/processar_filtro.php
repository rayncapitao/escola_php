<?php
include('protect.php');
include('connection.php');
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
			@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap');

            * {
                box-sizing: border-box;
                font-size: 16px;
                margin: 0;
                padding: 0;
            }

            body {
                background-color: #f2f2f2;
                font-family: 'Rubik', sans-serif;
            }

            nav {
                background-color: #199ebb;
                height: 100px;
                width: 100%;
            }

            .center {
                display: flex;
                justify-content: center;
            }

            .logoName {
                font-size: 3rem;
                line-height: 50px;
                color: #fbfbfb;
                margin: 25px;
            }

            .container {
                background-color: #fbfbfb;
                width: 1180px;
                /* height: 600px; */
                margin: 0 auto;
                margin-top: 80px;
                border-radius: 1.25rem;
                border: solid 3px #199ebb;
            }

            .prof {
                margin-top: 2rem;
                margin-left: 2rem;
                margin-bottom: 2rem;
            }

            .prof-text {
                font-size: 2rem;
                font-weight: 600;
                color: #222;
            }

            table {
                margin: 2rem;
                width: 90%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 0.25rem;
                text-align: center;
            }

            .add {
                background-color: #30b4d1;
                width: 40%;
                margin: 0 2rem;
                margin-top: 2rem;
                margin-bottom: 2rem;
                padding: 1rem;
                border-radius: 0.5rem;
                border: solid 2px #088eab;
                text-align: center;
                font-size: 1.5rem;
                text-decoration: none;
                font-weight: 600;
                color: #f2f2f2;
            }

            a {
	            text-decoration: none;
            }
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
			<div class="prof">
				<p class="prof-text">Dados: </p>
			</div>
			<!-- Tabela -->
			<table id="tabela">
				<tr>
					<th>ID_aluno</th>
					<th>Aluno</th>
					<th>Turma</th>
					<th>Disciplina</th>
					<th>Nota</th>
					<th>...</th>
				</tr>
			<!-- Completa a tabela com os dados -->
			<?php
                $SERVIDOR = "localhost";
                $USUARIO = "root";
                $SENHA = "";
                $BASE = "escola_php";
                // Conectar ao banco de dados
                $conn = new mysqli($SERVIDOR, $USUARIO, $SENHA, $BASE);

                // Checar se a conexão foi bem sucedida
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                $turmaSelecionada = $_POST['turma'];
                $disciplinaSelecionada = $_POST['disciplina'];

                // Consulta SQL para obter os dados filtrados
                $sql = "SELECT aluno.ID_aluno, aluno.nome, turma.ano, disciplina.nome AS nome_disciplina, notas.nota 
                        FROM aluno 
                        INNER JOIN matricula ON aluno.ID_aluno = matricula.ID_aluno 
                        INNER JOIN turma ON matricula.ID_turma = turma.ID_turma 
                        INNER JOIN notas ON aluno.ID_aluno = notas.ID_aluno 
                        INNER JOIN disciplina ON notas.ID_disciplina = disciplina.ID_disciplina";

                // Adicionar cláusulas WHERE conforme as seleções do usuário
                if ($turmaSelecionada != 'todas') {
                    $sql .= " WHERE turma.ID_turma = '$turmaSelecionada'";
                }

                if ($disciplinaSelecionada != 'todas') {
                    if ($turmaSelecionada != 'todas') {
                        $sql .= " AND disciplina.ID_disciplina = '$disciplinaSelecionada'";
                    } else {
                        $sql .= " WHERE disciplina.ID_disciplina = '$disciplinaSelecionada'";
                    }
                }

                $result = $conn->query($sql);

                // Exibir os resultados na tabela
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['ID_aluno'] . "</td>
                                <td>" . $row['nome'] . "</td>
                                <td>" . $row['ano'] . "</td>
                                <td>" . $row['nome_disciplina'] . "</td>
                                <td>" . $row['nota'] . "</td>
                                <td>
                                  <a class='btn-edit' href='./edit.php?id=$row[ID_aluno]&disciplina=$disciplinaSelecionada'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                    </svg>
                                  </a>
                                  <a class='btn-del' href='./delete.php?id=$row[ID_aluno]&disciplina=$disciplinaSelecionada'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                  </a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum resultado encontrado</td></tr>";
                }

                // Fechar a conexão com o banco de dados
                $conn->close();
			?>
			</table>
            <a href="add.php">
              <div class="add">
                Adicionar aluno
              </div>
            </a>
		</div>
	</body>
</html>

