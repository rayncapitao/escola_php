<?php
include('controller/loginController.php');

if (isset($_POST['username']) || isset($_POST['password'])) {
	if(strlen($_POST['username']) == 0) {
		echo "Preencha seu e-mail";
	} else if(strlen($_POST['password']) == 0) {
		echo "Preencha sua senha";
	} else {
		/* Prevenção de SQL Injection */
		$username = $mysqli -> real_escape_string($_POST['username']);
		$password = $mysqli -> real_escape_string($_POST['password']);

		/* Autenticação */
		$sql_code = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$sql_query = $mysqli -> query($sql_code) or die("Falha na execução do código SQL: " . $mysqli -> error);

		$amount = $sql_query -> num_rows;

		if ($amount == 1) {
			$user = $sql_query -> fetch_assoc();

			/* Inicia a sessão do usuário */
			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['user'] = $user['ID_user'];
			header("Location: ./home.php");
		} else {
			echo "Falha ao logar! Usuário ou senha incorretos";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/login.css">
		<title>Login</title>
	</head>
	<body>
		<nav>
			<div>
				<h1 class="logoName">Raízes do Conhecimento</h1>
			</div>
		</nav>
		<h2>Login</h2>
		<form action="" method="POST">
			<div>
				<label for="username">Usuário:</label>
				<input type="text" id="username" name="username" /><br />
			</div>
			<div>
				<label for="password">Senha:</label>
				<input type="password" id="password" name="password" /><br />
			</div>
			<button type="submit">Entrar</button>
		</form>
	</body>
</html>
