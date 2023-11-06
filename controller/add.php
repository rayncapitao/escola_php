<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Aluno</title>
</head>
<body>
  <h2>Adicionar aluno</h2>
  <form action="saveAdd.php" method="post">
    Nome: <input type="text" name="nome"><br>
    Data de Nascimento: <input type="date" name="data_nascimento"><br>
    Telefone do Responsável: <input type="text" name="telefone_responsavel"><br>
    ID da Turma: <input type="text" name="id_turma">
    <br><br>
    Nota Matemática: <input type="text" name="nota_matematica"><br>
    Nota Português: <input type="text" name="nota_portugues"><br>
    Nota História: <input type="text" name="nota_historia"><br>
    Nota Geografia: <input type="text" name="nota_geografia"><br>
    Nota Ciências: <input type="text" name="nota_ciencias"><br>
    Nota Educação Física: <input type="text" name="nota_edFisica"><br>
    <input type="submit" value="Adicionar">
  </form>
</body>
</html>