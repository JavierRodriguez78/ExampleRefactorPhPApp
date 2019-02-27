<?php 
	require 'menu.php' 
?>

	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="name">Iniciar Sesion</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" method="post">
					<input type="text" name="usuario" placeholder="Usuario">
					<input type="password" name="password" placeholder="Contraseña">
					<input type="submit" value="Iniciar Sesion">
				</form>
			</article>
		</div>
	</div>

<?php 
	require 'footer.php'; 
?>