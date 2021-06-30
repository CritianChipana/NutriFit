<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vistaHomeNutriF/indexstyle.css">
    <link rel="stylesheet" href="vistaHomeNutriF/normalize.css">
    <link rel="stylesheet" href="contacto/contacto.css">
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">
    <title>Nutri & FIT - Inicio</title>

</head>
<body>
    <img class="eclipse1" src="vistaHomeNutriF/imgs/Ellipse 1.png" alt="elipsenaranja">
    <img class="eclipse2" src="vistaHomeNutriF/imgs/Ellipse 2.png" alt="elipseverde">
    <div class="contenido">
        <header>
            <div class="content-Marca">
                <h1>NUTRI&FIT</h1>
                <img src="vistaHomeNutriF/imgs/logo.png" alt="logoNutri&FIT">
            </div>
            <nav class="content-navBar">
                <ul>
                    <li><a href="index.php" style="text-decoration:none" class="content-navBar--active">Inicio</a></li>
                    <li><a href="contacto.php" style="text-decoration:none" class="content-navBar--noactive">Contacto</a></li>
                    <li><a href="login.php" style="text-decoration:none" class="content-navBar--noactive">Login</a></li>
                </ul>
            </nav>
            <nav class="content-navRedes">
                <ul>
                    <li><a href="https://www.facebook.com/" target="_BLANK"><img src="vistaHomeNutriF/imgs/logoFacebook.png" alt="logoFacebook"></a></li>
                    <li><a href="https://twitter.com/" target="_BLANK"><img src="vistaHomeNutriF/imgs/logoTwitter.png" alt="logoTwitter"></a></li>
                    <li><a href="https://www.instagram.com/" target="_BLANK"><img src="vistaHomeNutriF/imgs/logoIG.png" alt="LogoInstagram"></a></li>
                </ul>
            </nav>
        </header>
        <main>

            <div class="content-titulo">
                <h2>Teléfonos</h2>
                <p>Lima: (01) 635-5000</p>
                <h2>Dirección</h2>
                <p>Mz L Lt 17, Villa el Salvador 15834 Lunes a sábado de 8:00 am a 6:00 pm.</p>

            </div>





            <section class="content-Servicios">
                <article>
                    <div class="content-texto">

                        <p>Deja tus datos y consulta aquí, y nos comunicaremos contigo.</p>
                        <h4>Todos los campos marcados (*) son obligatorios:</h4>
                  <!--      <h3>Consulta dietética</h3>-->

                  <label class="required al" name="lblnom">Nombre: * <input class="textpri a" type="text" name="txtnom" required placeholder="Luis"></label>
                  
                  <label class="required bl" name="lblape">Apellidos: * <input class="textpri b" type="text" name="txtape" required placeholder="Fonseca Díaz"></label>
                  
                  <label class="required cl" name="lblema">Email: * <input class="textpri c" type="text" name="txtema" required placeholder="ejemplo@gmail.com"></label>
                  
                  <label class="required dl" name="lblema">Teléfono: * <input class="textpri d" type="text" name="txttel" required placeholder="986523458"></label>
                  
                  <label class="required el" name="lblema">Consulta: * </label>
                  <textarea class="textare e" name="txtema" required placeholder="Deja tu consulta aquí..."></textarea>
                    <br/>


                    <label class="fl"><input class="requerid f" type="checkbox" name="acepto" value="Acepto">He leído y acepto los términos del <a href="https://hara.grupolar.pe/pdf/terminos-de-uso-y-politica-de-privacidad-web-hara.pdf">Aviso de privacidad</a></label>
                  <input class="button" type="submit" value="ENVIAR">


                    </div>
                </article>
                
            </section>
        </main>
    </div>
</body>
</html>
