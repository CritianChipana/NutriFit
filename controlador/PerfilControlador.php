<?php

include '../modelo/Perfil/Perfil2Dao.php';

class EjercicioControlador {


    public static function listarDato($id){

        return Perfil2Dao::listarDatosUsuario($id);
    }


}


?>