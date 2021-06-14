<?php

include '../controlador/ComidaControlador.php';
include '../helps/helps.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtnombre"])  && isset($_POST["txtingredientes"]) && isset($_POST["txtdescripcion"]) && isset($_POST["txtpreparacion"])&& isset($_POST["txtimagen"]) && isset($_POST["txtvideo"]) && isset($_POST["txtiddiagnostico"]) ){
        $txtnombre = validar_campo($_POST["txtnombre"]);
        $txtingredientes = validar_campo($_POST["txtingredientes"]);
        $txtdescripcion = validar_campo($_POST["txtdescripcion"]);
        $txtpreparacion = validar_campo($_POST["txtpreparacion"]);
        $txtimagen = validar_campo($_POST["txtimagen"]);
        $txtvideo = validar_campo($_POST["txtvideo"]);
        $txtestadofav = 0;
        $txtiddiagnostico = validar_campo($_POST["txtiddiagnostico"]);
        if(ComidaControlador::registrarComida($txtnombre,$txtingredientes,$txtdescripcion,$txtpreparacion,$txtimagen,$txtvideo,$txtestadofav,$txtiddiagnostico)){
           
            header("location:listarcomidas.php");
        }
    }else {
        header("location:registroComida.php?error=2");
    }
}else{
    header("location:registroComida.php?error=1");
}

?>