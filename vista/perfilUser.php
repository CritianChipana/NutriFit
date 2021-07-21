
<?php

include '../controlador/PerfilControlador.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">
    <link rel="stylesheet" href="perfil/perfil.css">
    <title>Perfil</title> <!--ReactJs-->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.js" integrity="sha512-CAv0l04Voko2LIdaPmkvGjH3jLsH+pmTXKFoyh5TIimAME93KjejeP9j7wSeSRXqXForv73KUZGJMn8/P98Ifg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<?php

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["idrol"] == 1) {
        header("location:menu.php");
    }
} else {
    header("location:login.php");
}

?>
<!-- <div id="root3" ></div> -->
<?php
    
    $idusu = $_SESSION["usuario"]["id"];

?>

<div class="content-perfil">

    <div class="perfil">
        <figure class="fondoperfil">
            <img name="img-perfil" id="img-perfil" src="https://i.pinimg.com/564x/c6/aa/34/c6aa345511162e194f8394fc147e346e.jpg" alt="No se encontro imgen">
        </figure>
        <input hidden type="file" name="new-photo" id="new-photo">
        <button id="btn" class="btn" >Cambiar perfil</button>
        <div class="perfil-datos-user" >
            <div class="indice-datos" >
                <p>NOMBRE: </p>
                <p>APELLIDO: </p>
                <p>DNI: </p>
                <p>SEXO: </p>
                <p>TELEFONO: </p>
                <p>CORREO: </p>
                <p>FECHA DE NACIMIENTO: </p>
                <p>DIRECCION: </p>
                
            </div>
            <div class="indice-datos-usuario" >
                <p><?php echo $_SESSION["usuario"]["nombres" ]  ?> </p>
                <p><?php echo $_SESSION["usuario"]["apellidos" ] ?> </p>
                <p><?php echo $_SESSION["usuario"]["dni" ] ?> </p>
                <p><?php echo $_SESSION["usuario"]["sexo" ]  ?> </p>
                <p><?php echo $_SESSION["usuario"]["telefono" ]  ?> </p>
                <p><?php echo $_SESSION["usuario"]["correo" ]  ?> </p>
                <p><?php echo $_SESSION["usuario"]["fecha_nacimiento" ] ?> </p>
                <p><?php echo $_SESSION["usuario"]["direccion" ]  ?> </p>
            </div>

        </div>
        
    </div>


    <div class="contenedorperfil2">
        
        <div class="perfil-analisis-user">
            <div class="contenedor" >
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <h2 class="datosperfil-titulo" >Datos Actuales</h2>
        <div class="datosperfil">
        <?php
            Perfil2Dao :: listarDatosUsuario( $idusu );
            
        ?>  
            <div class="tablaimc">
                <div class="uno" >
                    <p>IMC[PESO (kg)/talla2 (m)]</p>
                    <p> Descripcion</p>
                </div>
                <div class="dos" >
                    <p> < 18.5 </p>
                    <p> Bajo peso </p>
                    <p> Delgado </p>
                </div>
                <div class="tres" >
                    <p> 18.5 - 24.9 </p>
                    <p> Adecuado </p>
                    <p> Aceptable </p>
                </div>
                <div class="cuatro" >
                    <p> 25.0 - 29.9 </p>
                    <p> Sobrepeso </p>
                    <p> Sobrepeso </p>
                </div>
                <div class="cinco" >
                    <p> 30.0 - 34.9 </p>
                    <p> Obesidad grado 1 </p>
                    <p> Obesidad </p>
                </div>
                <div class="seis" >
                    <p> 35.0 - 39.9 </p>
                    <p> Obesidad grado 2 </p>
                    <p> Obesidad </p>
                </div>
                <div class="siete" >
                    <p> > 40 </p>
                    <p> Obesidad grado 2 </p>
                    <p> Obesidad </p>
                </div>

            </div>    
        </div>
    </div>
 
</div>






<script src="perfil/js.js"></script>
<script src="perfil/cargtarImgen.js"></script>
<!-- <script type="text/babel" src="../Components/perfil/components/App.js"></script>
<script type="text/babel" src="../Components/perfil/Perfil.js"></script> -->

</body>
</html>