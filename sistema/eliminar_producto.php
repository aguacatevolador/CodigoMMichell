<?PHP
include "config/conect.php";
if(!empty($_POST)){
	$codigo = $_POST['codigo'];
	$query_delete = mysqli_query($conection,"UPDATE articulos SET estatus = 0 WHERE codigo_articulo = $codigo");


	if ($query_delete) {
		header('location: lista_productos.php');
	}
		echo "Error al Eliminar";
}


	$codigo = $_REQUEST['id'];
if(empty($codigo)){
		header('location: lista_productos.php');
}else{
	$query = mysqli_query($conection,"SELECT * FROM articulos WHERE codigo_articulo = $codigo");

	$result = mysqli_num_rows($query);

	if($result > 0){
		while($data = mysqli_fetch_array($query)){
			$codigo	 		= $data['codigo_articulo'];
			$nombre 	  	= $data['nombre'];
			$precio			= $data['precio'];
			$descripcion    = $data['descripcion'];
			$stok 			= $data['stok'];
		}
	}else{
		header('location:lista_productos.php');
	}
}


?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Producto</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h1>Eliminar Producto</h1>
			<h2>¿Está Seguro de Eliminar el Registro del Siguiente Producto?</h2>
			<p>Codigo: <span><?php echo $codigo ?></span></p>
			<p>Nombre: <span><?php echo $nombre ?></span></p>
			<p>Precio: <span><?php echo $precio ?></span></p>
			<p>Descripcion: <span><?php echo $descripcion ?></span></p>
			<p>Stock: <span><?php echo $stok ?></span></p>

			<form method="post" action="">
				<input type="hidden" name="codigo" value=" <?php echo $codigo; ?>">
				<a href="lista_productos.php" class="btn_cancel">Cancelar</a>
				<input type="submit" name="Aceptar" class="btn_acept" />
			</form>
		</div>


	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>