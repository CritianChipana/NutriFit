<?php include 'partials/header.php'   ?>
<?php include 'partials/menu.php'   ?>
<?php         
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["rol"] == 1){
                header("location:admin.php");
            }elseif ($_SESSION["usuario"]["rol"] == 2){
                header("location:usuario.php");
            }

        }
?>
<div class="container">
    <br><br><br>
        <div class="m-0 row justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                        <form action="registroCode.php" method="post" role="form">
                        <legend class="text-center">Registro de Usuario</legend>
                        <div class="form-group ">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="txtnombre" autofocus required class="form-control" id="nombre" placeholder="Ingrese su nombre">
                        </div>
                        <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="email" name="txtemail" required class="form-control" id="email" placeholder="Ingrese su Email">
                        </div>
                        <div class="form-group ">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="txtusuario" required class="form-control" id="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="txtpassword" class="form-control" required id="password" placeholder="****">
                        </div>
                        <button type="submit" name="regis" id="" class="btn btn-success btn-lg btn-block">Registrar</button>
                        </form>
            </div>
        </div>

</div>
<?php include 'partials/footer.php'   ?>