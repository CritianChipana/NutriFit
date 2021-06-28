<?php include 'partials/header.php'   ?>


<?php include '../controlador/EjercicioControlador.php'; ?>

<?php include '../helps/helps.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        session_start();
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/ejercicio_vista.css">
    <title>Ejercicios</title>
</head>
<body>
        <div class="Contenedor-Marca" >
            <div class="Marca-logo" >
                <i class="fas fa-fire-alt"></i>
                <p>NUTRI&FIT</p>
            </div>
            <a class="btn-atras-modificar" href="menu.php"><i class="uil uil-arrow-left"></i>Menu</a>
        </div>
<?php  
        if (isset($_SESSION["usuario"])) {
            include 'partials/menu.php';
            ?>
            <h2 class="titulo-ejercicio" >Ejercicios</h2>
            <div class="content-sport">
                        <?php 
                        
                        EjercicioControlador::listarEjercicio();
                        ?>
            
            
            </div>

</body>
</html>

                
            <?php include 'partials/footer.php';
        

        }
        else {
            header("location:login.php");
        }

       
?>