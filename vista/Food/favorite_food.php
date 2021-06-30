
<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--ReactJs-->
    <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <!--Babel-->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!--Typed js-->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <!--Stylos de index.html-->
    <link rel="stylesheet" href="../Components/Style/favorite_foot.css" />
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">
    <title>Platos Favoritos</title> <!--ReactJs-->
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
     <div class="Contenedor-Marca" >
        <div class="Marca-logo" >
            <i class="fas fa-fire-alt"></i>
            <p>NUTRI&FIT</p>
        </div>
        <a class="btn-atras-modificar" href="../menu.php"><i class="uil uil-arrow-left"></i>Menu</a>
    </div>

    <div class="conteiner-food-favorite">
        <div class="food-favorite" >
            <div id="root2" class="content-favorite-foot" ></div>
        </div>
    </div>

    <!-- <script class="text/javascript" src="../Components/js/hamburger.js"></script> -->
    <script type="text/babel" src="../Components/js/components/App.js"></script>
    <script type="text/babel" src="../Components/js/home.js"></script>

</body>
</html>
