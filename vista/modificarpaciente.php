<?php

    include "../controlador/UsuarioControlador.php";
?>
<?php include 'partials/header.php'   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos de paciente</title>
</head>
<body>
    <?php 
        $idusu = "";
        $idusu = $_GET["idusu"];
        if(!empty($idusu)){
    UsuarioControlador::listarusuariomod2($idusu);
    }else{
        ?>
        <h3>Paciente</h3>
        <table class="table table-dark">
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Sexo</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th></th>
        </tr>
        <?php
            UsuarioControlador::listarusuariomod();
        ?>
        </table>
        <?php
    }
    ?>
        
        <?php
    ?>
</body>
</html>

