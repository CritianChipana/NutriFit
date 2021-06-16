<!DOCTYPE html>
<html lang="en">

<head>

    <?php session_start(); ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri&Fit - Página Principal Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/menu.css">
    <link rel="stylesheet" href="./Components/Style/navBar.css">
    <link rel="stylesheet" href="./Components/Style/nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
    <?php

    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]["idrol"] == 2) {
            header("location:home.php");
        }
    } else {
        header("location:login.php");
    }
    ?>

    <?php include("./Components/Nav.php");  ?>

    <div class="contenedor-home-admi">
        <?php include("./Components/NavBar.php");  ?>
        <div class="asd">

            <div class="contenedor-titulo-menu">
                <h2>BIENVENIDO ADMINISTRADOR</h2>
            </div>
            <div class="contenedor-titulo-menu">
                <h4>Pacientes:</h4>
            </div>
            <div class="contenedor-menu contenedor">

                <?php
                // $contador = 0;
                // if( $contador==0 ){
                //     include_once("./Components/CrudPasiente.php");
                // }else if( $contador==1 ){
                //     include_once( "./Components/CrudComida.php" );
                // }
                ?>

                <div class="contenedor-item-menu">
                    <a class="link-menu" href="../vista/elim_reg_paci.html">
                        <i class="fas fa-trash"></i>
                        <input class=" btn_menu btn-eliminar-menu" type="button" value="Eliminar">
                    </a>
                </div>

                <div class="contenedor-item-menu">
                    <a class="link-menu" href="registro.php">
                        <i class="fas fa-user-plus"></i>
                        <input class=" btn_menu btn-eliminar-menu" type="button" value="Agregar">
                    </a>
                </div>

                <div class="contenedor-item-menu">
                    <a class="link-menu" href="#">
                        <i class="fas fa-user-edit"></i>
                        <input class=" btn_menu btn-eliminar-menu" type="button" value="Modificar">
                    </a>
                </div>

            </div>

            <!-- ****************************************************************************************** -->
            <!-- /////////////////////////////////////////////////// COMIDAS -->

            <div class="contenedor-titulo-menu">
                <h4>Comidas:</h4>
            </div>
            <div class="contenedor-menu contenedor">

                <div class="contenedor-item-menu">
                    <a class="link-menu" href="eliminarComida.php">
                        <i class="fas fa-trash"></i>
                        <input class=" btn_menu btn-eliminar-menu" type="button" value="Eliminar">
                    </a>
                </div>

                <div class="contenedor-item-menu">
                    <a class="link-menu" href="Food/register_food.php">
                        <i class="fas fa-apple-alt"></i>
                        <input class=" btn_menu btn-eliminar-menu" type="button" value="Agregar">
                    </a>
                </div>

                <div class="contenedor-item-menu">
                    <a class="link-menu" href="#">
                        <i class="uil uil-apple"></i>
                        <input class=" btn_menu btn-eliminar-menu" type="button" value="Modificar">
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="./Components/js/navBar.js"></script>
</body>

</html>