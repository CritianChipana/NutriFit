<?php include 'partials/header.php'   ?>

<?php include '../controlador/EjercicioControlador.php'; ?>

<?php include '../helps/helps.php';?>
<?php  
        $idej=$_GET['idej'];
        if (isset($_SESSION["usuario"])) {
            include 'partials/menu.php';
            ?>
                    <table class="table table-dark">
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Tipo</td>
                            <td>Video</td>
                            <td>Repeticiones</td>
                            <td>Cantidad</td>
                            <td>imagen</td>
                            <td>Descripcion</td>
                        </tr>
                        <?php 
                        
                        EjercicioControlador::listarDescripcionEjercicio($idej);
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