<!DOCTYPE html>
<html lang="es">
  <head>
    <?php session_start();?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--ReactJs-->
    <script
      crossorigin
      src="https://unpkg.com/react@17/umd/react.production.min.js"
    ></script>
    <script
      crossorigin
      src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"
    ></script>
    <!--Babel-->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!--Stylos de index.html-->
    <link rel="stylesheet" href="../utils/css/home.css" />
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <!--FontAwasome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Nutri Fit</title>
  </head>
  <body>

    <?php  
        
        if (isset($_SESSION["usuario"])) {
            if ($_SESSION["usuario"]["idrol"] == 1){
                header("location:menu.php");
            }
        }else {
            header("location:login.php");
        }
?>

    <div class="loader">
      <div class="container">
        <header class="header">
          <h1 class="header-logo">
            <a href="index.html"><i class="fas fa-fire-alt"></i>Nutri Fit</a>
          </h1>
          <div class="header-hamburger"><i class="fas fa-bars"></i></div>
          <nav class="header-nav">
            <ul class="nav-list">
              <li><a href="">Home</a></li>
              <li><a href="">Exercises</a></li>
              <li><a href="cerrar-sesion.php">Cerrar Session</a></li>
            </ul>
          </nav>
        </header>
        <main class="main">
          <h2 class="main-title"><i class="fas fa-fire-alt"></i>Nutri Fit</h2>
          <!-- <div id="root"></div>  -->
          <div class="main-info">
            <div class="info-title">
              <picture class="info-title__hands">
                <i class="far fa-handshake"></i>
              </picture>
              <h3 class="info-title__text">Hagámoslo juntos</h3>
            </div>
            <section class="info-cards">
              <article class="info-cards__card">
                <picture class="card-img">
                  <img src="../img/chef.png" alt="" />
                </picture>
                <h4 class="card-title">Conviértete en Partner</h4>
                <p class="card-description">
                  ¡Crece con Glovo! ¡Nuestra tecnología y nuestra base de
                  usuarios pueden ayudarte a impulsar las ventas y encontrar
                  nuevas oportunidades!
                </p>
                <div class="card-button">
                  <a href="">Únete a nosotros</a>
                </div>
              </article>
              <article class="info-cards__card">
                <picture class="card-img">
                  <img src="../img/chef.png" alt="" />
                </picture>
                <h4 class="card-title">Conviértete en Partner</h4>
                <p class="card-description">
                  ¡Crece con Glovo! ¡Nuestra tecnología y nuestra base de
                  usuarios pueden ayudarte a impulsar las ventas y encontrar
                  nuevas oportunidades!
                </p>
                <div class="card-button">
                  <a href="">Únete a nosotros</a>
                </div>
              </article>
              <article class="info-cards__card">
                <picture class="card-img">
                  <img src="../img/chef.png" alt="" />
                </picture>
                <h4 class="card-title">Conviértete en Partner</h4>
                <p class="card-description">
                  ¡Crece con Glovo! ¡Nuestra tecnología y nuestra base de
                  usuarios pueden ayudarte a impulsar las ventas y encontrar
                  nuevas oportunidades!
                </p>
                <div class="card-button">
                  <a href="">Únete a nosotros</a>
                </div>
              </article>
            </section>
          </div>
        </main>
        <footer class="footer">
          <picture class="footer-wave">
            <img src="../img/footer-wave.svg" alt="" />
          </picture>
          <div class="footer-title">
            <h5><i class="fas fa-fire-alt"></i>Nutri Fit</h5>
          </div>
          <ul class="footer-column">
            <li><h6>Hagámoslo juntos</h6></li>
            <li><a href="#">Trabaja con nosotros</a></li>
            <li><a href="#">Establecimientos Partener</a></li>
            <li><a href="#">Repartidores</a></li>
            <li><a href="#">Nutri Fit Business</a></li>
          </ul>
          <ul class="footer-column">
            <li><h6>Enlaces de interés</h6></li>
            <li><a href="#">Acerca de nosotros</a></li>
            <li><a href="#">Preguntas frecuentes</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contacto</a></li>
          </ul>
          <ul class="footer-column">
            <li><h6>Síguenos</h6></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Instragram</a></li>
          </ul>
          <ul class="footer-column footer-column-apps">
            <li class="footer-column-apps__applink">
              <a href="#">
                <picture>
                  <img src="../img/footer-app1.svg" alt="aplication" />
                </picture>
              </a>
            </li>
            <li class="footer-column-apps__applink">
              <a href="#">
                <picture>
                  <img src="../img/footer-app.svg" alt="aplication" />
                </picture>
              </a>
            </li>
            <li class="footer-column-apps__link">
              <a href="#">CONDICIONES DE USO</a>
            </li>
            <li class="footer-column-apps__link">
              <a href="#">POLÍTICA DE PRIVACIDAD</a>
            </li>
            <li class="footer-column-apps__link">
              <a href="#">POLÍTICA DE COOKIES</a>
            </li>
          </ul>
        </footer>
      </div>
    </div>
    <script class="text/javascript" src="../utils/js/hamburger.js"></script>
    <script type="text/babel" src="../utils/js/components/App.js"></script>
    <script type="text/babel" src="../utils/js/home.js"></script>
  </body>
</html>
