<?PHP
include "../config/conect.php";
if(!empty($_POST)){
	$idcliente = $_POST['idcliente'];
//	$query_delete = mysqli_query($conection,"DELETE * FROM clientes WHERE ID = $idcliente");
	$query_delete = mysqli_query($conection,"UPDATE clientes SET estatus = 0 WHERE ID = $idcliente");


	if ($query_delete) {
		header('location: lista_clientes.php');
	}
		echo "Error al Eliminar";
}


if(empty($_REQUEST['id']) || $_REQUEST['id'] == 1){
	header('location:lista_clientes.php');
}else


	$idcliente = $_REQUEST['id'];

	$query = mysqli_query($conection,"SELECT * FROM clientes WHERE ID = $idcliente");

	$result = mysqli_num_rows($query);

	if($result > 0){
		while($data = mysqli_fetch_array($query)){
			$id_cliente	 		= $data['ID'];
			$nombre_cliente  	= $data['nombre'];
			$apellidos_cliente  = $data['apellidos'];
			$direccion_cliente  = $data['direccion'];
			$numero_dir 		= $data['no'];
			$colonia_cliente    = $data['colonia'];
			$telefono_cliente 	= $data['telefono'];
		}
	}else{
		header('location:lista_clientes.php');
	}


?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Cliente</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h1>Eliminar Cliente</h1>
			<h2>Está Seguro de Eliminar el Registro del Cliente</h2>
			<p>Nombre: <span><?php echo $nombre_cliente ?></span></p>
			<p>Apellidos: <span><?php echo $apellidos_cliente ?></span></p>
			<p>Direccion: <span><?php echo $direccion_cliente ?></span></p>
			<p>Colonia: <span><?php echo $colonia_cliente ?></span></p>
			<p>Telefono: <span><?php echo $telefono_cliente ?></span></p>
			<p>No. Ext: <span><?php echo $numero_dir ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="idcliente" value=" <?php echo $id_cliente; ?>">
				<a href="lista_clientes.php" class="btn_cancel">Cancelar</a>
				<input type="submit" name="Aceptar" class="btn_acept" />
			</form>
		</div>


	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>