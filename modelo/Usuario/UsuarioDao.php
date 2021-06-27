<?php
include '../db/Conexion.php';
include 'Usuario.php';
class UsuarioDao extends Conexion
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

    // Metodo que sirve para validar el login
    public static function login($usuario)
    {
        $query = "select * FROM usuario WHERE usuario = :usuario AND password = :password";


        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if (
                $filas["usuario"] == $usuario->getUsuario()
                && $filas["password"] == $usuario->getPassword()
            ) {
                return true;
            }
        }
        return false;
    }

    // Metodo que sirve para obtener un usuario
    public static function obtenerUsuario($usuario)
    {
        $query = "select idusuario, usuario, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, idrol,direccion, estado  FROM usuario WHERE usuario = :usuario AND password = :password";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":usuario", $usuario->getUsuario());
        $resultado->bindValue(":password", $usuario->getPassword());

        $resultado->execute();
        $filas = $resultado->fetch();
        $usuario = new Usuario();
        $usuario->setIdusuario($filas["idusuario"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setNombres($filas["nombres"]);
        $usuario->setApellidos($filas["apellidos"]);
        $usuario->setDni($filas["dni"]);
        $usuario->setSexo($filas["sexo"]);
        $usuario->setTelefono($filas["telefono"]);
        $usuario->setCorreo($filas["correo"]);
        $usuario->setFecha_nacimiento($filas["fecha_nacimiento"]);
        $usuario->setIdrol($filas["idrol"]);
        $usuario->setDireccion($filas["direccion"]);
        $usuario->setEstado($filas["estado"]);

        return $usuario;
    }

    // Metodo que sirve para registrar usuarios
    public static function registrar($usuario)
    {
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

        if ($resultado->execute()) {
            return true;
        }
        return false;
    }

    public static function listarUsuario($where)
    {
        $query = "select idusuario, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, direccion FROM usuario $where";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);


        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);
        if ($resultado->rowCount() > 0) {
            foreach ($filas as $filas) {
                echo "<tr class='contenido'>
            <td>" . $filas->idusuario . "</td>
            <td>" . $filas->nombres . "</td>
            <td>" . $filas->apellidos . "</td>
            <td>" . $filas->dni . "</td>
            <td>" . $filas->sexo . "</td>
            <td>" . $filas->telefono . "</td>
            <td>" . $filas->correo . "</td>
            <td>" . $filas->fecha_nacimiento . "</td>
            <td>" . $filas->direccion . "</td>
            <td><a class='boton' href='eliminarPacienteCode.php?idpac=" . $filas->idusuario . "'>Eliminar Paciente</a></td>
            
            </tr>";
            }
        }
    }

    public static function eliminarUsuario($idpac)
    {
        $query = "DELETE FROM usuario WHERE idusuario=:idusuario";
        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        $resultado->bindValue(":idusuario", $idpac);
        $resultado->execute();
    }


    public static function listarusuariomod()
    {
        $query = "SELECT idusuario, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, direccion, estado FROM usuario";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);

        if ($resultado->rowCount() > 0) {
            foreach ($filas as $filas) {
                echo "<tr>
            <td>" . $filas->nombres . "</td>
            <td>" . $filas->apellidos . "</td>
            <td>" . $filas->dni . "</td>
            <td>" . $filas->sexo . "</td>
            <td>" . $filas->telefono . "</td>
            <td>" . $filas->correo . "</td>
            <td>" . $filas->fecha_nacimiento . "</td>
            <td>" . $filas->direccion . "</td>
            <td>" . $filas->estado . "</td>
            <td><a href='modificarpaciente.php?idusu=" . $filas->idusuario . "'>Modificar Usuario</a></td>
        
                </tr>";
            }
        }
    }

    public static function listarusuariomod2($idusu)
    {
        $query = "SELECT idusuario, nombres, apellidos, dni, sexo, telefono, correo, fecha_nacimiento, direccion, estado FROM usuario WHERE idusuario = :idusuario";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindValue(":idusuario", $idusu);
        $resultado->execute();
        $filas = $resultado->fetchAll(PDO::FETCH_OBJ);

        if ($resultado->rowCount() > 0) {
            foreach ($filas as $filas) {
?>
                
                <div class="m-0 row justify-content-center align-items-center">
                <div class="col-md-4 col-md-offset-4">
                <form action="modificarCode.php" method="POST" role="form">
                    <input value="<?php echo $filas->idusuario; ?>" name="txtidusuario" type="hidden">
                    <label>Nombres:</label>
                    <input type="text" name="txtnombres" placeholder="" value="<?php echo $filas->nombres; ?>"><br />
                    <label>Apellidos:</label>
                    <input type="text" name="txtapellidos" placeholder="" value="<?php echo $filas->apellidos; ?>"><br />
                    <label>DNI:</label>
                    <input type="text" name="txtdni" placeholder="" value="<?php echo $filas->dni; ?>"><br />
                    <label>Sexo:</label>
                    <input type="text" name="txtsexo" placeholder="" value="<?php echo $filas->sexo; ?>"><br />
                    <label>Telefono:</label>
                    <input type="text" name="txttelefono" placeholder="" value="<?php echo $filas->telefono; ?>"><br />
                    <label>Correo:</label>
                    <input type="text" name="txtcorreo" placeholder="" value="<?php echo $filas->correo; ?>"><br />
                    <label>Fecha de Nacimiento:</label>
                    <input type="text" name="txtfecha_nacimiento" placeholder="" value="<?php echo $filas->fecha_nacimiento; ?>"><br />
                    <label>Direccion:</label>
                    <input type="text" name="txtdireccion" placeholder="" value="<?php echo $filas->direccion; ?>"><br />
                    <label>Estado:</label>
                    <input type="text" name="txtestado" placeholder="" value="<?php echo $filas->estado; ?>"><br />
                    <button name="actualizar" type="submit">Actualizar Registro</button>
                </form>
                </div></div>
<?php
            }
        }
    }

    public static function modificar($usuario){
        $query = "UPDATE usuario SET nombres = :nombres, apellidos = :apellidos, dni = :dni, sexo = :sexo, telefono = :telefono, correo = :correo, fecha_nacimiento= :fecha_nacimiento, direccion= :direccion, estado= :estado WHERE idusuario = :idusuario";
        self::getConexion();
        
        $resultado = self::$cnx->prepare($query);
        
        $resultado->bindParam(':idusuario',$usuario->getIdusuario());
        $resultado->bindParam(":nombres", $usuario->getNombres());
        $resultado->bindParam(":apellidos", $usuario->getApellidos());
        $resultado->bindParam(":dni", $usuario->getDni());
        $resultado->bindParam(":sexo", $usuario->getSexo());
        $resultado->bindParam(":telefono", $usuario->getTelefono());
        $resultado->bindParam(":correo", $usuario->getCorreo());
        $resultado->bindParam(":fecha_nacimiento", $usuario->getFecha_nacimiento());
        $resultado->bindParam(":direccion", $usuario->getDireccion());
        $resultado->bindParam(":estado", $usuario->getEstado());
        
        

        if ($resultado->execute()){
            return true;
        }
        return false;
        /* if($resultado->rowCount() > 0)
        {
        $count = $resultado -> rowCount();
        echo "Gracias: $count registro ha sido actualizado";
        }
        else{
            echo "No se pudo actulizar el registro";
        
        print_r($resultado->errorInfo()); 
        }
        }*/
    }

    public static function cambiarPassword($password,$nuevapass)
    {
        $query = "UPDATE usuario SET password=:nuevapass WHERE password=:password";
        self::getConexion();
        $resultado = self::$cnx->prepare($query); 
        $resultado->bindValue(":password", $password);
        $resultado->bindValue(":nuevapass", $nuevapass);
        //$resultado->execute();

        if ($resultado->execute()){
            return true;
        }
        return false;

    }
}

?>