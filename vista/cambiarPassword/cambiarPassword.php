<?php

    //FORMULARIO CAMBIO DE PASSWORD
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cambiarPassword.css">
    <link rel="icon" href="img/cambiarContraseña.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <title> Cambiar Contraseña </title>
</head>
<body>
    <?php
    
        $idusu = $_SESSION["usuario"]["id"];

    ?>
    <header class="headerCambiarContraseña">
        
        <div class="contInicio">
            <a id="inicio" href="../home.php" style="text-decoration:none"><h3>Inicio</h3></a>
        </div>

        <div class="contLogoMarca">
            <i class="fas fa-fire-alt"></i>
            <h1>Nutri&FIT</h1>
        </div>

    </header>
    
    <form action="../validarPass.php" method="POST">

        <div class="contenedorCambiarContraseña">

            <div class="contTitulo">
                <h3>Cambiar contraseña</h3>
            </div>

            <div class="contCampos">
                <input type="hidden" name = "idusuario" value="<?php echo $idusu ?>" >
                <input id="i1" type="password" name="txtpassword" required class="form-control" placeholder="Ingrese su contraseña actual">
                <input id="i2" type="password" name="nuevapass" required class="form-control" placeholder="Ingrese su nueva contraseña">
                <input id="i3" type="password" name="confirmarpass" required class="form-control" placeholder="Confirme su nueva contraseña">
            </div>

            <div class="contBotonGuardar">
                <input type="submit" value="Guardar cambios" name="editarpass">
            </div>

        </div>

    </form>
    
    <div class="contenedorImagenes">
         <img src="img/connections.png">
    </div>
    
</body>
</html>
