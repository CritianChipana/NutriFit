<?php

    include "../controlador/UsuarioControlador.php";
?>
<?php /* include 'partials/header.php'  */  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos de paciente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/modificarPaciente.css">
</head>
<body>
    <main class="contenedor-main-modificar" >
            
        <div class="Contenedor-Marca" >
            <div class="Marca-logo" >
                <i class="fas fa-fire-alt"></i>
                <p>NUTRI&FIT</p>
            </div>
            <a class="btn-atras-modificar" href="home.php"><i class="uil uil-arrow-left"></i>Menu</a>
        </div>
        <?php 
            $idusu = "";
            $idusu = $_GET["idusu"];
            if(!empty($idusu)){
                UsuarioControlador::listarusuariomod2($idusu);
            }else{
                ?>
                <h3 class="titulo-modificar" >Modificar Paciente</h3>
                
                <form class="form-Buscar-Paciente" action="#" method="post">
                    <input type="text" name="" id="">
                    <button type="submit">Buscar</button>
                </form>   
                
            <div class="conten" >
                <table class="tabla-pacientes-update table__products">
                <!-- <table class=" table__products"> -->
                    <thead class="header-tabla-pacientes" >
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
                    </thead>
                    <tbody class="body-tabla-pacientes" >
                        <?php
                        UsuarioControlador::listarusuariomod();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
        ?>
            
            <?php
        ?>

    </main>
</body>
</html>

