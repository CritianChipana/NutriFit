<?php include 'partials/header.php'   ?>

<?php         
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 1){
                header("location:menu.php");
            }elseif ($_SESSION["usuario"]["idrol"] == 2){
                header("location:home.php");
            }

        }
?>


<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">
    <title>NutriFit</title>
</head>
<body>
    <div class="contenedor-login-screem">

        <div class="login-screen-colum-one">
            <div class="contenedor-marca">
                <i class="fas fa-fire-alt"></i>
                <h2 class="marca-login">NUTRI&FIT</h2>
            </div>
            <form id="loginForm" action="validarCode.php" method="post">
                <div class="contenedor-login">
                    <h3 >Login</h3>
                    <!-- <label for="">Cuenta:</label> -->
                    <input type="text" name="txtusuario" required placeholder="2020230478">
                    <!-- <label for="">Contraseña:</label> -->
                    <input type="password" name="txtpassword" required placeholder="**********" >
                    <a class="link-olvide-contra" href="#">Olvide mi contraseña</a>
                    <input type="submit" value="Ingresar">
                </div>
            </form>
        </div>
    
        <div class="login-screen-colum-two">
            <h3 class="bienvenida-login" >BIENVENIDOS</h3>
            <div>
                <img class="plato-login" src="../img/Group 5.png" alt="nose">
                <img  class="platos-login" src="../img/Mask Group.png" alt="nose 2">
                <div class="fondo-verde"></div>
            </div>
        </div>
        
        <!-- <p>NUTRI&FIT</p> -->
    </div>
</body>
</html>

<!-- 
<div class="container">
    <br><br><br>
        <div class="m-0 row justify-content-center align-items-center">
            <div class="col-md-4 col-md-offset-4">
                        <form id="loginForm" action="validarCode.php" method="post" role="form">
                        <legend class="text-center">Iniciar Sesión</legend>
                        <div class="form-group ">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="txtusuario" autofocus required class="form-control" id="usuario" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="txtpassword" class="form-control" required id="password" placeholder="****">
                        </div>
                        <button type="submit" name="" id="" class="btn btn-success btn-lg btn-block">Ingresar</button>
                        </form>
            </div>
        </div>

</div> -->
<?php include 'partials/footer.php'   ?>
