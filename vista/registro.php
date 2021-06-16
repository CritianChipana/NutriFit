<?php include 'partials/header.php'   ?>
<?php include 'partials/menu.php'   ?>

<div class="container">
    <br><br><br>
        <div class="m-0 row justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                        <form action="registroCode.php" method="post" role="form">
                        <legend class="text-center">Registro de Usuario</legend>
                        <div class="form-group ">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="txtusuario" autofocus required class="form-control" id="usuario" placeholder="Ingrese usuario">
                        </div>
                        <div class="form-group ">
                            <label for="password">Password</label>
                            <input type="password" name="txtpassword" autofocus required class="form-control" id="password" placeholder="Ingrese password">
                        </div>
                        <div class="form-group ">
                            <label for="nombres">Nombres</label>
                            <input type="text" name="txtnombres" autofocus required class="form-control" id="nombres" placeholder="Ingrese su nombre">
                        </div>
                        <div class="form-group ">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="txtapellidos" autofocus required class="form-control" id="apellidos" placeholder="Ingrese su apellido">
                        </div>
                        <div class="form-group ">
                            <label for="dni">DNI</label>
                            <input type="text" name="txtdni" required class="form-control" id="dni" placeholder="Ingrese DNI">
                        </div>
                        <div class="form-group ">
                            <label for="sexo">Sexo</label>
                            <input type="text" name="txtsexo" required class="form-control" id="sexo" placeholder="Sexo">
                        </div>
                        <div class="form-group ">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="txttelefono" required class="form-control" id="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group ">
                            <label for="telefono">Correo</label>
                            <input type="email" name="txtcorreo" required class="form-control" id="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group ">
                            <label for="fecha_nacimiento">Fecha_Nacimiento</label>
                            <input type="date" name="txtfecha_nacimiento" required class="form-control" id="fecha_nacimiento"
                        placeholder="">
                        </div>
                        <!--<div class="form-group ">
                            <label for="fecha_nacimiento">Fecha_Nacimiento</label>
                            <input type="date" name="txtfecha_nacimiento" required class="form-control" id="fecha_nacimiento"
                        placeholder="">
                        </div>
                        -->
                        <div class="form-group ">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="txtdireccion" required class="form-control" id="direccion"
                        placeholder="Direccion">
                        </div>
                        <div class="form-group ">
                        <label for="usuario">Estado</label>
                        <input type="text" name="txtestado" required class="form-control" id="estado" placeholder="Estado">
                        </div>
                        <button type="submit" class="btn btn-success">Registrar</button>
                        </form>
            </div>
        </div>

</div>
<?php include 'partials/footer.php'   ?>