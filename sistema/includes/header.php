<?php
	session_start();
	/*if(($_SESSION['hora']+10)> (time()-10))
	{
		session_unset();
		session_destroy();
		 echo "<script>
                alert('Seccion Expirada');
                window.location= '../'
    	 </script>";
	}*/
	if (empty($_SESSION['active']))
	{
		header('location: ../');
	}

?>	

	<header>
		<div class="header">
			
			<h1>Sistema de Administracion de Abonos</h1>
			<div class="optionsBar">
				<p>Zacatecas a <?php echo fechaC(); ?> </p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['Nombre'] ?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
				</div>
		</div>
		<?php include "nav.php";?>
	</header>