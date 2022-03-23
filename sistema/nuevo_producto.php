<?PHP 
	include"../config/conect.php";
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

			$query = mysqli_query($conection,"SELECT * FROM articulos WHERE codigo_articulo = $codigo");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">* El Codigo del Producto ya se Encuentra Registrado</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO articulos(codigo_articulo,nombre,precio,descripcion,stok)
				VALUES('$codigo','$nombre','$precio','$descripcion','$stok')");
				if($query_insert){
					$alert='<p class="msg_save">El Producto se Agrego Correctamente</p>';
				}else{
					$alert='<p class="msg_error">* Error al Agregar el Producto</p>';
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
	<title>Nuevo Producto</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_producto">
			<h1>Registro de Nuevo Producto</h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<label for="codigo">Codigo</label>
				<input type="number" name="codigo" id="codigo" placeholder="10000023">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre del Producto">
				<label for="precio">Precio</label>
				<input type="number" name="precio" id="Precio" placeholder="$ 500.00">
				<label for="descripcion">Descripcion del Producto</label>
				<input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del Producto">
				<label for="stok">Stock del Producto</label>
				<input type="number" name="stok" id="stok" placeholder="20"/>
				<input type="submit" value="Agregar Producto" class="btn_save_product">
			</form>

		</div>	
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>