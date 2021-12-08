<?php 
	session_start();
	if (isset($_SESSION['nombre'])) {
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<center>
		<form method="POST" action="loginProceso.php" class="login"> 
			<img src="img/logo.jpg" alt="" class="pequeña">
			<h2>INGRESAR</h2>
			<label>Usuario:</label>
			<input type="text" name="txtUsu"placeholder="Usuario"class="usuario1">
			<br>
			<label>Password:</label>
			<input type="password" name="txtPass"placeholder="Password">
			<br>
			<br>
			<input type="submit" value="Iniciar sesión">
		</form>
	</center>
</body>
</html>
