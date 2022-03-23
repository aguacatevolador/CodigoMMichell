<?php
	
	$alert = '';
	session_start();
	if(!empty($_SESSION['active']))
	{
		header('location: sistema/');
	}else
{


	if (!empty($_POST))
	{
		 if(empty($_POST['usuario']) || empty($_POST['clave']))
		 {
		 	$alert = 'Ingrese Usuario y/o Contraseña';
		 }else{

		 	require_once "config/conect.php";
		 	
		 	$user = mysqli_real_escape_string($conection,$_POST['usuario']);
		 	$pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

		 	$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE USUARIO = '$user' AND PASS = '$pass'");
		 	$result = mysqli_num_rows($query);

		 	if($result > 0)
		 	{
		 		$data = mysqli_fetch_array($query);
		 		//session_start();
		 		$_SESSION['active'] = true;
		 		$_SESSION['IdUser'] = $data['ID'];
		 		$_SESSION['Nombre'] = $data['NOMBRE'];
		 		$_SESSION['hora']=time();

		 		header('location: sistema/');
		 	}else{
		 		$alert = 'Usuario y/o Contraseña Incorretos';
		 		session_destroy();
		 	}

		 }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Sistema de Administracion de Abonos</title>
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
</head>
<body>
	<section id="container">
		<form action="" method="post">
			<h3>Iniciar Sesión</h3>
			<img src="img/login.png" alt="Login">

			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<div class="alert"><?php echo isset($alert)? $alert : ''; ?></div>
			<input type="submit" value="INGRESAR">
		</form>

	</section>

</body>
</html>