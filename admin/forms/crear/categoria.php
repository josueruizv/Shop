<div class="panel-body">
	<form action="<?php echo "?acc=".md5('listar_categorias') ?>" method="POST">
		<div class="form-group">
			<label for="nombre_categoria">Nombre</label>
			<input type="text" name="nombre_categoria" class="form-control" placeholder="Nombre de la Categoria" required>
			<input type="hidden" name="registrar" class="form-control" value="si">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar">
		</div>
	</form>
</div>