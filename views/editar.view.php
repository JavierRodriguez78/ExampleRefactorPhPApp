<?php require '../admin/menuAdmin.php'; ?>

	<div class="contenedor">
		<div class="post">
			<article>
				<h2 class="name">Editar</h2>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" enctype="multipart/form-data" method="post">
					<input type="hidden" name="id" value="<?php echo $file['id']; ?>">
					<input type="text" name="name" value="<?php echo $file['name'] ?>">
					<input type="text" name="description" value="<?php echo $file['description']; ?>">
					<textarea name="text"><?php echo $file['text']; ?></textarea>
					<input type="file" name="picture" class="fileBttn">
					<input type="hidden" name="picture-guardada" value="<?php echo $file['picture']; ?>">
					<input type="submit" value="Guardar Datos">	
					<a href="index.php" class="continuar">   Cancelar cambios</a>
				</form>
			</article>
		</div>
	</div>

<?php require 'footer.php'; ?>