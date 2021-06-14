
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="index.php">Nutrifit</a>
          <button class="navbar-toggler hidden-lg-up" type="button"></button>
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Categorias</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuario</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">

                    <?php if (!isset($_SESSION["usuario"])) {?> 

                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="registro.php">Registro</a>

                    <?php } else { 
                        if ($_SESSION["usuario"]["idrol"]==1) {?>
                            <a class="dropdown-item" href="admin.php">Admin</a>     
                            <a class="dropdown-item" href="registroComida.php">Registrar Comidas</a>   
                            <a class="dropdown-item" href="cerrar-sesion.php" role="button">Cerrar sesión</a>                  
                    <?php  } else { ?> 

                        <a class="dropdown-item" href="usuario.php">Usuario</a>
                        <a class="dropdown-item" href="cerrar-sesion.php" role="button">Cerrar sesión</a>
                    <?php } } ?> 
                </div>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Ingresar algo">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
          </div>
        </nav>