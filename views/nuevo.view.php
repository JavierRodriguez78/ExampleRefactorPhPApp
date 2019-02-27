<?php 
	require './menuAdmin.php';
 ?>

	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="name">Nuevo Material Educativo</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" class="formulario" method="post">
					<input type="text" name="name" placeholder="Nombre del material">
					<input type="text" name="description" placeholder="description del documento">
					<textarea name="text" placeholder="texto del material educativo"></textarea>
					<input type="file" name="picture" class="fileBttn">
					<a href="index.php" class="continuar">Volver</a>
					<input type="submit" value="Crear Documento">
				</form>
			</article>
		</div>
	</div>

<?php 
require 'footer.php'; 
?>