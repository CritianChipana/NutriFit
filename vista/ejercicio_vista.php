<?php include 'partials/header.php'   ?>

<?php include '../controlador/EjercicioControlador.php'; ?>

<?php include '../helps/helps.php';?>
<?php  
        if (isset($_SESSION["usuario"])) {
            include 'partials/menu.php';
            ?>
                    <table class="table table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>imagen</th>
                            <th>Accion</th>
                        </tr>
                        <?php 
                        
                        EjercicioControlador::listarEjercicio();
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