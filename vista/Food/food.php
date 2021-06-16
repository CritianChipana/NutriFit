<!DOCTYPE html>
<html lang="es">

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalle producto</title>
    <!--ReactJs-->
    <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <!--Babel-->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!--Stylos de index.html-->
    <link rel="stylesheet" href="../../utils/css/food.css" />
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php

    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]["idrol"] == 1) {
            header("location:menu.php");
        }
    } else {
        header("location:login.php");
    }
    ?>
    <div class="loader">
        <div class="container">
            <header class="header">
                <h1 class="header-logo">
                    <a href="../index.html"><i class="fas fa-fire-alt"></i>Nutri Fit</a>
                </h1>
                <div class="header-hamburger"><i class="fas fa-bars"></i></div>
                <nav class="header-nav">
                    <ul class="nav-list">
                        <li><a href="#preparation">Preparation</a></li>
                        <li><a href="">Exercises</a></li>
                        <li><a href="../cerrar-sesion.php">Cerrar Sesión</a></li>
                    </ul>
                </nav>
            </header>
            <main class="main">
                <div class="food">
                    <picture class="food-image">
                        <img src="https://app.vinglet.com/default-image.png" alt="default-image" />
                    </picture>
                    <div class="food-contain">
                        <h1>...</h1>
                        <h2>Descripcción</h2>
                        <p>
                            ..................................................
                            ..................................................
                        </p>
                    </div>
                </div>
            </main>
            <section id="preparation" class="preparation">
                <h3 class="preparation-title">Preparación</h3>
                <div class="preparation-contain">
                    <!--   <div class="preparation-video">
                        <iframe width="100%" height="650" src="https://www.youtube.com/embed/IoGcgmMeM0g"></iframe>
                    </div> -->
                    <div class="preparation-ingredients">
                        <h4>Ingredientes</h4>
                        <ul class="ingredients-list" id="ingredients-list">
                        </ul>
                    </div>
                    <div class="preparation-detail">
                        <h5>¡Hagámoslo!👩‍🍳👨‍🍳</h5>
                        <p>
                            Calentar la manteca y freír los trozos de carne, los ajos, las
                            cebollas, el ají y el pimentón. Salpimentar. Añadir el agua,
                            cocinar la carne e incorporar las arvejas y el choclo. Cocinar
                            hasta que esté casi a punto. Agregar el arroz, dejar hervir,
                            bajar el fuego y cocinar hasta que el arroz esté graneado.
                            Acompañar con camotes o plátanos fritos y salsa criolla (se
                            prepara con cebolla a la pluma, ají, sal, pimienta, aceite y
                            vinagre).
                        </p>
                    </div>
                </div>
            </section>
            <footer class="footer">
                <picture class="footer-wave">
                    <img src="../img/footer-wave.svg" alt="">
                </picture>
                <div class="footer-title">
                    <h5><i class="fas fa-fire-alt"></i>Nutri Fit</h5>
                </div>
                <ul class="footer-column">
                    <li>
                        <h6>Hagámoslo juntos</h6>
                    </li>
                    <li><a href="#">Trabaja con nosotros</a></li>
                    <li><a href="#">Establecimientos Partener</a></li>
                    <li><a href="#">Repartidores</a></li>
                    <li><a href="#">Nutri Fit Business</a></li>
                </ul>
                <ul class="footer-column">
                    <li>
                        <h6>Enlaces de interés</h6>
                    </li>
                    <li><a href="#">Acerca de nosotros</a></li>
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
                <ul class="footer-column">
                    <li>
                        <h6>Síguenos</h6>
                    </li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instragram</a></li>
                </ul>
                <ul class="footer-column footer-column-apps">
                    <li class="footer-column-apps__applink">
                        <a href="#">
                            <picture>
                                <img src="../../img/footer-app1.svg" alt="aplication" />
                            </picture>
                        </a>
                    </li>
                    <li class="footer-column-apps__applink">
                        <a href="#">
                            <picture>
                                <img src="../../img/footer-app.svg" alt="aplication" />
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
    <script src="../../utils/js/hamburger.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.addEventListener("load", () => {
            // Capture params
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const id = urlParams.get('id');
            // Atributes
            const imageFood = document.querySelector(".food-image img")
            const titleFood = document.querySelector(".food-contain h1")
            const desriptionFood = document.querySelector(".food-contain p")
            const preparationFood = document.querySelector(".preparation-detail p")
            const videoFood = document.querySelector(".preparation-video iframe")
            // Ingredients List
            const ingredientsList = document.querySelector("#ingredients-list")
            const loadFood = async () => {
                const res = await fetch("../../modelo/Comida/comida.controller.php?id=" + id)
                const food = await res.json()
                const {
                    image,
                    name,
                    description,
                    preparation,
                    ingredients,
                    preparationVideo
                } = food;
                imageFood.setAttribute("src", image)
                // videoFood.setAttribute("src", preparationVideo)
                titleFood.innerHTML = name
                desriptionFood.innerHTML = description
                preparationFood.innerHTML = preparation
                // Convertir string a array
                const ingredientsArray = ingredients.split(",")
                ingredientsArray.forEach((ingredient, index) => {
                    const listItem = document.createElement("li")
                    const listItemPoint = document.createElement("i")
                    listItemPoint.classList.add("fas", "fa-arrow-circle-right")
                    const listItemContent = document.createElement("span")
                    listItemContent.innerHTML = ingredient
                    listItem.appendChild(listItemPoint)
                    listItem.appendChild(listItemContent)
                    console.log(listItem)
                    ingredientsList.appendChild(listItem)
                })
            }
            loadFood()

        })
    </script>
</body>

</html>