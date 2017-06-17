<div class="panel-body">
	<form action="<?php echo "?acc=".md5('crear_producto') ?>" method="POST">
		<div class="form-group">
			<label for="titulo_producto">Título</label>
			<input type="text" name="titulo_producto" class="form-control" placeholder="Título del Producto" required>
		</div>
		<div class="form-group">
			<label for="descripcion_producto">Descripción</label>
			<textarea class="form-control textarea-descripcion" name="descripcion_producto"></textarea>
		</div>
		<div class="form-group">
			<label for="id_subcategoria">Subcategoría</label>
			<select class="form-control select-subcategoria" name="id_subcategoria" required>
				<option value=""></option>
				<option value="1">Subcategoría 1</option>
				<option value="2">Subcategoría 2</option>
				<option value="3">Subcategoría 3</option>
			</select>
		</div>
		<div class="form-group">
			<label for="precio_producto">Precio (Bs.)</label>
			<input type="number" step="any" class="form-control" name="precio_producto" placeholder="Precio del Producto">
		</div>
		<div class="form-group">
			<label for="id_marca">Marca</label>
			<select class="form-control select-marca" name="id_marca" required>
				<option value=""></option>
				<option value="1">Marca 1</option>
				<option value="2">Marca 2</option>
				<option value="3">Marca 3</option>
			</select>
		</div>
		<div class="form-group">
			<label for="id_etiqueta">Etiquetas</label>
			<select class="form-control select-etiquetas" name="id_etiqueta[]" multiple required>
				<option value="1">Etiqueta 1</option>
				<option value="2">Etiqueta 2</option>
				<option value="3">Etiqueta 3</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Registrar">
		</div>
	</form>
</div>