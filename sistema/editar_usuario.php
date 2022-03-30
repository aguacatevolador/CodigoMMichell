<?php 

include "config/conect.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['password']) || empty($_POST['usuario']) || empty($_POST['nombre']))
		{
			$alert='<p class="msg_error">* Todos los Campos son Obligatorios</p>';
		}else{
			$id = $_POST['ID'];
			$nombre = $_POST['nombre'];
			$password = $_POST['password'];
			$usuario = $_POST['usuario'];

			$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE ID != $id");
			$result = mysqli_fetch_array($query);

			if($result == 0){
				$alert='<p class="msg_error">* El Usuario NO pudo ser editado</p>';
			}else{
				
				$sql_update = mysqli_query($conection,"UPDATE usuarios SET USUARIO = '$usuario', PASS = '$password', NOMBRE	= '$nombre' WHERE ID = $id");

				if($sql_update){
					$alert='<p class="msg_save">El Usuario se Actualizo Correctamente</p>';
					/*if(!empty($sql_update)){
					sleep(5);
				}
					header('location: lista_clientes.php');*/
				}else{
					$alert='<p class="msg_error">* Error al Actualizar al Usuario</p>';
				}
			}
		}
	}


//Mostrar Datos
if(empty($_GET['id']))
{
	//header('location: lista_clientes.php');
}
$id = $_GET['id'];

$sql = mysqli_query($conection,"SELECT * FROM usuarios WHERE ID = $id");
	$resultsql = mysqli_num_rows($sql);
	if($resultsql == 0)	{
		header('location: lista_clientes.php');
	}else
	{
		while($data = mysqli_fetch_array($sql)){
			$ID 		 = $data['ID'];
			$Nombre  	 = $data['NOMBRE'];
			$Usuario	 = $data['USUARIO'];
		
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Editar Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_registro">
			<h1>Actualizar Usuario</h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<input type="hidden" name="ID" value="<?php echo $ID; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="" value="<?php echo $Nombre; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="" value="<?php echo $Usuario; ?>">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="">
				<input type="submit" value="Actualizar Usuario" class="btn_save">
			
			</form>

		</div>	
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>