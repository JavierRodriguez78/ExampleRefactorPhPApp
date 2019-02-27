<?php 
require './menuAdmin.php';

?>
<div class="contenedor">
	<h2>Panel de Control</h2>
	<a href="nuevo.php" class="btn">Nuevo Documento</a>
	<a href="cerrar.php" class="btn">Cerrar Sesion</a>

	<?php foreach($files as $file): ?>
	<section class="post">
		<article>
			<h2 class="name"><?php echo $file['id'] . '.- ' . $file['name']; ?></h2>
			<a href="editar.php?id=<?php echo $file['id']; ?>">Editar    </a>
			<a href="borrar.php?id=<?php echo $file['id']; ?>">    Borrar</a>
		</article>
	</section>
	<?php endforeach; ?>

	<a href="listar.php" class="btn">Listado Documentos</a>
	<!--
	<form id="miform" name="miform" method="post" action="<?=$_SERVER['PHP_SELF']?>">
			<input class="btn" type="Submit" value="Listado de Documentos" />	
	</form> --!>
</div>

<?php 
	require '../paginacion.php'; 
?>
<?php 
	require 'footer.php'; 
?>