<?php include 'partials/header.php'   ?>
<?php  
        
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 2){
                header("location:home.php");
            }
        }else {
            header("location:vista/login.php");
        }
?>
<?php include 'partials/menu.php'   ?>