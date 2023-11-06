<?php
include('./connection.php');

// Obter os dados do formulário
$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$telefone_responsavel = $_POST['telefone_responsavel'];
$id_turma = $_POST['id_turma'];

$nota_matematica = $_POST['nota_matematica'];
$nota_portugues = $_POST['nota_portugues'];
$nota_historia = $_POST['nota_historia'];
$nota_geografia = $_POST['nota_geografia'];
$nota_ciencias = $_POST['nota_ciencias'];
$nota_edFisica = $_POST['nota_edFisica'];

// Adicionar Aluno
$sql_aluno = "INSERT INTO aluno (nome, data_nascimento, telefone_responsavel)
              VALUES ('$nome', '$data_nascimento', '$telefone_responsavel')";

if ($conn->query($sql_aluno) !== TRUE) {
    echo "Erro ao adicionar aluno: " . $conn->error;
}

// Obter o ID do aluno inserido
$id_aluno = $conn->insert_id;

// Adicionar Matrícula
$sql_matricula = "INSERT INTO matricula (ID_turma, ID_aluno)
                  VALUES ('$id_turma', '$id_aluno')";

if ($conn->query($sql_matricula) !== TRUE) {
    echo "Erro ao adicionar matrícula: " . $conn->error;
}

// Adicionar Nota
$sql_nota = "INSERT INTO notas (ID_disciplina, ID_turma, ID_aluno, nota)
             VALUES
             (1, '$id_turma', '$id_aluno', '$nota_matematica'),
             (2, '$id_turma', '$id_aluno', '$nota_portugues'),
             (3, '$id_turma', '$id_aluno', '$nota_historia'),
             (4, '$id_turma', '$id_aluno', '$nota_geografia'),
             (5, '$id_turma', '$id_aluno', '$nota_ciencias'),
             (6, '$id_turma', '$id_aluno', '$nota_edFisica')";

if ($conn->query($sql_nota) !== TRUE) {
    echo "Erro ao adicionar nota: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
