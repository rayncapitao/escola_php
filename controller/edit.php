<?php

if(!empty($_GET['id'])) {
    include('./connection.php');

    $id = $_GET['id'];
    $disciplina = $_GET['disciplina'];

    $sql_code = "SELECT * FROM notas WHERE ID_aluno=$id AND ID_disciplina=$disciplina";
    $result = $conn->query($sql_code);

    if ($result->num_rows > 0) 
    {
      while ($user_data = mysqli_fetch_assoc($result)) 
      {
        $id_disciplina = $user_data['ID_disciplina'];
        $id_turma = $user_data['ID_turma'];
        $id_aluno = $user_data['ID_aluno'];
        $nota = $user_data['nota'];
      }
    } 
    else 
    {
      header("Location: processar_filtro.php");
    }
  }
  else {
    header("Location: processar_filtro.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Alunos</title>
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

            /* table {
                margin: 2rem;
                width: 90%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 0.25rem;
                text-align: center;
            } */
		</style>
</head>
<body>
  <form action="saveEdit.php" method="GET">
    <div>
        <p>ID_aluno: <?php echo $id_aluno ?></p>
        <p>ID_disciplina: <?php echo $disciplina ?></p>
    </div>
        <input type="hidden" name="id_aluno" id="id_aluno" value="<?php echo $id_aluno ?>">
        <input type="hidden" name="disciplina" id="disciplina" value="<?php echo $disciplina ?>">
    <br>
    <div>
        <label for="id_turma">Turma</label>
        <input type="number" name="id_turma" id="id_turma" value="<?php echo $id_turma ?>">
    </div>
    <div>
        <label for="nota">Nota</label>
        <input type="number" name="nota" id="nota" value="<?php echo $nota ?>">
    </div>
    <br>
    <button type="submit" name="update" id="update">Enviar</button>
  </form>
</body>
</html>