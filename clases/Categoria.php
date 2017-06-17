<?php  
	
	class Categoria extends superClase{
		function insert($datos){

			$errores=$this->comprobar($datos);

			if(count($errores)>0){

				echo "<div class='alert alert-danger'> Error: Se encontraron los siguientes errores <br><br>
							<button type='button' class='close' data-dismiss='alert' aria-label='close'>
								<span aria-hidden='true'>&times; </span>
							</button>
							<ul>";
								foreach ($errores as $error) {
									echo "<li>".$error."</li>";
								}
				echo "</div>";
			}
			elseif(count(parent::gestorConsulta("INSERT","categorias","","",$datos))>0){
				echo "<div class='alert alert-success'>Se ha creado la categoría ".$datos['nombre_categoria']." con éxito
							<button type='button' class='close' data-dismiss='alert' aria-label='close'>
								<span aria-hidden='true'>&times; </span>
							</button>
					  </div>";
			}
			else
			{
				echo "<div class='alert alert-danger'>Ha ocurrido un error, por favor intente de nuevo
							<button type='button' class='close' data-dismiss='alert' aria-label='close'>
								<span aria-hidden='true'>&times; </span>
							</button>
					  </div>";
			}
		}

		function listar($sql){
			return parent::traerResultado($sql);
		}

		function borrar($id){
			$resultados = parent::traerResultado("SELECT * FROM categorias WHERE id_categoria='".$id."'");
			if(count($resultados)>0)
			{
				if(count(parent::gestorConsulta("DELETE","categorias","id_categoria",$id,'')>0))
				{
					return "<div class='alert alert-success'>Se ha borrado la categoría ".$resultados[0]['nombre_categoria']. " con éxito
								<button type='button' class='close' data-dismiss='alert' aria-label='close'>
									<span aria-hidden='true'>&times; </span>
								</button>
							</div>";	
				}
				else{
					return "<div class='alert alert-danger'>Ha ocurrido un error, por favor intente de nuevo
								<button type='button' class='close' data-dismiss='alert' aria-label='close'>
									<span aria-hidden='true'>&times; </span>
								</button>
						  	</div>";
				}
			}
			else{
				return "<div class='alert alert-danger'>Ha ocurrido un error, por favor intente de nuevo
							<button type='button' class='close' data-dismiss='alert' aria-label='close'>
								<span aria-hidden='true'>&times; </span>
							</button>
					  	</div>";
			}
		}

		function editar($datos){
			$resultados = parent::traerResultado("SELECT * FROM categorias WHERE id_categoria='".$datos['id_categoria']."'");
				if(count($resultados)>0){
					$errores=$this->comprobar($datos);

					if(count($errores)>0){

						echo "<div class='alert alert-danger'> Error: Se encontraron los siguientes errores <br><br>
									<button type='button' class='close' data-dismiss='alert' aria-label='close'>
										<span aria-hidden='true'>&times; </span>
									</button>
									<ul>";
										foreach ($errores as $error) {
											echo "<li>".$error."</li>";
										}
						echo "</div>";
					}elseif(count(parent::gestorConsulta("UPDATE", "categorias","id_categoria", $datos['id_categoria'], $datos)>0))
					{
						echo "<div class='alert alert-info'>Se modificó la categoría ".$datos['nombre_categoria']." con éxito
								  <button type='button' class='close' data-dismiss='alert' aria-label='close'>
							    		<span aria-hidden='true'>&times; </span>
								  </button>
							  </div>";	
					}
					else{
						echo "<div class='alert alert-danger'>Ha ocurrido un error, por favor intente de nuevo
								  <button type='button' class='close' data-dismiss='alert' aria-label='close'>
							    		<span aria-hidden='true'>&times; </span>
							      </button>
							  </div>";
					}
				}
				else{
					echo "<div class='alert alert-danger'>Ha ocurrido un error, por favor intente de nuevo
							  <button type='button' class='close' data-dismiss='alert' aria-label='close'>
						    		<span aria-hidden='true'>&times; </span>
							  </button>
						  </div>";
				}
			}

		function comprobar($datos)
		{
			$errores=array();
			if(trim($datos['nombre_categoria'])==''){
				$errores[]='El campo nombre no puede estar vacío.';
			}
			else{
				if(count(parent::traerResultado("SELECT * FROM categorias WHERE nombre_categoria='".$datos['nombre_categoria']."'"))>0)
				{
					$errores[]='Se encontró una categoria con el mismo nombre nombre: '.$datos['nombre_categoria'];
				}
			}
			return $errores;
		}
	}

?>