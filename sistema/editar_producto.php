<?php 

include "config/conect.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['codigo']) || empty($_POST['nombre']) || empty($_POST['precio']) || empty($_POST['descripcion']) || empty($_POST['stok']))
		{
			$alert='<p class="msg_error">* Todos los Campos son Obligatorios</p>';
		}else{
			$codigo = $_POST['codigo'];
			$nombre = $_POST['nombre'];
			$precio = $_POST['precio'];
			$descripcion = $_POST['descripcion'];
			$stok = $_POST['stok'];

			$query = mysqli_query($conection,"SELECT * FROM articulos WHERE codigo_articulo != $codigo");
			$result = mysqli_fetch_array($query);

			if($result == 0){
				$alert='<p class="msg_error">* El Producto NO pudo ser editado</p>';
			}else{
				
				$sql_update = mysqli_query($conection,"UPDATE articulos SET codigo_articulo = '$codigo', nombre = '$nombre', precio	= '$precio', descripcion = '$descripcion', stok = '$stok' WHERE codigo_articulo = $codigo");

				if($sql_update){
					$alert='<p class="msg_save">El Producto se Actualizo Correctamente</p>';
	
				}else{
					$alert='<p class="msg_error">* Error al Actualizar al Producto</p>';
				}
			}
		}
	}


//Mostrar Datos
if(empty($_GET['id']))
{
	header('location: lista_productos.php');
}
$id_codigo = $_GET['id'];

$sql = mysqli_query($conection,"SELECT * FROM articulos WHERE codigo_articulo = $id_codigo");
	$resultsql = mysqli_num_rows($sql);
	if($resultsql == 0)	{
		header('location: lista_productos.php');
	}else
	{
		while($data = mysqli_fetch_array($sql)){
			$codigo	 		= $data['codigo_articulo'];
			$nombre 	  	= $data['nombre'];
			$precio			= $data['precio'];
			$descripcion    = $data['descripcion'];
			$stok 			= $data['stok'];
		}
	}

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Editar Producto</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_producto">
			<h1>Actualizar Productos </h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<label for="codigo">Codigo</label>
				<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
				<input type="number" name="" id="" placeholder="10000023" value="<?php echo $codigo; ?>" disabled/>
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre del Producto"value="<?php echo $nombre; ?>"/>
				<label for="precio">Precio</label>
				<input type="number" name="precio" id="precio" placeholder="$ 500.00"value="<?php echo $precio; ?>"/>
				<label for="descripcion">Descripcion del Producto</label>
				<input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del Producto"value="<?php echo $descripcion; ?>"/>
				<label for="stok">Stock del Producto</label>
				<input type="number" name="stok" id="stok" placeholder="20"value="<?php echo $stok; ?>"/>
				<input type="submit" value="Actualizar Producto" class="btn_save_product">
			</form>


		</div>	
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>