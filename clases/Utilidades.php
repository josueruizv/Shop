<?php

	/**
	*  clase para hacer mas dinamico el sistema mediante funciones
	*/
class Utilidades extends superClase
{
	function generadorSelect($tabla,$opcion,$nombre_campo, $seleccionado, $sql)
	{
		
		//opcion = el nombre que debe llevar el select
		//nombre_campo= lo que se mostrara al usuario como opcion en los selects
		//condicion = para filtar campos
		//sql= la consulta a realizar
		$datos=$this->traerResultado("SHOW KEYS FROM $tabla");
		$clave_primaria=$datos[0]['Column_name'];
		unset($datos);
		$datos=$this->traerResultado($sql);		
		$select="<select  class='form-control input-sm' name='$opcion' required>";
		$select.= "<option></option>";
		for ($i=0; $i < count($datos); $i++) {			
			if($datos[$i][$clave_primaria]==$seleccionado)
				$select.="<option selected value='".$datos[$i][$clave_primaria]."'>".($datos[$i][$nombre_campo])."</option>";
			else
				$select.="<option value='".$datos[$i][$clave_primaria]."'>".($datos[$i][$nombre_campo])."</option>";			
		}
		$select.="</select>";
		return($select);
	}
	
	function fichero($ruta)
	{
		if (!file_exists($ruta))
		{
			if(mkdir($ruta,0777,true))
				return true;
			else
				return false;
		}
		return true;
	}


	function subirFichero($imagen,$ruta) //sube la imagen al servidor
	{
		
		if ($imagen['error']==0) {
			if ($imagen['type']=="image/jpg" or $imagen['type']=="image/jpeg")
				$extension='jpeg';
			elseif($imagen['type']=="image/gif")
				$extension='gif';
			elseif ($imagen['type']=="image/png")
				$extension='png';	
			else
			{
				//echo "No se admite el tipo de archivo";
				return false;
			}

			// echo "<center> Utilidad foto:<pre>";
			// print_r($imagen);
			// echo "</pre></center>";
			// echo "<center>nombre es: ".$nombre_imagen."</center>";
			// echo "<center>ruta es: ".$ruta."</center>";
			if ($this->fichero($ruta))
			{
				$nombre_imagen=md5(rand()*time()).'.'.$extension;
				if (move_uploaded_file($imagen['tmp_name'],$ruta.'/'.$nombre_imagen))
					return ($nombre_imagen);
				else
					return false;
			}			
		}
	}
}


?>

