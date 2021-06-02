<?php include 'partials/header.php'   ?>
<?php  
        
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 1){
                header("location:admin.php");
            }
        }else {
            header("location:login.php");
        }
?>
<?php include 'partials/menu.php'   ?>
<div class="container">
    <div class="starter-template">
    <br><br><br>
        <div class="jumbotron">
            <div class="container text-center">
            <h1 class="display-3">Nutrifit-Perfil</h1>
            <h2 class="display-5">Bienvenido <span class="spaneo"><?php echo $_SESSION["usuario"]["nombres"] ?></span></h2>
            <p class="lead">Panel de control | <span class="btn btn-success"><?php echo $_SESSION["usuario"]["idrol"] == 1 ? 'Admin':'Cliente'; ?></span></p>
            <hr class="my-2">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="cerrar-sesion.php" role="button">Cerrar sesión</a>
            </p>
            </div>
        </div>
    </div>

</div>
<?php include 'partials/footer.php'   ?>