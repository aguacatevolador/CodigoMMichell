<?PHP 
	include"../config/conect.php";
	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['id_cliente']) || empty($_POST['cuenta']) || empty($_POST['saldo']) || empty($_POST['abono']) || empty($_POST['restante']))
		{
			$alert='<p class="msg_error">* Todos los Campos son Obligatorios</p>';
		}else{

			$id_cliente = $_POST['id_cliente'];
			$cuenta = $_POST['cuenta'];
			$saldo = $_POST['saldo'];
			$abono = $_POST['abono'];
			$restante = $_POST['restante'];

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
	<title>Nuevo Abono</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_registro">
			<h1>Nuevo Abono</h1>
			<hr>
			<div class="alert"><?PHP echo isset($alert) ? $alert:'' ?> </div>
			<form action="" method="post">
				<label for="nombre">Nombre Cliente</label>
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
								
								<option value="<?php echo $clientes['ID']; ?>"><?php echo $clientes['nombre'];?></option>
					<?php			
						}}
					?>
				</select>





				<label for="cuenta">Cuenta</label>
				<?PHP 
					$query_cuentas = mysqli_query($conection,"SELECT * FROM cuentas WHERE estatus = 0 ");
					$result_cuentas = mysqli_num_rows($query_cuentas);
				?>


				<select name="cliente" id="cliente">
					<?PHP
						if($result_cuentas > 0)
						{
							while ($cuentas =  mysqli_fetch_array($query_cuentas)){
					?>
								
								<option value="<?php echo $cuentas['id']; ?>">Cuenta <?php echo $cuentas['id'];?> a <?php echo $cuentas['plazos'];?> plazos</option>
					<?php			
						}}else{
							$alert='<p class="msg_error">* El cliente no cuenta con cuentas activas</p>';
						}
					?>
				</select>
				<?PHP 
					$query_saldo = mysqli_query($conection,"SELECT * FROM cuentas ");
					$saldo = mysqli_fetch_array($query_saldo);
				?>
				<label for="saldo">Saldo</label>
				<input type="text" name="saldo" id="saldo" placeholder="<?php echo $saldo['saldo'];?>">
				<label for="abono">Cantidad a Abonar</label>
				<input type="number" name="abono" id="abono" placeholder="">
				<label for="restante">Restante</label>
				<input type="text" name="restante" id="restante" placeholder="">
				
				<input type="submit" value="Guardar Abono" class="btn_save">
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