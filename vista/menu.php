<!DOCTYPE html>
<html lang="en">
    <head>

    <?php session_start();?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri&Fit - Página Principal Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="menu.css">

</head>
<body>
<?php  
        
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 2){
                header("location:home.php");
            }
        }else {
            header("location:login.php");
        }
?>

    <div class="contenedor-titulo-menu" >
        <h2>BIENVENIDO ADMINISTRADOR</h2>
    </div>
    <div class="contenedor-menu contenedor" >

        <div class="contenedor-item-menu">
            <a class="link-menu" href="../vista/elim_reg_paci.html">
                <i class="fas fa-trash"></i>
                <input class=" btn_menu btn-eliminar-menu" type="button"  value="Eliminar">
            </a>
        </div>

        <div class="contenedor-item-menu">
            <a class="link-menu" href="registro.php">
                <i class="fas fa-user-plus"></i>
                <input class=" btn_menu btn-eliminar-menu" type="button"  value="Agregar">
            </a>
        </div>

        <div class="contenedor-item-menu">
            <a class="link-menu" href="#">
                <i class="fas fa-user-edit"></i>
                <input class=" btn_menu btn-eliminar-menu" type="button"  value="Modificar">
            </a>
        </div>

    </div>
<a href="cerrar-sesion.php">Cerrar Session</a>
</body>
</html>