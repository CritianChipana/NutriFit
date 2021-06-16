<?php
class Conexion{
    public static function conectar(){
        try {

            $host="ec2-34-193-101-0.compute-1.amazonaws.com";
            $port="5432";
            $dbname="df5v8j6cdtlken";
            $user="cvmsjpcawftkmw";
            $password="3634ff4dbd53114e5498cb60e7e51284f64a86d1fa303f11b08a160af72078b6";

            $cn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname",$user,$password);
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
