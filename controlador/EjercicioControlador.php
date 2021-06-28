<?php 
include '../modelo/Ejercicio/EjercicioDao.php';
class EjercicioControlador{
    public static function listarEjercicio()
    {
        return EjercicioDao::listarEjercicio();
    }

    public static  function listarDescripcionEjercicio($idej){
        return EjercicioDao::listarDescripcionEjercicio($idej);
    }

    
}