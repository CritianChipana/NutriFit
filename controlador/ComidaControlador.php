<?php 
include '../modelo/Comida/ComidaDao.php';
class ComidaControlador{
    
    public static function obtenerComida(){
       // $obj_comida = new Usuario();
        
        return ComidaDao::listarComida();
    }

    public static function obtenerComidaE(){
        // $obj_comida = new Usuario();
         
         return ComidaDao::listarComidaE();
     }

    public static function detalleComida($idcomi){
        // $obj_comida = new Usuario();
         
         return ComidaDao::detalleComida($idcomi);
     }

     public static function eliminarComida($idcomi){
        // $obj_comida = new Usuario();
         
         return ComidaDao::eliminarComida($idcomi);
     }


    public static function registrarComida($nombre,$ingredientes,$descripcion,$preparacion,$imagen,$video,$estadofav,$iddiagnostico){
        $obj_comida = new Comida();
        $obj_comida->setNombre($nombre);
        $obj_comida->setIngredientes($ingredientes);
        $obj_comida->setDescripcion($descripcion);
        $obj_comida->setPreparacion($preparacion);
        $obj_comida->setImagen($imagen);
        $obj_comida->setVideo($video);
        $obj_comida->setEstadofav($estadofav);
        $obj_comida->setIddiagnostico($iddiagnostico);
        
        return ComidaDao::registrarComida($obj_comida);
    }
}

