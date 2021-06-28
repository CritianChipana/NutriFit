<?php 
include '../modelo/Usuario/UsuarioDao.php';
class UsuarioControlador{
    public static function login($usuario, $password)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

        return UsuarioDao::login($obj_usuario);
    }

    public static function obtenerUsuario($usuario,$password){
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        
        return UsuarioDao::obtenerUsuario($obj_usuario);
    }

    public static function registrar($usuario,$password,$nombres,$apellidos,$dni,$sexo,
    $telefono,$correo,$fecha_nacimiento,$direccion,$idrol,$estado)
        {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        $obj_usuario->setNombres($nombres);
        $obj_usuario->setApellidos($apellidos);
        $obj_usuario->setDni($dni);
        $obj_usuario->setSexo($sexo);
        $obj_usuario->setTelefono($telefono);
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setFecha_nacimiento($fecha_nacimiento);
        $obj_usuario->setDireccion($direccion);
        $obj_usuario->setIdrol($idrol);
        $obj_usuario->setEstado($estado);

        return UsuarioDao::registrar($obj_usuario);
        }

    public static function listarUsuario($where){      

        return UsuarioDao::listarUsuario($where);
       }
   
    public static function eliminarPaciente($idpac){

        return UsuarioDao::eliminarUsuario($idpac);
    }

    public static function cambiarPassword($idUsuario,$nuevapass,$passwordOld){
        
        return UsuarioDao::cambiarPassword($idUsuario,$nuevapass,$passwordOld);
    }
    public static function modificar($idusuario,$nombres,$apellidos,$dni,$sexo,
    $telefono,$correo,$fecha_nacimiento,$direccion,$estado)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setIdusuario($idusuario);
        $obj_usuario->setNombres($nombres);
        $obj_usuario->setApellidos($apellidos);
        $obj_usuario->setDni($dni);
        $obj_usuario->setSexo($sexo);
        $obj_usuario->setTelefono($telefono);
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setFecha_nacimiento($fecha_nacimiento);
        $obj_usuario->setDireccion($direccion);
        $obj_usuario->setEstado($estado);
        return UsuarioDao::modificar($obj_usuario);
    }

    public static function listarusuariomod(){
        return UsuarioDao::listarusuariomod();
    }

    public static function listarusuariomod2($idusu){
        return UsuarioDao::listarusuariomod2($idusu);
    }
}

