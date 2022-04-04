<?PHP
include "../config/conect.php";
if(!empty($_POST)){
	$ID = $_POST['ID'];
//	$query_delete = mysqli_query($conection,"DELETE * FROM clientes WHERE ID = $idcliente");
	$query_delete = mysqli_query($conection,"UPDATE usuarios SET ESTATUS = 0 WHERE ID = $ID");


	if ($query_delete) {
		header('location: lista_usuarios.php');
	}
		echo "Error al Eliminar";
}


if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1){
	header('location:lista_usuarios.php');
}else


	$ID = $_REQUEST['id'];

	$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE ID = $ID");

	$result = mysqli_num_rows($query);

	if($result > 0){
		while($data = mysqli_fetch_array($query)){
			$ID	 		= $data['ID'];
			$nombre  	= $data['NOMBRE'];
			$usuario  	= $data['USUARIO'];
		
		}
	}else{
		header('location:lista_usuarios.php');
	}


?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Usuario</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h1>Eliminar Usuario</h1>
			<h2>Está Seguro de Eliminar el Registro del Usuario</h2>
			<p>Nombre: <span><?php echo $nombre ?></span></p>
			<p>Usuario: <span><?php echo $usuario ?></span></p>
			

			<form method="post" action="">
				<input type="hidden" name="ID" value=" <?php echo $ID; ?>">
				<a href="lista_clientes.php" class="btn_cancel">Cancelar</a>
				<input type="submit" name="Aceptar" class="btn_acept" />
			</form>
			<hr>
		</div>


	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>