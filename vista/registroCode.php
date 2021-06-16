<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtusuario"]) && isset($_POST["txtpassword"])
        && isset($_POST["txtnombres"]) && isset($_POST["txtapellidos"]) && isset($_POST["txtdni"]) && isset($_POST["txtsexo"])
        && isset($_POST["txttelefono"]) && isset($_POST["txtcorreo"]) && isset($_POST["txtfecha_nacimiento"]) && isset($_POST["txtdireccion"])
        && isset($_POST["txtestado"]))
        {
            $txtusuario = validar_campo($_POST["txtusuario"]);
            $txtpassword = validar_campo($_POST["txtpassword"]);
            $txtnombres = validar_campo($_POST["txtnombres"]);
            $txtapellidos = validar_campo($_POST["txtapellidos"]);
            $txtdni = validar_campo($_POST["txtdni"]);
            $txtsexo = validar_campo($_POST["txtsexo"]);
            $txttelefono = validar_campo($_POST["txttelefono"]);
            $txtcorreo = validar_campo($_POST["txtcorreo"]);
            $txtfecha_nacimiento = validar_campo($_POST["txtfecha_nacimiento"]);
            $txtdireccion = validar_campo($_POST["txtdireccion"]);
            $txtidrol = 2;
            $txtestado = validar_campo($_POST["txtestado"]);       
            

        if(UsuarioControlador::registrar($txtusuario,$txtpassword,$txtnombres,$txtapellidos,$txtdni,$txtsexo,
        $txttelefono,$txtcorreo,$txtfecha_nacimiento,$txtdireccion,$txtidrol,$txtestado))
        {
            
            /*$_SESSION["usuario"] = array(

                "idusuario" => $usuario->getIdusuario(),
                "usuario" => $usuario->getUsuario(),
                "password" => $usuario->getPassword(),
                "nombres" => $usuario->getNombres(),
                "apellidos" => $usuario->getApellidos(),
                "dni" => $usuario->getDni(),
                "sexo" => $usuario->getSexo(),
                "telefono" => $usuario->getTelefono(),
                "correo" => $usuario->getCorreo(),
                "fecha_nacimiento" => $usuario->getFechaNacimiento(),
                "direccion" => $usuario->getDireccion(),
                "idrol" => $usuario->getIdrol(),
                "estado" => $usuario->getEstado(),

            );¨
          
             */    header("location:menu.php");
            }
           
        } 
        
    } else
    {
        header("location:registro.php?error=1");
    }
    
    

?>