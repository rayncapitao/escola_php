<?php
include('controller/connection.php');

if (isset($_POST['username']) || isset($_POST['password'])) {
	if(strlen($_POST['username']) == 0) {
		echo "Preencha seu e-mail";
	} else if(strlen($_POST['password']) == 0) {
		echo "Preencha sua senha";
	} else {
		/* Prevenção de SQL Injection */
		$username = $mysqli -> real_escape_string($_POST['username']);
		$password = $mysqli -> real_escape_string($_POST['password']);
		$password = md5($password); // 123

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

			$mysqli -> close();

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
    <link rel="stylesheet" href="./css/login.css">
		<style>
			<?php include('css/login.css'); ?>
		</style>
		<title>Login</title>
	</head>
	<body>
		<nav>
			<div class="center">
				<h1 class="logoName">Raízes do Conhecimento</h1>
			</div>
		</nav>
		<div class="container">
			<h2>Login</h2>
			<form action="" method="POST">
				<div>
					<label for="username">Usuário:</label> <br>
					<input type="text" id="username" name="username" /><br />
				</div>
				<div class="space">
					<label for="password">Senha:</label> <br>
					<input type="password" id="password" name="password" /><br />
				</div>
				<button type="submit">Entrar</button>
			</form>
		</div>
	</body>
</html>
