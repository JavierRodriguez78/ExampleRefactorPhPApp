<?php require 'menu.php' ?>

	<div class="contenedor">
		<h2 class="name">Enviar Dudas / Sugerencias:</h2>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario">
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre?>">
			<br />
			<input type="text" class="form-control" name="correo" id="correo" placeholder="Correo:" value="<?php if(!$enviado && isset($correo)) echo $correo?>">
			<br />
			<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje:"><?php if(!$enviado && isset($mensaje)) echo $mensaje?></textarea>
			<br />
			<?php if (!empty($errores)): ?>
				<div class="alert error" role="alert">
					<?php echo $errores; ?>
				</div>
			<?php elseif($enviado) : ?>
				<div class="alert success" role="alert">
					<?php echo 'Enviado Correctamente'; ?>
				</div>
			<?php endif; ?>
			<br />
			<input type="submit" name="submit" class="btn btn-primary" value="Enviar Correo">
		</form>
	</div>

<?php 
	require 'footer.php'; 
?>