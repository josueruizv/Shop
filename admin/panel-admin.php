<nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="../img/logo1.png" alt="Dalhin Design"></a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo "?acc=".md5('listar_categorias') ?>">Categorias</a></li>
      <li><a href="<?php echo "?acc=".md5('listar_subcategorias') ?>">Subcategorias</a></li>
      <li><a href="<?php echo "?acc=".md5('listar_productos') ?>">Productos</a></li>
      <li><a href="<?php echo "?acc=".md5('listar_marcas') ?>">Marcas</a></li>
      <li><a href="<?php echo "?acc=".md5('listar_etiquetas') ?>">Etiquetas</a></li>
    </ul>
 
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><b>Administrador</b></a></li>
      <li><a href="#">Cerrar Sesión</a></li>
    </ul>
  </div>
</nav>