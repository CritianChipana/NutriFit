<?php include 'partials/header.php'   ?>

<?php include '../controlador/ComidaControlador.php'; ?>

<?php include '../helps/helps.php';?>
<?php  
        $idcomi=$_GET['idcomi'];
        if (isset($_SESSION["usuario"])) {
            include 'partials/menu.php';
            ?>

            <div class="container">
                <div class="starter-template">
                <br><br><br>
                    <div class="jumbotron">
                        <div class="container text-center">
                        <h1 class="display-3">Nutrifit-Comidas</h1>
                        <h2 class="display-5">Bienvenido Dr. <?php echo $_SESSION["usuario"]["nombres"] ." ".$_SESSION["usuario"]["apellidos"] ?></h2>
                        <p class="lead">Panel de control | <span class="btn btn-success"><?php echo $_SESSION["usuario"]["idrol"] == 1 ? 'Admin':'Cliente'; ?></span></p>
                        <hr class="my-2">
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="cerrar-sesion.php" role="button">Cerrar sesión</a>
                        </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ingredientes</th>
                            <th>descripcion</th>
                            <th>preparacion</th>
                            <th>imagen</th>
                            <th>video</th>
                            <th>estadofav</th>
                            <th>iddiagnostico</th>
                        </tr>
                        <?php 
                        
                        ComidaControlador::detalleComida($idcomi);
                             ?>
                    </table>
                </div>
            </div>
            <?php include 'partials/footer.php';
        

        }
        else {
            header("location:login.php");
        }

       
?>
