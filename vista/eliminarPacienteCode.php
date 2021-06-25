
<?php include '../controlador/UsuarioControlador.php'; ?>
<?php session_start();?>
<?php include '../helps/helps.php';?>
<?php  
        $idpac=$_GET['idpac'];
        if (isset($_SESSION["usuario"])) {
            
            if(UsuarioControlador::eliminarPaciente($idpac)){
           
                header("location:eliminar_exito.php");
            }else{
                header("location:eliminar_exito.php");
            }           
            
        

        }
        else {
            header("location:login.php");
        }

       
?>
