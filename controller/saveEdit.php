<?php
  include('./connection.php');

  if(isset($_GET['update'])) 
  {
    $id = $_GET['id'];
    $disciplina = $_GET['disciplina'];
    $id_turma = $_GET['id_turma'];
    $id_aluno = $_GET['id_aluno'];
    $nota = $_GET['nota'];

    $sqlUpdate = "UPDATE notas 
    SET ID_turma='$id_turma', nota='$nota' 
    WHERE ID_aluno='$id_aluno' AND ID_disciplina=$disciplina";
    
    $result = $conn->query($sqlUpdate);
  }
  header('Location: processar_filtro.php');
?>