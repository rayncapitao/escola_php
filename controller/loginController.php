<?php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "escola_php";

$mysqli = new mysqli($SERVIDOR, $USUARIO, $SENHA, $BASE);

if($mysqli -> error) {
  die("Falha ao conectar no banco de dados: " . $mysqli -> error);
}
?>