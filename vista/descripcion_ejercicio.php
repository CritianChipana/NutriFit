

<?php include '../controlador/EjercicioControlador.php'; ?>

<?php include '../helps/helps.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();?>
    <title>NutriFit</title>
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets/css/des_ejer.css">
</head>




<body>
        <div class="Contenedor-Marca">
            <div class="Marca-logo" >
                <i class="fas fa-fire-alt"></i>
                <h2 class="headerL2">NUTRI&FIT</h2>
            </div>
            <div class="Marca-logo2">
                <a class="btn-atras-modificar_l" href="home.php">Home<i class="fas fa-home"></i></a> 
                <a class="btn-atras-modificar_l" href="#root">Foods<i class="fas fa-utensils"></i></a> 
                <a class="btn-atras-modificar" href="ejercicio_vista.php">Atras<i class="fas fa-arrow-circle-left"></i></a>
            </div>
            
        </div>

    <div class="contenedor-body">
        <h2 class="titulo_ejercicio">DETALLE DEL EJERCICIO</h2>
        <?php  
                $idej=$_GET['idej'];
                if (isset($_SESSION["usuario"])) {
                
                    ?>
                            <div id="mitabla">
                                <!-- <div class="cabecera">
                                    <td class="a">TITULO</td>
                                    <td class="a">TIPO</td>
                                    <td class="a">VIDEO</td>
                                    <td class="a">REPETICIONES</td>
                                    <td class="a">CANTIDAD</td>
                                    <td class="a">IMAGEN</td>
                                    <td class="a">DESCRIPCION</td>
                                </div>
                                <tr class="cabecera-2">
                                 -->
                                <?php 
                                
                                EjercicioControlador::listarDescripcionEjercicio($idej);
                                    ?>

                                </tr>
                                
                            </div>
                        </div>
                    </div>
                    <?php include 'partials/footer.php';
                

                }
                else {
                    header("location:login.php");
                }

            
        ?>


</table>


    </div>
    
</body>
</html>









