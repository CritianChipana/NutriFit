
<?php include '../controlador/ComidaControlador.php'; ?>
<?php session_start();?>
<?php include '../helps/helps.php';?>
<?php  
        $idcomi=$_GET['idcomi'];
        if (isset($_SESSION["usuario"])) {
            
            if(ComidaControlador::eliminarComida($idcomi)){
           
                header("location:eliminarComida.php");
            }else{
                header("location:eliminarComida.php");
            }           
            
        

        }
        else {
            header("location:login.php");
        }

       
?>
