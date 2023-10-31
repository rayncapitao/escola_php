<?php
/* Inicia novamente a sessão */
if (!isset($_SESSION)) {
	session_start();
}

/* Previne o usúario conseguir acessar a página pela URL sem estar logado */
if (!isset($_SESSION['user'])) {
  die("Você não pode acessar esta página porque não está logado. <br /><p><a href=\"index.php\">Entrar</a></p>");
}
?>