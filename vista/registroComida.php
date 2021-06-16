<?php include 'partials/header.php'   ?>
<?php include 'partials/menu.php'   ?>
<?php   
?>
<div class="container">
    <br><br><br>
        <div class="m-0 row justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                        <form action="registroComidaCode.php" method="post" role="form">
                        <legend class="text-center">Registro de Comidas</legend>
                        <div class="form-group ">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="txtnombre" autofocus required class="form-control" id="nombre" placeholder="Ingrese el nombre de la comida">
                        </div>
                        <div class="form-group ">
                            <label for="email">Ingredientes</label>
                            <input type="text" name="txtingredientes" required class="form-control" id="email" placeholder="Ingrese los ingredientes">
                        </div>
                        <div class="form-group ">
                            <label for="usuario">Descripcion</label>
                            <input type="text" name="txtdescripcion" required class="form-control" id="usuario" placeholder="Ingrese la descripcion">
                        </div>
                        <div class="form-group ">
                            <label for="usuario">Preparacion</label>
                            <input type="text" name="txtpreparacion" required class="form-control" id="usuario" placeholder="Ingrese la preparacion">
                        </div>
                        <div class="form-group ">
                            <label for="usuario">Imagen</label>
                            <input type="text" name="txtimagen" required class="form-control" id="usuario" placeholder="Ingrese la imagen">
                        </div>
                        <div class="form-group ">
                            <label for="usuario">Video</label>
                            <input type="text" name="txtvideo" required class="form-control" id="usuario" placeholder="Ingrese la video">
                        </div>
                        <div class="form-group ">
                            <label for="usuario">Diagnostico</label>
                            <input type="text" name="txtiddiagnostico" required class="form-control" id="usuario" placeholder="Ingrese la diagnostico">
                        </div>
                        <button type="submit" name="regis" id="" class="btn btn-success btn-lg btn-block">Registrar</button>
                        </form>
            </div>
        </div>

</div>
<?php include 'partials/footer.php'   ?>