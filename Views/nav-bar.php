<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo  FRONT_ROOT."Publicacion/showMuro"?> ">RedSocial</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">        
      <?php  if($_SESSION["loggedUser"]->getRol() == 1){ ?> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navAdministracion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Administracion
          </a>
          <div class="dropdown-menu" aria-labelledby="navAdministracion">
            <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Cine/ShowListView"?>">Cines</a>
            <a class="dropdown-item" href="<?php echo  FRONT_ROOT."Funcion/GetAll"?>">Funciones</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo  VIEWS_PATH."statistics.php"?>">Estadisticas</a>
          </div>
        </li>
      <?php  } ?> 

      <li class="nav-item">
      <li class="nav-item">
        <form action="<?php echo FRONT_ROOT."Publicacion/buscarPersona" ?>" method="post">
          <input type="text" class="form-control-sm" name="busqueda" placeholder="Buscar persona..." maxlength="100" required>
          <button type="submit" class="btn btn-outline-primary">Buscar
      
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
          </svg>
        
        </button>
        </form>
      </li>
        <a class="nav-link" href="<?php echo  FRONT_ROOT."Publicacion/showMuro"?>">Muro</a>
      </li>

    </ul>   
    <a class="btn btn-link" href="<?php echo  FRONT_ROOT."Publicacion/showPerfil "?>"><?php echo ucfirst( $_SESSION["loggedUser"]->getName()) ?></a>
    <a class="btn btn-outline-danger" href="<?php echo  FRONT_ROOT."User/Logout "?>">Salir</a>
  </div>
</nav>