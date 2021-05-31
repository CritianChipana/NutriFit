<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();
header('Content-type: application/json');
$resultado = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtusuario"]) && isset($_POST["txtpassword"])){

        $txtusuario = validar_campo($_POST["txtusuario"]);
        $txtpassword = validar_campo($_POST["txtpassword"]);
    
        $resultado = array("estado" => "true");
        if(UsuarioControlador::login($txtusuario,$txtpassword)){
            
            $usuario = UsuarioControlador::obtenerUsuario($txtusuario,$txtpassword);
            $_SESSION["usuario"] = array(
                "id" => $usuario->getIdusuario(),
                "usuario" => $usuario->getUsuario(),
                "nombres" => $usuario->getNombres(),
                "apellidos" => $usuario->getApellidos(),
                "dni" => $usuario->getDni(),
                "sexo" => $usuario->getSexo(),
                "telefono" => $usuario->getTelefono(),
                "correo" => $usuario->getCorreo(),
                "fecha_nacimiento" => $usuario->getFecha_nacimiento(),
                "direccion" => $usuario->getDireccion(),
                "idrol" => $usuario->getIdrol(),
                "estado" => $usuario->getEstado(),
                /*"rol" => $usuario->getRol(),
                $usuario -> setIdusuario($filas["idusuario"]);
                $usuario -> setUsuario($filas["usuario"]);
                $usuario -> setNombres($filas["nombres"]);
                $usuario -> setApellidos($filas["apellidos"]);
                $usuario -> setDni($filas["dni"]);
                $usuario -> setSexo($filas["sexo"]);
                $usuario -> setTelefono($filas["telefono"]);
                $usuario -> setCorreo($filas["correo"]);
                $usuario -> setFecha_nacimiento($filas["fecha_nacimiento"]);
                $usuario -> setCorreo($filas["idrol"]);
                $usuario -> setDireccion($filas["direccion"]);
                $usuario -> setEstado($filas["estado"]);*/
            );
            return print(json_encode($resultado));

        }
    }
}
$resultado = array("estado" => "false");
return print(json_encode($resultado));
echo $resultado;
?>