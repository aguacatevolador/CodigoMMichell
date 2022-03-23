<?php 

include "config/conect.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['direccion']) || empty($_POST['numero_dir']) || empty($_POST['colonia']) || empty($_POST['telefono']))
		{
			$alert='<p class="msg_error">* Todos los Campos son Obligatorios</p>';
		}else{
			$idcliente = $_POST['idcliente'];
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$direccion = $_POST['direccion'];
			$numero_dir = $_POST['numero_dir'];
			$colonia = $_POST['colonia'];
			$telefono = $_POST['telefono'];

			$query = mysqli_query($conection,"SELECT * FROM clientes WHERE ID != $idcliente");
			$result = mysqli_fetch_array($query);

			if($result == 0){
				$alert='<p class="msg_error">* El Cliente NO pudo ser editado</p>';
			}else{
				
				$sql_update = mysqli_query($conection,"UPDATE clientes SET nombre = '$nombre', apellidos = '$apellidos', direccion	= '$direccion', no = '$numero_dir', colonia = '$colonia', telefono = '$telefono' WHERE ID = $idcliente");

				if($sql_update){
					$alert='<p class="msg_save">El Cliente se Actualizo Correctamente</p>';
					/*if(!empty($sql_update)){
					sleep(5);
				}
					header('location: lista_clientes.php');*/
				}else{
					$alert='<p class="msg_error">* Error al Actualizar al Cliente</p>';
				}
			}
		}
	}


//Mostrar Datos
if(empty($_GET['id']))
{
	//header('location: lista_clientes.php');
}
$id_cliente = $_GET['id'];

$sql = mysqli_query($conection,"SELECT * FROM clientes WHERE ID = $id_cliente");
	$resultsql = mysqli_num_rows($sql);
	if($resultsql == 0)	{
		header('location: lista_clientes.php');
	}else
	{
		while($data = mysqli_fetch_array($sql)){
			$id_cliente	 		= $data['ID'];
			$nombre_cliente  	= $data['nombre'];
			$apellidos_cliente  = $data['apellidos'];
			$direccion_cliente  = $data['direccion'];
			$numero_dir 		= $data['no'];
			$colonia_cliente    = $data['colonia'];
			$telefono_cliente 	= $data['telefono'];
		}
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Editar Cliente</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_registro">
			<h1>Actualizar Cliente</h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<input type="hidden" name="idcliente" value="<?php echo $id_cliente; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre Completo" value="<?php echo $nombre_cliente; ?>">
				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Apellidos Completos" value="<?php echo $apellidos_cliente; ?>">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Calle" value="<?php echo $direccion_cliente; ?>">
				<label for="numero_dir">Numero Ext.</label>
				<input type="number" name="numero_dir" id="numero_dir" placeholder="Numero Exterior" value="<?php echo $numero_dir; ?>">
				<label for="colonia">Colonia</label>
				<input type="text" name="colonia" id="colonia" placeholder="Colonia del Cliente" value="<?php echo $colonia_cliente; ?>">
				<label for="telefono">Telefono</label>
				<input type="number" name="telefono" id="telefono" placeholder="Ingrese Telefono del Cliente" value="<?php echo $telefono_cliente; ?>">
				<input type="submit" value="Actualizar Cliente" class="btn_save">
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