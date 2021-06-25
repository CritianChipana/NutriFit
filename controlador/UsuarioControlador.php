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
}

