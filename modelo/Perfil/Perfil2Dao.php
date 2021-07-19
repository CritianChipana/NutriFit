<?php

include '../db/Conexion.php';
include 'Perfil2.php';

class Perfil2Dao extends Conexion{

    protected static $cnx;
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    public static function listarDatosUsuario($idej)
    {
        $query = "SELECT * FROM `historial` WHERE idhistorial = :idej";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindValue(":idej", $idej);

        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);
        if ($resultado->rowCount() > 0) {
            foreach ($filas as $filas) {
                echo 
                "<div class='contenido'>
                    <p>Peso: " . $filas-> peso . " Kg</p>
                    <p>Talla: " . $filas-> altura . " m</p>
                    <p>IMC: " . $filas-> imc . "</p>
                    <p>" . $filas-> descripcion . "</p>
                </div>";
            }
        }
    }

}


?>