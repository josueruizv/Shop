<?php

	
class Facultad extends superClase
{
	function registrarFacultad($datos)
	{
		if($this->comprobarFacultad($datos['nombre_f'],NULL))
		{
			return "<div class='alert alert-danger'>Error: Se encontro una facultad con el mismo nombre </br> Nombre:".$datos['nombre_f']."
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";

		}
		elseif(count(parent::gestorConsulta("INSERT","facultad","","",$datos))>0)
		{
			return "<div class='alert alert-success'>Se registro la facultad con el nombre: ".$datos['nombre_f']."
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";
		}
		else
		{
			return "<div class='alert alert-danger'>Ha ocurrido un error, reportelo al administrador
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";
		}

	}
	function borrarFacultad($codigo_f)
	{
		if(count(parent::gestorConsulta("DELETE","facultad","codigo_f",$codigo_f,'')>0))
		{
			return "<div class='alert alert-success'>Se borro la facultad con el código: ".$codigo_f."
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";	
		}
		else{
			return "<div class='alert alert-danger'>Ha ocurrido un error, reportelo al administrador
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";
		}
	}

	function actualizarFacultad($codigo_f,$datos)
	{
		if($this->comprobarFacultad($datos['nombre_f'],$datos['codigo_f']))
		{
			return "<div class='alert alert-danger'>Error: Se encontro una facultad con el mismo nombre </br> Nombre:".$datos['nombre_f']."
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";

		}
		elseif(count(parent::gestorConsulta("UPDATE", "facultad","codigo_f", $codigo_f, $datos)>0))
		{
			return "<div class='alert alert-info'>Se actualizó la facultad con el código: ".$codigo_f."
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";	
		}
		else{
			return "<div class='alert alert-danger'>Ha ocurrido un error, reportelo al administrador
						<button type='button' class='close' data-dismiss='alert' aria-label='close'>
							<span aria-hidden='true'>&times; </span>
						</button>
					</div>";
		}

	}

	function comprobarFacultad($nombre,$codigo_f)
	{
		if(count(parent::traerResultado("select * from facultad where nombre_f='".$nombre."' and codigo_f!='$codigo_f'"))>0)
			return true;
		else
			return false;
	}

	function listarFacultad($sql)
	{
		return parent::traerResultado($sql);
	}
	
}


?>

