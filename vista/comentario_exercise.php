<?php
    include 'partials/header.php'  
    include '../controlador/ComentarioControlador.php'; 
    include '../helps/helps.php';
    session_start();
       
?>

<html>

<body>
    <form name="form1" method="post" action="">
        <label for="textarea">Escribe tu comentario:</label>
            <p>
                <textarea name="comentario" cols="80" rows="5" id="textarea"></textarea>
            </p>
            <p>
                <input type="submit" name="comentar" value="Comentar">
            </p>
    </form>
</body>


</html>


<?php

    if(isset($_POST['comentar'])){
        $query = mysql_query("INSERT INTO comentarioe(idpersona,idejercicio,comentarioE,fechaE) 
        VALUES ('".$_SESSION['idusuario']."', '".$_POST['idejercicio']."', '".$_POST['comentario']."', NOW());")

        if($query){
            header("Location:descripcion_ejercicio.php")
        }
    }

?>