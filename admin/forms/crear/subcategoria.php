<div class="panel-body">
	<form action="<?php echo "?acc=".md5('crear_subcategoria') ?>" method="POST">
		<div class="form-group">
			<label for="nombre_subcategoria">Nombre</label>
			<input type="text" name="nombre_subcategoria" class="form-control" placeholder="Nombre de la Subcategoria" required>
		</div>
		<div class="form-group">
			<label for="id_categoria">Categoría</label>
			<select class="form-control select-categoria" name="id_categoria" required>
				<option value="1">Categoria 1</option>
				<option value="2">Categoria 2</option>
				<option value="3">Categoria 3</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar">
		</div>
	</form>
</div>