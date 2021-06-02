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

   /* public function registrar($nombre,$email,$usuario,$password,$rol){
        $obj_usuario = new Usuario();
        $obj_usuario->setNombre($nombre);
        $obj_usuario->setEmail($email);
        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        $obj_usuario->setRol($rol);
        
        return UsuarioDao::registrar($obj_usuario);
    }*/
}

