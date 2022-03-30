<?PHP 
	include"../config/conect.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['usuario']))
		{
			$alert='<p class="msg_error">* Todos los Campos son Obligatorios</p>';
		}else{

			$nombre = $_POST['nombre'];
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];

			$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE NOMBRE = '$nombre' AND USUARIO ='$usuario'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">* El Cliente ya se Encuentra Registrado</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO usuarios(USUARIO,PASS,NOMBRE,ESTATUS)
				VALUES('$nombre','$password','$nombre',1)");
				if($query_insert){
					$alert='<p class="msg_save">El Nueno Usuario se Agrego Correctamente</p>';
				}else{
					$alert='<p class="msg_error">* Error al Agregar el Nuevo Usuario</p>';
				}
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Nuevo Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_registro">
			<h1>Registro de Nuevo Usuario</h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
				<label for="usuario">Nombre de Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Nombre de Usuario">
				<label for="password">Contraseña</label>
				<input type="password" name="password" id="password" placeholder="Password">

				<input type="submit" value="Agregar Nuevo Usuario" class="btn_save">

			</form>

		</div>	
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>