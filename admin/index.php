<?php
	include("../clases/Run.php");   

	$TAM_PG = 5;

	extract($_REQUEST);
	if(!isset($acc))
	   $acc="";

	if(is_numeric($pg)){
		$inicio=($pg-1)*$TAM_PG;
	}
	else{
		header('Location: index.php?acc='.$acc);
	}

	if(isset($busq) && ($busq!=""))
	{
		$busqueda=$busq;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.png">
	<title>Dalhin Design | Administrador</title>

	<script src="../plugins/jquery/jquery-3.1.0.min.js"></script>

	<!-- Bootstrap Core CSS -->
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">

	<!-- Trumbowyg -->
    <link rel="stylesheet" href="../plugins/trumbowyg/ui/trumbowyg.min.css">

	<!-- Chosen -->
    <link rel="stylesheet" href="../plugins/chosen/chosen.css">
	
</head>
<body>
	<div class="container">
		<div class="row">
			<!--Aqui inicia el menu -->
		    <?php include 'panel-admin.php'; ?>
		   	<!--Aqui termina el menu-->
		</div>

	   	<div class="row">
		   	<div class="panel panel-default">

				<?php  
				switch($acc) {

					case md5('listar_categorias'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Listado de Categorías</b></h3>
			   				  </div>';
			   				  include('forms/listar/categorias.php');
						break;

					case md5('crear_categoria'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Agregar Categoría</b></h3>
			   				  </div>';
			   				  include('forms/crear/categoria.php');
						break;

					case md5('editar_categoria'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Editar Categoría</b></h3>
			   				  </div>';
			   				  include('forms/editar/categoria.php');
						break;

					case md5('listar_subcategorias'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Listado de Subcategorías</b></h3>
			   				  </div>';
			   				  include('forms/listar/subcategorias.php');
						break;

					case md5('crear_subcategoria'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Agregar Subcategoría</b></h3>
			   				  </div>';
			   				  include('forms/crear/subcategoria.php');
						break;

					case md5('listar_productos'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Listado de Productos</b></h3>
			   				  </div>';
			   				  include('forms/listar/productos.php');
						break;

					case md5('crear_producto'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Agregar Producto</b></h3>
			   				  </div>';
			   				  include('forms/crear/producto.php');
						break;

					case md5('listar_marcas'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Listado de Marcas</b></h3>
			   				  </div>';
			   				  include('forms/listar/marcas.php');
						break;

					case md5('crear_marca'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Agregar Marca</b></h3>
			   				  </div>';
			   				  include('forms/crear/marca.php');
						break;

					case md5('listar_etiquetas'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Listado de Etiquetas</b></h3>
			   				  </div>';
			   				  include('forms/listar/etiquetas.php');
						break;

					case md5('crear_etiqueta'):
					  	echo '<div class="panel-heading">
			   						<h3 class="panel-title text-center"><b>Agregar Etiqueta</b></h3>
			   				  </div>';
			   				  include('forms/crear/etiqueta.php');
						break;

					default:
			   		  	echo '<div class="panel-heading">
			   						<h4 class="text-center">Panel de Administración</h4>
			   				  </div>
			   				  <div class="panel-body pbody">
			   						<img class="img-responsive animated fadeInLeft slowest" src="../img/logo-negro.png" alt="Dalhin Design"></img>
			   				  </div>';
			   	}
		   		?>

		   	</div>
		</div>

	   	<div class="row footer">
		   	<div class="navbar navbar-default">
			   	<div class="container-fluid">
				   	<div class="collapse navbar-collapse">
				   		<p class="navbar-text">&copy <?php echo date('Y'); ?> | Todos los Derechos Reservados</p>
				   		<p class="navbar-text pull-right"><b>Dalhin Design C.A.</b></p>
				   	</div>
				</div>
			</div>
		</div>
	</div>
</body>

	<!-- Bootstrap JS -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

	<!-- Trumbowyg -->
    <script src="../plugins/trumbowyg/trumbowyg.js"></script>

    <!-- Chosen -->
    <script src="../plugins/chosen/chosen.jquery.js" ></script>

    <script>
		$('.select-etiquetas').chosen({
			placeholder_text_multiple: 'Seleccione las etiquetas',
			//max_selected_options: 3,
			search_contains: true,
			no_results_text: 'No se encontraron estas etiquetas'
		});

		$('.select-categoria').chosen({
			placeholder_text_single: 'Seleccione una categoría',
			no_results_text: 'No se encontró esta categoría'
		});

		$('.select-subcategoria').chosen({
			placeholder_text_single: 'Seleccione una subcategoría',
			no_results_text: 'No se encontró esta subcategoría'
		});

		$('.select-marca').chosen({
			placeholder_text_single: 'Seleccione una marca',
			no_results_text: 'No se encontró esta marca'
		});

		$('.textarea-descripcion').trumbowyg({
			
		});
	</script>
</html>