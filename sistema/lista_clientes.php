<?php
include "config/conect.php";
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Clientes</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="listado_clientes">
		<h1>Lista de Clientes</h1>
		<a href="nuevo_cliente.php" class="btn_new">Agregar Nuevo Cliente</a>
		<table>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Direccion</th>
				<th>No. Exterior</th>
				<th>Colonia</th>
				<th>Telefono</th>
				<th>Acciones</th>
			</tr>

			<?php

				$query = mysqli_query($conection,"SELECT * FROM clientes WHERE estatus = 1");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
			?>
					<tr>
						<td><?php echo($data['ID'])?></td>
						<td><?php echo($data['nombre'])?></td>
						<td><?php echo($data['apellidos'])?></td>
						<td><?php echo($data['direccion'])?></td>
						<td># <?php echo($data['no'])?></td>
						<td><?php echo($data['colonia'])?></td>
						<td><?php echo($data['telefono'])?></td>
						<td>
							<a href="editar_cliente.php?id=<?php echo($data['ID'])?>" class="link_edit">Editar</a>
							<a > | </a> 
							<?php if($data["ID"] != 1) {?>
							<a href="eliminar_confirmar.php?id=<?php echo($data['ID'])?>" class="link_eliminar">Eliminar</a>
						</td>
					</tr>
			<?php
		}
				}	
				}
			?>	

		</table>
	</div>
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>