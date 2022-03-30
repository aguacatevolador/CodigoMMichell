<?PHP 
	include"../config/conect.php";

	$query_ultimo = mysqli_query($conection,"SELECT codigo_articulo as ultimo_codigo FROM articulos ORDER BY codigo_articulo DESC LIMIT 1;");
	$result_registro = mysqli_fetch_array($query_ultimo);
	$ultimo_codigo = $result_registro['ultimo_codigo'];
	$ultimo_codigo = $ultimo_codigo+1;
	$tt=0;


	//$IDUsuario=($_POST[SESSION]);


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
			
			//	$query_movimientos = mysqli_query($conection,"INSERT INTO `movimientos`( `usuario`, `descripcion`,`descripcion_1`, `fecha`) VALUES ('$SESSION','Nuevo Producto', 
			//	`$codigo`,now())");

				if($query_insert){
					$alert='<p class="msg_save">El Producto se Agrego Correctamente</p>';
					$tt=1;
				}else{
					$alert='<p class="msg_error">* Error al Agregar el Producto</p>';
				}
				
			}
		}
	}
	if($tt==1){
					sleep(1);
					header('location: ./nuevo_producto.php');
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
				<input type="number" name="codigo" id="codigo" placeholder="<?php echo $ultimo_codigo; ?>" value="<?php echo $ultimo_codigo; ?>">
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