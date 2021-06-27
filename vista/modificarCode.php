<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['actualizar'])){
        $txtidusuario = validar_campo($_POST["txtidusuario"]);
        $txtnombres = validar_campo($_POST["txtnombres"]);
        $txtapellidos = validar_campo($_POST["txtapellidos"]);
        $txtdni = validar_campo($_POST["txtdni"]);
        $txtsexo = validar_campo($_POST["txtsexo"]);
        $txttelefono = validar_campo($_POST["txttelefono"]);
        $txtcorreo = validar_campo($_POST["txtcorreo"]);
        $txtfecha_nacimiento = validar_campo($_POST["txtfecha_nacimiento"]);
        $txtdireccion = validar_campo($_POST["txtdireccion"]);
        $txtestado = validar_campo($_POST["txtestado"]);
        
        if(UsuarioControlador::modificar($txtidusuario,$txtnombres,$txtapellidos,$txtdni,$txtsexo,
        $txttelefono,$txtcorreo,$txtfecha_nacimiento,$txtdireccion,$txtestado)){
            header("location:modificarpaciente.php");
        }
    }
}

?>