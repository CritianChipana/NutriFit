<?php
class Conexion{
    public static function conectar(){
        try {

            $host="b6pbvvfgvg6pmlmniuvh-mysql.services.clever-cloud.com";
            $port="5432";
            $dbname="b6pbvvfgvg6pmlmniuvh";
            $user="uvpxa7yb3iqlm2kb";
            $password="SXyVG4tjPVFLbmdaqNYo";

            $cn = new PDO("mysql:host=$host;port=$port;dbname=$dbname",$user,$password);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (Exception $e) {
            die("Error: ".$e->getMessage());
        }

    }
}

Conexion::conectar();

?>

<?php
// class Conexion{
//     public static function conectar(){
//         try {
//             $cn = new PDO("mysql:host=localhost:3306;dbname=bdscrum","root","12345678");
//             $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             return $cn;
//         } catch (Exception $e) {
//             die("Error: ".$e->getMessage());
//         }
//     }
// }

// Conexion::conectar();
