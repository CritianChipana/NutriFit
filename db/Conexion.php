<?php
class Conexion{
    public static function conectar(){
        try {
            $cn = new PDO("mysql:host=localhost:3306;dbname=bdscrum","root","12345678");
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (Exception $e) {
            die("Error: ".$e->getMessage());
        }

    }
}

Conexion::conectar();
