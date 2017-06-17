<div class="panel-body">
	<form action="<?php echo "?acc=".md5('crear_marca') ?>" method="POST">
		<div class="form-group">
			<label for="nombre_marca">Nombre</label>
			<input type="text" name="nombre_marca" class="form-control" placeholder="Nombre de la Marca" required>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar">
		</div>
	</form>
</div>