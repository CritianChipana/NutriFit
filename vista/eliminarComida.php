<?php include 'partials/header.php'   ?>

<?php include '../controlador/ComidaControlador.php'; ?>

<?php include '../helps/helps.php';?>
<?php  
        
        if (isset($_SESSION["usuario"])) {
            include 'partials/menu.php';
            ?>
            <br><br><br>
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
                        
                        ComidaControlador::obtenerComidaE();
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
