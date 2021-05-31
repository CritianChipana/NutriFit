<?php include 'partials/header.php'   ?>
<?php include 'partials/menu.php'   ?>
<?php         
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 1){
                header("location:admin.php");
            }elseif ($_SESSION["usuario"]["idrol"] == 2){
                header("location:usuario.php");
            }

        }
?>
<div class="container">
    <br><br><br>
        <div class="m-0 row justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                        <form id="loginForm" action="validarCode.php" method="post" role="form">
                        <legend class="text-center">Iniciar Sesión</legend>
                        <div class="form-group ">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="txtusuario" autofocus required class="form-control" id="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="txtpassword" class="form-control" required id="password" placeholder="****">
                        </div>
                        <button type="submit" name="" id="" class="btn btn-success btn-lg btn-block">Ingresar</button>
                        </form>
            </div>
        </div>

</div>
<?php include 'partials/footer.php'   ?>