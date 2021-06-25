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
        $query = "INSERT INTO usuario (usuario, password, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, direccion, idrol, estado ) 
                VALUES (:usuario, :password, :nombres, :apellidos, :dni, :sexo, :telefono, :correo, :fecha_nacimiento, :direccion, :idrol, :estado )";
        self::getConexion();
        
        $resultado = self::$cnx->prepare($query);
        
        $resultado->bindParam(":usuario", $usuario->getUsuario());
        $resultado->bindParam(":password", $usuario->getPassword());
        $resultado->bindParam(":nombres", $usuario->getNombres());
        $resultado->bindParam(":apellidos", $usuario->getApellidos());
        $resultado->bindParam(":dni", $usuario->getDni());
        $resultado->bindParam(":sexo", $usuario->getSexo());
        $resultado->bindParam(":telefono", $usuario->getTelefono());
        $resultado->bindParam(":correo", $usuario->getCorreo());
        $resultado->bindParam(":fecha_nacimiento", $usuario->getFecha_nacimiento());
        $resultado->bindParam(":direccion", $usuario->getDireccion());
        $resultado->bindParam(":idrol", $usuario->getIdrol());
        $resultado->bindParam(":estado", $usuario->getEstado());
        
        if ($resultado->execute()){
            return true;
        }
        return false;
    }

    public static function listarUsuario($where){
        $query = "select idusuario, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, direccion FROM usuario $where";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);


        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);
        if($resultado -> rowCount() > 0)   { 
            foreach($filas as $filas) { 
            echo "<tr class='contenido'>
            <td>".$filas -> idusuario."</td>
            <td>".$filas -> nombres."</td>
            <td>".$filas -> apellidos."</td>
            <td>".$filas -> dni."</td>
            <td>".$filas -> sexo."</td>
            <td>".$filas -> telefono."</td>
            <td>".$filas -> correo."</td>
            <td>".$filas -> fecha_nacimiento."</td>
            <td>".$filas -> direccion."</td>
            <td><a class='boton' href='eliminarPacienteCode.php?idpac=".$filas -> idusuario."'>Eliminar Paciente</a></td>
            
            </tr>";
               }
             }
    }

    public static function eliminarUsuario($idpac){
        $query = "DELETE FROM usuario WHERE idusuario=:idusuario";
        self::getConexion();
    
        $resultado = self::$cnx->prepare($query);
        $resultado->bindValue(":idusuario", $idpac);
        $resultado->execute();
        
       
    }
}

?>