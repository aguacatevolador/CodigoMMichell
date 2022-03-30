<?php
include "config/conect.php";
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Usuarios</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="listado_clientes">
		<h1>Lista de Usarios</h1>
		<a href="nuevo_usuario.php" class="btn_new">Agregar Nuevo Usuario</a>
		<table>
			<tr>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Password</th>
				<th>Acciones</th>
			</tr>

			<?php
			/*paginador*/
			$sql_register = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM clientes WHERE estatus = 1");
			$result_registros = mysqli_fetch_array($sql_register);
			$total_registro = $result_registros['total_registro'];

			$por_pagina = 10;

			if(empty($_GET['pagina'])){
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}

			$desde = ($pagina-1) * $por_pagina;
			$total_paginas = ceil($total_registro/$por_pagina);


				$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE estatus = 1 
					ORDER BY ID ASC
					LIMIT $desde,$por_pagina");

				$result = mysqli_num_rows($query);

				if($result > 0){

					while ($data = mysqli_fetch_array($query)) {
			?>
					<tr>
						<td><?php echo($data['USUARIO'])?></td>
						<td><?php echo($data['NOMBRE'])?></td>
						<td><?php echo($data['PASS'])?></td>
						<td>
							<a href="editar_usuario.php?id=<?php echo($data['ID'])?>" class="link_edit">Editar</a>
							<a > | </a> 
							<?php if($data["ID"] != 1) {?>
							<a href="eliminar_usuario.php?id=<?php echo($data['ID'])?>" class="link_eliminar">Eliminar</a>
						</td>
					</tr>
			<?php
		}
				}	
				}
			?>	

		</table>
		<div class="paginador">
			<ul>
			<?php 
				if ($pagina != 1) {
					?>
				<li><a href="?pagina=<?php echo 1; ?>"> |< </a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"> << </a></li>
				<?php }?><?php
					for ($i=1;$i <= $total_paginas; $i++) { 
						if($i == $pagina)
						{
							echo '<li class="paginaActual">'.$i.'</li>';
						}else{
						echo '<li><a href=?pagina='.$i.'>'.$i.'</a></li>';
					}}
				?>
			<?php if($pagina != $total_paginas){ ?>
				<li><a href="?pagina=<?php echo $pagina+1; ?>"> >> </a></li>
				<li><a href="?pagina=<?php echo $total_paginas; ?>"> >| </a></li>
			<?php }?>
			</ul>

		</div>
	</div>
	</section>

<?php include "includes/footer.php"; ?>	
</body>
</html>