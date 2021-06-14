<?php
include '../db/Conexion.php';
include 'Comida.php';
class ComidaDao extends Conexion{ 
    protected static $cnx;

    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar(){
        self::$cnx = null;
    }
    // Metodo que sirve para obtener un  comida
/*
    public static function obtenerComida($usuario){
        $query = "select idcomidas, nombre, ingredientes, descripcion, preparacion, imagen, video, estadofav, iddiagnostico FROM comida WHERE idcomidas = :idcomidas";
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
*/

public static function listarComida(){
    $query = "select idcomidas, nombre, ingredientes, descripcion, preparacion, imagen, video, estadofav, iddiagnostico FROM comida";
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->execute();
    $filas = $resultado->fetchAll(PDO::FETCH_OBJ);/*
    $comida = new Comida();
    $comida -> setIdcomidas($filas["idcomidas"]);
    $comida -> setNombre($filas["nombre"]);
    $comida -> setIngredientes($filas["ingredientes"]);
    $comida -> setDescripcion($filas["descripcion"]);
    $comida -> setPreparacion($filas["preparacion"]);
    $comida -> setImagen($filas["imagen"]);
    $comida -> setVideo($filas["video"]);
    $comida -> setEstadofav($filas["estadofav"]);
    $comida -> setIddiagnostico($filas["iddiagnostico"]);
    */
    if($resultado -> rowCount() > 0)   { 
        foreach($filas as $filas) { 
        echo "<tr>
        <td>".$filas -> idcomidas."</td>
        <td>".$filas -> nombre."</td>
        <td>".$filas -> ingredientes."</td>
        <td>".$filas -> descripcion."</td>
        <td>".$filas -> preparacion."</td>
        <td>".$filas -> imagen."</td>
        <td>".$filas -> video."</td>
        <td>".$filas -> estadofav."</td>
        <td>".$filas -> iddiagnostico."</td>
        <td><a href='detallecomida.php?idcomi=".$filas -> idcomidas."'>Ver Comida</a></td>
        
        </tr>";
           }
         }
}

public static function listarComidaE(){
    $query = "select idcomidas, nombre, ingredientes, descripcion, preparacion, imagen, video, estadofav, iddiagnostico FROM comida";
    self::getConexion();

    $resultado = self::$cnx->prepare($query);
    $resultado->execute();
    $filas = $resultado->fetchAll(PDO::FETCH_OBJ);/*
    $comida = new Comida();
    $comida -> setIdcomidas($filas["idcomidas"]);
    $comida -> setNombre($filas["nombre"]);
    $comida -> setIngredientes($filas["ingredientes"]);
    $comida -> setDescripcion($filas["descripcion"]);
    $comida -> setPreparacion($filas["preparacion"]);
    $comida -> setImagen($filas["imagen"]);
    $comida -> setVideo($filas["video"]);
    $comida -> setEstadofav($filas["estadofav"]);
    $comida -> setIddiagnostico($filas["iddiagnostico"]);
    */
    if($resultado -> rowCount() > 0)   { 
        foreach($filas as $filas) { 
        echo "<tr>
        <td>".$filas -> idcomidas."</td>
        <td>".$filas -> nombre."</td>
        <td>".$filas -> ingredientes."</td>
        <td>".$filas -> descripcion."</td>
        <td>".$filas -> preparacion."</td>
        <td>".$filas -> imagen."</td>
        <td>".$filas -> video."</td>
        <td>".$filas -> estadofav."</td>
        <td>".$filas -> iddiagnostico."</td>
        <td><a href='eliminarComidaCode.php?idcomi=".$filas -> idcomidas."'>Eliminar Comida</a></td>
        
        </tr>";
           }
         }
}

public static function eliminarComida($idcomi){
    $query = "delete from comida where idcomidas = :idcomida ";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindValue(":idcomida", $idcomi);
    $resultado->execute();
}

public static function detalleComida($idcomi){
    $query = "select idcomidas, nombre, ingredientes, descripcion, preparacion, imagen, video, estadofav, iddiagnostico FROM comida WHERE idcomidas = :idcomida";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    $resultado->bindValue(":idcomida", $idcomi);
    $resultado->execute();
    $filas = $resultado->fetchAll(PDO::FETCH_OBJ);/*
    $comida = new Comida();
    $comida -> setIdcomidas($filas["idcomidas"]);
    $comida -> setNombre($filas["nombre"]);
    $comida -> setIngredientes($filas["ingredientes"]);
    $comida -> setDescripcion($filas["descripcion"]);
    $comida -> setPreparacion($filas["preparacion"]);
    $comida -> setImagen($filas["imagen"]);
    $comida -> setVideo($filas["video"]);
    $comida -> setEstadofav($filas["estadofav"]);
    $comida -> setIddiagnostico($filas["iddiagnostico"]);
    */
    if($resultado -> rowCount() > 0)   { 
        foreach($filas as $filas) { 
        echo "<tr>
        <td>".$filas -> idcomidas."</td>
        <td>".$filas -> nombre."</td>
        <td>".$filas -> ingredientes."</td>
        <td>".$filas -> descripcion."</td>
        <td>".$filas -> preparacion."</td>
        <td>".$filas -> imagen."</td>
        <td>".$filas -> video."</td>
        <td>".$filas -> estadofav."</td>
        <td>".$filas -> iddiagnostico."</td>
        
        </tr>";
        
           }
         }
}

// Metodo que sirve para registrar usuarios
public static function registrarComida($comida){
    $query = "insert into comida ( nombre, ingredientes, descripcion, preparacion, imagen, video, estadofav, iddiagnostico ) values (:nombre, :ingredientes, :descripcion, :preparacion, :imagen, :video, :estadofav, :iddiagnostico )";
    self::getConexion();
    $resultado = self::$cnx->prepare($query);
    
    $resultado->bindParam(":nombre", $comida->getNombre());
    $resultado->bindParam(":ingredientes", $comida->getIngredientes());
    $resultado->bindParam(":descripcion", $comida->getDescripcion());
    $resultado->bindParam(":preparacion", $comida->getPreparacion());
    $resultado->bindParam(":imagen", $comida->getImagen());
    $resultado->bindParam(":video", $comida->getVideo());
    $resultado->bindParam(":estadofav", $comida->getEstadofav());
    $resultado->bindParam(":iddiagnostico", $comida->getIddiagnostico());

    if ($resultado->execute()){
        return true;
    }
    return false;
}
}

?>