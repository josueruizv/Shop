<?php 

	class superClase
	{

		protected function conx()
		{
			$mysqli = new mysqli('localhost','root','','dalhin');
			$mysqli->query("SET NAMES 'utf8'");
			return $mysqli;
		}


		# Método para Crear, Modificar, Eliminar

		protected function gestorConsulta($tipo, $tabla, $clave, $valor_clave, $campos)
		{

			$mysqli = $this->conx();

			switch ($tipo) {
				case 'DELETE':		

						$sql="DELETE FROM $tabla WHERE $clave = '$valor_clave'";

					break;

				case 'INSERT':

						$columnas="";
						$valores="";
						$resultado = $mysqli->query("SELECT * FROM information_schema.columns WHERE table_name ='$tabla' order by ordinal_position asc");

						while($row = $resultado->fetch_assoc())
						{
							foreach ($campos as $key => $value){

							     if ($row['COLUMN_NAME']==$key) {

								     $columnas.=$row['COLUMN_NAME'].",";
								     $valores.="'".$value."',";										
							     }
						     }
						}

						$columnas=substr($columnas,0,-1);
						$valores=substr($valores,0,-1);

						$sql= "INSERT INTO $tabla ($columnas) values ($valores)";
					break;

				case 'UPDATE':

						$i=0;
						$actualizar="";
						$resultado = $mysqli->query("SELECT * FROM information_schema.columns WHERE table_name ='$tabla' order by ordinal_position asc");

						while($row = $resultado->fetch_assoc())
						{
							foreach ($campos as $key => $value) {

									if ($row['COLUMN_NAME']==$key) {

										$actualizar.=$row['COLUMN_NAME']."='".$value."',";				
									}
								}
						}

						$actualizar=substr($actualizar,0,-1);
						$sql= "UPDATE  $tabla SET $actualizar WHERE $clave = '$valor_clave'";

					break;
			}

			$resultado = $mysqli->query($sql);
			
			$filas_afectadas = $mysqli->affected_rows;

			#Cerrar la Sesion
			//$resultado->free();
			$mysqli->close();

			return($filas_afectadas);
			//return $sql;
		}


		protected function traerResultado($consulta)
		{
			$mysqli = $this->conx();
			$x=0;
			$arreglo=array();

			$resultado=$mysqli->query($consulta);

			while($row= $resultado->fetch_assoc())
			{
				$arreglo[$x] = $row;
				$x++;
			}

			$mysqli->close();
			return $arreglo;
		}


		protected function consultaPersonalizada($consulta)
		{

			$mysqli = $this->conx();

			$resultado = $mysqli->query($consulta);
			$filas_afectadas = $mysqli->affected_rows;

			$mysqli->close();
			return $filas_afectadas;
		}
	}

 ?>