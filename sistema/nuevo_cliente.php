<?PHP 
	include"../config/conect.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['direccion']) || empty($_POST['numero_dir']) || empty($_POST['colonia']) || empty($_POST['telefono']))
		{
			$alert='<p class="msg_error">* Todos los Campos son Obligatorios</p>';
		}else{

			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$direccion = $_POST['direccion'];
			$numero_dir = $_POST['numero_dir'];
			$colonia = $_POST['colonia'];
			$telefono = $_POST['telefono'];

			$query = mysqli_query($conection,"SELECT * FROM clientes WHERE nombre = '$nombre' AND apellidos ='$apellidos'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">* El Cliente ya se Encuentra Registrado</p>';
			}else{
				$query_insert = mysqli_query($conection,"INSERT INTO clientes(nombre,apellidos,direccion,no,colonia,telefono)
				VALUES('$nombre','$apellidos','$direccion','$numero_dir','$colonia','$telefono')");
				if($query_insert){
					$alert='<p class="msg_save">El Cliente se Agrego Correctamente</p>';
				}else{
					$alert='<p class="msg_error">* Error al Agregar el Cliente</p>';
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
	<title>Registro Clientes</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_registro">
			<h1>Registro de Cliente</h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos Completos">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Calle">
				<label for="numero_dir">Numero Ext.</label>
				<input type="number" name="numero_dir" id="numero_dir" placeholder="Numero Exterior">
				<label for="colonia">Colonia</label>
				<input type="text" name="colonia" id="colonia" placeholder="Colonia del Cliente">
				<label for="telefono">Telefono</label>
				<input type="number" name="telefono" id="telefono" placeholder="Ingrese Telefono del Cliente"/>
				<input type="submit" value="Agregar Cliente" class="btn_save">
				<!-- Esto va ha servir para seleccionar a el cliente al momento de realizar la venta :)
				<?PHP 
					$query_clientes = mysqli_query($conection,"SELECT * FROM clientes");
					$result_clientes = mysqli_num_rows($query_clientes);
				?>


				<select name="cliente" id="cliente">
					<?PHP
						if($result_clientes > 0)
						{
							while ($clientes =  mysqli_fetch_array($query_clientes)){
					?>
							
								<option value="<?php echo $clientes["apellidos"];?>">   <?php echo $clientes["nombre"]; ?></option>
					<?php			
						}}
					?>
				</select>
				-->
			</form>

		</div>	
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>