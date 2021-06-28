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
                echo "<tr class='contenido'>
            <td>" . $filas->nombreE . "</td>
            <td>" . $filas->tipoE . "</td>
            <td>" . $filas->videoE . "</td>
            <td>" . $filas->repeticionesE . "</td>
            <td>" . $filas->cantidadE . "</td>
            <td><img src='" . $filas->imgE . "'></img></td>
            <td>" . $filas->descripcionE . "</td>
            </tr>";
            }
        }
    }
}

?>