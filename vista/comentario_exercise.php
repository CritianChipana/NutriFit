<?php
   /* include 'partials/header.php'  
    include '../controlador/ComentarioControlador.php'; 
    include '../helps/helps.php';
    session_start();*/
       class Comentario{

            public function comentar($idejercicio){
    ?>
    <form name="formcomentarioejercicio" method="post" action="#">
        <input type="hidden" value="2" name="idpersona" id="idpersona">
        
        <label for="textarea">Escribe tu comentario:</label>
            <p>
                <textarea name="comentario" id="comentario" cols="80" rows="5" id="textarea"></textarea>
            </p>
            <p>
                <input type="submit" name="btnComentar" id="btnComentar" value="Comentar">
            </p>
    </form>

 <?php 
    

                if(isset($_POST['btnComentar'])){
                    $query = mysql_query("INSERT INTO `comentario`(`idpersona`, `idejercicio`, `comentarioCo`, `fechaCo`) VALUES ('2',$ejercicio,'Me encantó el ejercicio',CURRENT_TIMESTAMP);");
                    if($query){
                        header("Location:descripcion_ejercicio.php");
                    }
                }
            
      

            }
       }



?>