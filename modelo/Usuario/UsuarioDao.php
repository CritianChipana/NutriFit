<?php
include '../db/Conexion.php';
include 'Usuario.php';
class UsuarioDao extends Conexion{ 
    protected static $cnx;
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar(){
        self::$cnx = null;
    }

    // Metodo que sirve para validar el login
    public static function login($usuario){
        $query = "select * FROM usuario WHERE usuario = :usuario AND password = :password";
        

        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        if($resultado->rowCount() > 0 ) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario->getUsuario()
            && $filas["password"] == $usuario->getPassword()){
                return true;
            }
        }
        return false;
    }

    // Metodo que sirve para obtener un usuario
    public static function obtenerUsuario($usuario){
        $query = "select idusuario, usuario, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, idrol,direccion, estado  FROM usuario WHERE usuario = :usuario AND password = :password";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        
        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();
        $filas = $resultado->fetch();
        $usuario = new Usuario();
        $usuario -> setIdusuario($filas["idusuario"]);
        $usuario -> setUsuario($filas["usuario"]);
        $usuario -> setNombres($filas["nombres"]);
        $usuario -> setApellidos($filas["apellidos"]);
        $usuario -> setDni($filas["dni"]);
        $usuario -> setSexo($filas["sexo"]);
        $usuario -> setTelefono($filas["telefono"]);
        $usuario -> setCorreo($filas["correo"]);
        $usuario -> setFecha_nacimiento($filas["fecha_nacimiento"]);
        $usuario -> setIdrol($filas["idrol"]);
        $usuario -> setDireccion($filas["direccion"]);
        $usuario -> setEstado($filas["estado"]);

        return $usuario;

    }

    // Metodo que sirve para registrar usuarios
    public static function registrar($usuario){
        $query = "insert into usuarios ( nombre, email, usuario, password, rol ) values (:nombre, :email, :usuario, :password, :rol )";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        
        $resultado->bindParam(":nombre", $usuario->getNombre());
        $resultado->bindParam(":email", $usuario->getEmail());
        $resultado->bindParam(":usuario", $usuario->getUsuario());
        $resultado->bindParam(":password", $usuario->getPassword());
        $resultado->bindParam(":rol", $usuario->getRol());

        if ($resultado->execute()){
            return true;
        }
        return false;
    }

}

?>