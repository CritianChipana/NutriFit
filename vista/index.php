
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vistaHomeNutriF/indexstyle.css">
    <link rel="stylesheet" href="whatsapp.css">
    <link rel="stylesheet" href="vistaHomeNutriF/normalize.css">
    <link rel="icon" href="vistaHomeNutriF/imgs/favicon.ico">
    <title>Nutri & FIT - Inicio</title>

</head>
<body>
<script type="text/javascript">
        (function () {
            var options = {
                facebook: "100222825673082", // Facebook page ID
                whatsapp: "+51 982187783", // WhatsApp number
                call_to_action: "¡Hola! Somos Nutri&Fit", // Call to action
                button_color: "#54BF29", // Color of button
                position: "right", // Position may be 'right' or 'left'
                order: "facebook,whatsapp", // Order of buttons
                pre_filled_message: "Somos Nutri&Fit ¿En qué te podemos ayudar?", // WhatsApp pre-filled message
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>

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
                    <li><a href="https://www.facebook.com/Nutri-Fit-100222825673082" target="_BLANK"><img src="vistaHomeNutriF/imgs/logoFacebook.png" alt="logoFacebook"></a></li>
                    <li><a href="https://twitter.com/nutrifitcle" target="_BLANK"><img src="vistaHomeNutriF/imgs/logoTwitter.png" alt="logoTwitter"></a></li>
                    <li><a href="https://www.instagram.com/nutrifit01_/" target="_BLANK"><img src="vistaHomeNutriF/imgs/logoIG.png" alt="LogoInstagram"></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="content-titulo">
                <h2>Conoce nuestros servicios:</h2>
                <p>Estos tienen el objetivo de mantener tu estilo de vida saludable y balanceado.</p>
            </div>
            <section class="content-Servicios">
                <article>
                    <div class="content-texto">
                        <h3>Consulta dietética</h3>
                        <p>Te ofrecemos la posibilidad de modificar tus hábitos alimentarios y conseguir tu objetivo nutricional.</p>
                        <p>Además, respondemos tus dudas y elaboramos un patrón nutricional totalmente personalizado en colaboración contigo.</p>
                    </div>
                    <img src="vistaHomeNutriF/imgs/consultaDietetica.jpg" alt="consultaDietetica">
                </article>
                <article>
                    <div class="content-texto">
                        <h3>Coaching nutricional</h3>
                        <p>Servicio personalizado que te ayudará a conseguir de manera fácil y efectiva el objetivo deseado en relación a tu alimentación.</p>
                        <p>Te ayudarán a adoptar una nueva manera de entender tu alimentación, disfrutando de la comida de una manera sana y perdurable en el tiempo.</p>     
                    </div>
                    <img src="vistaHomeNutriF/imgs/coachingNutricional.jpg" alt="coachingNutricional">
                </article>
                <article>
                    <div class="content-texto">
                        <h3>Nutrición deportiva</h3>
                        <p>La intervención nutricional en el deporte, ha de aplicarse como apoyo al entrenamiento.</p>
                        <p>El servicio incluye asesoramiento sobre hábitos alimentarios específicos para cada tipo de deporte o situación particular.</p>
                    </div>
                    <img src="vistaHomeNutriF/imgs/nutricionDeportiva.jpg" alt="nutricionDeportiva">
                </article>
            </section>
        </main>
    </div>
</body>
</html>
