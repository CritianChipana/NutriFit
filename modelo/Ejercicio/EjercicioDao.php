<?php
include '../db/Conexion.php';
include 'Ejercicio.php';
class EjercicioDao extends Conexion
{
    protected static $cnx;
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    public static function listarEjercicio()
    {
        $query = "SELECT * FROM ejercicios";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);


        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);
        if ($resultado->rowCount() > 0) {
            foreach ($filas as $filas) {
                echo 
                "<div class='card-sport'>
                    <p>" . $filas->nombreE ."</p>
                    <div class='contenedor-img-ejercicio'>
                        <img src='" . $filas->imgE . "'></img>
                    </div>
                    <div>
                        <a class='boton' href='descripcion_ejercicio.php?idej=" . $filas->idejercicio . "'>Ver mas</a>
                    </div>
                </div>";
            }
        }
    }
// <a href=''></a>
    public static function listarDescripcionEjercicio($idej)
    {
        $query = "SELECT e.idejercicio, e.nombreE, e.tipoE, e.videoE, e.repeticionesE, e.cantidadE, e.imgE, e.descripcionE 
                    FROM ejercicios e 
                    WHERE idejercicio = :idej";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindValue(":idej", $idej);

        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);
        if ($resultado->rowCount() > 0) {
            foreach ($filas as $filas) {
                echo "<div class='contenido'>
                <figure><img  src='" . $filas->imgE . "' ></img></figure>
                <div class='info-ejemplos' >
            <p class='contenido-titulo'> " . $filas->nombreE . "</p>
            <p class='contenido-titulo2'><b>Tipo de Ejercicio: </b> " . $filas->tipoE . "</p><b>
            Video de referencia: </b> <a href='".$filas->videoE."'target='_blank'>Ver video</a>
            <p class='contenido-titulo3'><b>Realizar:</b> " . $filas->cantidadE . " series de " . $filas->repeticionesE .  " repeticiones</p>
            
            <p><strong></strong>" . $filas->descripcionE . "</p>
            </div>
            </div>";
            }
        }
    }
}

?>