<?php 
if(!empty($_GET['id'])) {
    include('./connection.php');

    $id = $_GET['id'];
    $disciplina = $_GET['disciplina'];

    $sql_code = "SELECT * FROM notas WHERE ID_aluno=$id AND ID_disciplina=$disciplina";
    $result = $conn->query($sql_code);

    if ($result->num_rows > 0) 
    {
      $sql_delete = "DELETE FROM notas WHERE ID_aluno=$id";
      $result_delete = $conn->query($sql_delete);
    }
  }
?>