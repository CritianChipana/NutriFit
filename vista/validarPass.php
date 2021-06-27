<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();
header('Content-type: application/json');
$resultado = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["editarpass"])){
        $txtpassword=validar_campo($_POST["txtpassword"]);
        $nuevapass= validar_campo($_POST["nuevapass"]);
        $confirmarpass=validar_campo($_POST["confirmarpass"]);

        if(UsuarioControlador::cambiarPassword($txtpassword,$nuevapass))
        {
            header("location:cambiarPassword/exitocambiarpass.php");
        }else{
            header("location:cambiarPassword/exitocambiarpass.php");
        }           
        
    }

    }
    else {
        header("location:login.php");
    }

?>
