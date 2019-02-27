<?php
	require 'admin/config.php'
	?>
	
<section class="paginacion">
	<ul>
		<?php
			$numero_paginas = numero_paginas($manager_config['items_pagina'], $conexion);
		?>
		<!-- Mostramos el boton para retroceder una pagina -->
		<?php if (pagina_actual() === 1): ?>
			<li class="disabled">&laquo;</li>
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() - 1?>">&laquo;</a></li>
		<?php endif; ?>

		<!-- Creamos un elemento li por cada pagina que tengamos -->
		<?php for ($i = 1; $i <= $numero_paginas; $i++): ?>
			<!-- Agregamos la clase active en la pagina actual -->
			<?php if (pagina_actual() === $i): ?>
				<li class="active">
					<?php echo $i; ?>
				</li>
			<?php else: ?>
				<li>
					<a href="index.php?p=<?php echo $i?>"><?php echo $i; ?></a>
				</li>
			<?php endif; ?>
		<?php endfor; ?>

		<!-- Flecha avanzar -->
		<?php if (pagina_actual() == $numero_paginas): ?>
			<li class="disabled">&raquo;</li>
		<?php else: ?>
			<li><a href="index.php?p=<?php echo pagina_actual() + 1; ?>">&raquo;</a></li>
		<?php endif; ?>
	</ul>
</section>
