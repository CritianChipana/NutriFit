<?php 

// funcion que sirve para validar y limpiar un campo
function validar_campo($campo){
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}

?>