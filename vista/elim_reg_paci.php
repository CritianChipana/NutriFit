<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start();?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="asseelim_reg_paci.css"> -->
    <link rel="stylesheet" href="assets/css/elim_reg_paci.css">
    <title>Nutri&Fit - Eliminar Registro del Paciente</title>
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">

</head>

<body>
    <?php include '../controlador/UsuarioControlador.php'; ?>
    
    <?php
    if (isset($_SESSION["usuario"])) {
    $where = "";
    if (!empty($_POST)) {
        $valor = $_POST['campo'];
        if (!empty($valor)) {
            $where = "where nombres like '%$valor%'";
        }
    }
    ?>

    <div class="contenedor-marca">
        <i class="fas fa-fire-alt"></i>
        <h2 class="marca-login">NUTRI&FIT</h2>
        <a class="boton-atras" href="../vista/menu.php">
            <i class="fas fa-arrow-circle-left"></i></i>Atrás

        </a>

    </div>
    <div class="contenedor-white ">
        <form action="elim_reg_paci.php" method="POST">
            <input type="text" name="campo" class="buscador" placeholder="¿Qué buscas">
            <!--class="buscador"-->
            <input type="submit" name="buscado" class="btn_buscar" value="Buscar">
            <!--style="background-color:red; padding: 10px;"-->
        </form>
        <!--<i class="fas fa-search"></i>-->
    </div>




    <div class="">

        <table class="tabla1" border="1">
            <tr class="fila1">
                <td>ID</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>DNI</td>
                <td>Sexo</td>
                <td>Telefono</td>
                <td>Email</td>
                <td>Fecha de Nacimiento</td>
                <td>Direccion</td>
                <td>Acción</td>
            </tr>
            <?php

            UsuarioControlador::listarUsuario($where);
            ?>


        </table>

    </div>
<?php
}else {
    header("location:login.php");
}
?>


</body>

</html>