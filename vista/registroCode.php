<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtnombre"])  && isset($_POST["txtemail"]) && isset($_POST["txtusuario"]) && isset($_POST["txtpassword"]) ){
        $txtnombre = validar_campo($_POST["txtnombre"]);
        $txtemail = validar_campo($_POST["txtemail"]);
        $txtusuario = validar_campo($_POST["txtusuario"]);
        $txtpassword = validar_campo($_POST["txtpassword"]);
        $txtrol = 2;
        if(UsuarioControlador::registrar($txtnombre,$txtemail,$txtusuario,$txtpassword,$txtrol)){
            
            $usuario = UsuarioControlador::obtenerUsuario($txtusuario,$txtpassword);
            $_SESSION["usuario"] = array(
                "id" => $usuario->getId(),
                "nombre" => $usuario->getNombre(),
                "usuario" => $usuario->getUsuario(),
                "email" => $usuario->getEmail(),
                "rol" => $usuario->getRol()
            );
            header("location:admin.php");
        }
    }else {
        header("location:registro.php?error=2");
    }
}else{
    header("location:registro.php?error=1");
}

?>