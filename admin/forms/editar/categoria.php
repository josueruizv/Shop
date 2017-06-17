<?php  
	
	$sql="SELECT * FROM categorias WHERE id_categoria='$id_categoria'";

	if(count($resultado=$obj_categoria->listar($sql))>0){

		echo '
			<div class="panel-body">
				<form action="?acc='.md5('listar_categorias').'" method="POST">
					<div class="form-group">
						<label for="id_categoria">ID</label>
						<input type="text" name="id_categoria" value="'.$id_categoria.'" class="form-control" readonly>
						<label for="nombre_categoria">Nombre</label>
						<input type="text" name="nombre_categoria" placeholder="Nombre de la categoria" class="form-control" value="'.$resultado[0]['nombre_categoria'].'" required>
						<input type="hidden" name="editar" class="form-control" value="si">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Editar">
					</div>
				</form>
			</div>
		';

	}

?>