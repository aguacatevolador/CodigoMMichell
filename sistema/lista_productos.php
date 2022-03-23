<?php
include "config/conect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Productos</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	
	<section id="container">
		<div class="listado_productos">
		<h1>Lista de Productos</h1>
		<a href="nuevo_producto.php" class="btn_new">Agregar Nuevo Producto</a>
		<table>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Estock</th>
				<th>Acciones</th>
			</tr>

			<?php

				$query = mysqli_query($conection,"SELECT * FROM articulos WHERE estatus = 1");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
			?>
					<tr>
						<td><?php echo($data['codigo_articulo'])?></td>
						<td><?php echo($data['nombre'])?></td>
						<td><?php echo($data['precio'])?></td>
						<td><?php echo($data['descripcion'])?></td>
						<td><?php echo($data['stok'])?></td>
						<td>
							<a href="editar_producto.php?id=<?php echo($data['codigo_articulo'])?>" class="link_edit">Editar</a>
							<a > | </a> 
							<a href="eliminar_producto.php?id=<?php echo($data['codigo_articulo'])?>" class="link_eliminar">Eliminar</a>
						</td>
					</tr>
			<?php
				}	
				}
			?>	

		</table>
	</div>
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>