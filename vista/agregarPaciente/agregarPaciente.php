<!DOCTYPE html>
<html lang="es">
<head>

<?php session_start(); ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- <link rel="icon" href="imgs/favicon.ico" > -->
    <link rel="stylesheet" href="agregarPaciente.css">
    <title>Agregar Paciente</title>
    <link rel="icon" href="../vistaHomeNutriF/imgs/favicon.ico">

</head>
<body>

<?php

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["idrol"] == 2) {
        header("location:menu.php");
    }
} else {
    header("location:login.php");
}
?>

    <header class="content-header">
        <div class="content-Logo">
            <i class="fas fa-fire-alt"></i>
            <h1>Nutri&FIT</h1>
        </div>
        <div class="content-Inicio">
            <a href="../menu.php" style="text-decoration:none"><h2>Inicio</h2></a>
        </div>
    </header>
    <section class="content-contenido">
    <form action="./../../vista/registroCode.php" method="POST" role="form">
            <div class="content-form_agregar_paciente">
                <h3>AGREGAR PACIENTE</h3>
                <div class="content-campos">
                    <input class="campo" id="c1" type="text" name="txtusuario" autofocus required class="form-control" id="usuario" placeholder="Ingrese usuario"> 
                    <input class="campo" id="c2" type="password" name="txtpassword" autofocus required class="form-control" id="password" placeholder="Ingrese password">
                    <input class="campo" id="c3" type="text" name="txtnombres" autofocus required class="form-control" id="nombres" placeholder="Ingrese nombres">
                    <input class="campo" id="c4" type="text" name="txtapellidos" autofocus required class="form-control" id="apellidos" placeholder="Ingrese apellidos">
                    <input class="campo" id="c5" type="text" name="txtdni" required class="form-control" id="dni" placeholder="Ingrese DNI">
                    <input class="campo" id="c6" type="text" name="txtsexo" required class="form-control" id="sexo" placeholder="Ingrese Sexo">
                    <input class="campo" id="c7" type="text" name="txttelefono" required class="form-control" id="telefono" placeholder="Telefono" >
                    <input class="campo" id="c8" type="email" name="txtcorreo" required class="form-control" id="telefono" placeholder="Correo">
                    <input class="campo" id="c9" type="date" name="txtfecha_nacimiento" required class="form-control" id="fecha_nacimiento"placeholder="Ingrese fecha de nacimiento (DD/MM/AAAA)" >
                    <input class="campo" id="c10" type="text" name="txtdireccion" required class="form-control" id="direccion" placeholder="Ingrese dirección" >
                    <input class="campo" id="c11" type="text" name="txtestado" required class="form-control" id="estado" placeholder="Ingrese estado" >
                    <!--
                    <input class="campo" id="c12" type="text" name="rol" placeholder="Ingrese rol" >
                    <input class="campo" id="c13" type="text" name="diagnostico" placeholder="Ingrese diagnóstico" >
                    -->
                    <input class="btnRegistrar" type="submit" name="btnRegistrar" value="Registrar">
                </div>
            </div>
        </form>
        <div class="content-imagen">
            <img src="imgs/pacientes.png" alt="imgPacientes" >
        </div>
    </section>

</body>
</html>