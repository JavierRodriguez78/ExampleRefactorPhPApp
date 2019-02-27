<?php 
	require 'menu.php'; 
?>

	<div class="contenedor">
		<?php foreach($files as $file): ?>
			<div class="post">
				<article>
					<h2 class="name"><a href="detalle.php?id=<?php echo $file['id']; ?>"><?php echo $file['name'] ?></a></h2>
					<p class="fecha"><?php echo fecha($file['createdAt']); ?></p>
					<div class="picture">
						<a href="detalle.php?id=<?php echo $file['id']; ?>">
							<img src="./imag/<?php echo $file['picture']; ?>" alt="<?php echo $file['name'] ?>">
						</a>
					</div>
					<p class="description"><?php echo utf8_encode($file['description']) ?></p>
					<a href="detalle.php?id=<?php echo $file['id']; ?>" class="continuar">Más información</a>
				</article>
			</div>
		<?php endforeach; ?>

		<?php 
			require 'paginacion.php'; 
		?>

	</div>

<?php require 'footer.php'; ?>