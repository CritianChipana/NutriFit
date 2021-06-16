<?php
class Conexion{
    public static function conectar(){
        try {

            $host="ec2-3-231-69-204.compute-1.amazonaws.com";
            $port="5432";
            $dbname="ddp6sltq508i7b";
            $user="mgkbkgbrrnzoto";
            $password="f977fa3eef16e58b9e020e4533dc61ad90c132118a916d6b78434522bd7bc14b";

            $cn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname",$user,$password);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (Exception $e) {
            die("Error: ".$e->getMessage());
        }

    }
}

Conexion::conectar();
