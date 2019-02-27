<?php require 'menu.php' ?>

	<div class="contenedor">
		<section class="post">
			<article>
				<h2 class="name"><?php echo $file['name'] ?></h2>
				<p class="fecha"><p class="fecha"><?php echo fecha($file['createdAt']); ?></p></p>
				<div class="picture">
					<img src="./imag/<?php echo $file['picture']; ?>" alt="<?php echo $file['name'] ?>">
				</div>
				<!-- Con la funcion nl2br insertamos un salto de linea antes de todas las lineas nuevas de un string. -->
				<p class="description"><?php utf8_decode($file['description']); ?></p>
				<p class="text"><?php echo utf8_decode($file['text']); ?></p>
				<br />
				<a href="index.php" class="continuar">Volver</a>
			</article>
		</section>
	</div>

<?php require 'footer.php'; ?>