<?php
class Conexion{
    public static function conectar(){
        try {
            $cn = new PDO("mysql:host=localhost:3306;dbname=bdscrum","root","admin");
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (Exception $e) {
            die("Error: ".$e->getMessage());
        }
    }

    public function getConexion(){
        try {
            $host = "localhost:3306"; 
            $db = "bdscrum"; 
            $user = "root"; 
            $password = "admin"; 
             //conexion a la base datos utilizando pdo
            $db = new PDO("mysql:host=$host;dbname=$db;", $user, $password);
            return $db;
        } catch (Exception $e) {
            die("Error: ".$e->getMessage());
        }
    }
}

Conexion::conectar();

?>