<?php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "escola_php";

$conn = new mysqli($SERVIDOR, $USUARIO, $SENHA, $BASE);

if($conn -> error) {
  die("Falha ao conectar no banco de dados: " . $conn -> error);
}
?>