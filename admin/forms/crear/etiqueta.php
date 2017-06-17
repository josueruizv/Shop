<div class="panel-body">
	<form action="<?php echo "?acc=".md5('crear_etiqueta') ?>" method="POST">
		<div class="form-group">
			<label for="nombre_etiqueta">Nombre</label>
			<input type="text" name="nombre_etiqueta" class="form-control" placeholder="Nombre de la Etiqueta" required>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar">
		</div>
	</form>
</div>