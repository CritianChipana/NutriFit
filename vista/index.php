<?php include 'partials/header.php'   ?>
<?php  
        /*
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 1){
                header("location:admin.php");
            }
        }else {
            header("location:login.php");
        }*/
?>
<?php include 'partials/menu.php'   ?>
<div class="container">

    <div class="starter-template text-center" >
        <br><br><br>
        <div class="jumbotron">
            <h1 class="display-3">Nutrifit-Platillos</h1>
            <p class="lead">Lista de platillos recomendados.</p>
            <hr class="my-2">
            <?php if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"]== 1 || $_SESSION["usuario"]["idrol"]== 2)  {  ?>
            <p class="lead">
                <span class="btn btn-primary btn-lg" role="button"> Bienvenido <?php echo  $_SESSION["usuario"]["nombres"]?></span>
            </p>
            <?php } } else{ ?>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a>
            </p> 
            <?php }?>
            
            
        </div>
    </div>

</div>
<?php include 'partials/footer.php'   ?>