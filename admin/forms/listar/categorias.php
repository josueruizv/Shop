<?php  
	if((isset($registrar)) && ($registrar='si'))
		$obj_categoria->insert($_POST);
	if((isset($borrar)) && ($borrar=='si'))	
		echo $obj_categoria->borrar($id_categoria);
	if((isset($editar)) && ($editar=='si'))	
		$obj_categoria->editar($_POST);
?>

<!-- BUSCADOR DE CATEGORIAS -->
	<form class="navbar-form pull-right" action="<?php echo "?acc=".md5('listar_categorias') ?>" method="POST">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Buscar categoria..." name="busqueda" aria-describedby="search" value="<?php echo $busqueda; ?>">
			<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
		</div>
	</form>
<!-- FIN DEL BUSCADOR -->

<?php  
	$total = $obj_categoria->listar("SELECT * FROM categorias WHERE CONCAT(id_categoria,nombre_categoria) like '%$busqueda%'");
	$resultado=$obj_categoria->listar("SELECT * FROM categorias WHERE CONCAT(id_categoria,nombre_categoria) like '%$busqueda%' LIMIT $inicio,$TAM_PG");
?>
<div class="panel-body">
	<a href="<?php echo "?acc=".md5('crear_categoria') ?>" class="btn btn-info">Registrar nueva categoria</a>
	<hr>
	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</thead>
		<tbody>
			<?php for($i=0;$i<count($resultado);$i++) {
				echo '<tr>
						<td>'.$resultado[$i]['id_categoria'].'</td>
						<td>'.$resultado[$i]['nombre_categoria'].'</td>
						<td>
							<form action="?acc='.md5('editar_categoria').'" method="POST" >
								<input type="hidden" name="id_categoria" value='.$resultado[$i]['id_categoria'].'>
								<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
							</form>
						</td>
						<td>
							<form action="?acc='.md5('listar_categorias').'" method="POST" onsubmit="return confirm(\'¿Seguro que deseas eliminarlo?\')">
								<input type="hidden" name="id_categoria" value='.$resultado[$i]['id_categoria'].'>
								<input type="hidden" name="borrar" hidden value="si">
								<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
							</form> 
						</td>
					  </tr>';
			} 
			?>
		</tbody>
	</table>
	<div class="text-center">
		<ul class="pagination">
		  <?php 
		  	$cant_registros=count($total);
		  	$total_paginas = ceil($cant_registros/$TAM_PG);
		  	
		  	if($total_paginas>1)
		  	{
		  		if($pg==1)
		  		{
		  			echo '<li class="disabled">
						    <a href="#">&laquo;</a>
						  </li>';
		  		}
		  		else{
		  			echo '<li>
						    <a href="?acc='.md5('listar_categorias').'&pg='.($pg-1).'&busq='.$busqueda.'">&laquo;</a>
						  </li>';
		  		}
		  		for($i=1;$i<=$total_paginas;$i++)
			  	{
			  		if($i==$pg){
				  		echo '<li class="active">
							    <a href="#">'.$i.'<span class="sr-only">(página actual)</span></a>
							  </li>';
					}
					else{
						echo '<li>
							    <a href="?acc='.md5('listar_categorias').'&pg='.$i.'&busq='.$busqueda.'">'.$i.'</a>
							  </li>';
					}
			  	}
			  	if($pg==$total_paginas)
		  		{
		  			echo '<li class="disabled">
						    <a href="#">&raquo;</a>
						  </li>';
		  		}
		  		else{
		  			echo '<li>
						    <a href="?acc='.md5('listar_categorias').'&pg='.($pg+1).'&busq='.$busqueda.'">&raquo;</a>
						  </li>';
		  		}
		  	}		  	
		  ?>
		</ul>
	</div>
</div>