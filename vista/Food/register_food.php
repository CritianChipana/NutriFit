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
    <link rel="stylesheet" href="../../utils/css/registerFood.css" />
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Logo -->
        <link rel="icon" href="../vistaHomeNutriF/imgs/favicon.ico">
</head>

<body>
    <?php

    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]["idrol"] == 2) {
            header("location:menu.php");
        }
    } else {
        header("location:login.php");
    }
    ?>
    <div class="container">
        <main class="register">
            <div class="register-background"></div>
            <div class="register-form">
                <form id="form-food" class="form" action="">
                    <h1 class="form-title">
                        <i class="fas fa-fire-alt"></i> Nutri Fit
                    </h1>
                    <strong class="form-description">Create food</strong>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control" id="name" name="name" placeholder="Arroz con Pollo" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="El arroz con pollo es un plato típico de América Latina y España ​ con variaciones regionales según el país. Consiste en arroz cocinado con pollo, en presas o desmechado, verduras, y sazonado con especias" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="preparation">Preparación</label>
                        <textarea class="form-control" name="preparation" id="preparation" rows="10" placeholder="El arroz con pollo es un plato típico de América Latina y España ​ con variaciones regionales según el país. Consiste en arroz cocinado con pollo, en presas o desmechado, verduras, y sazonado con especias" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredientes <i style="color: #E06C75;" class="fas fa-pepper-hot"></i> <i style="color: #FFD43B;" class="fas fa-lemon"></i></label>
                        <textarea class="form-control" name="ingredients" id="ingredients" rows="3" placeholder="3kg de Arroz, 1/2 Aceite, 1 litro de fe" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="diagnosis">Diagnóstico <i style="color: #4A416E;" class="fas fa-notes-medical"></i></label>
                        <select name="diagnosis" id="diagnosis" required>
                            <option value="" disabled selected>Selecciona un diagnóstico</option>
                            <option value="1">Cancér</option>
                            <option value="2">Sida</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="favorite">Estado de favorito <i style="color: #FFD43B;" class="far fa-star"></i></label>
                        <select name="favorite" id="favorite" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Activo</option>
                            <option value="2">Desactivado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen de Comida <i style="color: #737471;" class="fas fa-utensils"></i></label>
                        <input class="form-control" type="file" required id="image" name="image" />
                        <picture class="food-image">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Arroz-con-Pollo.jpg" alt="">
                        </picture>
                    </div>
                    <div class="form-group">
                        <label for="">Video de Preparación</label>
                        <input class="form-control" placeholder="URL de video" type="link" required />
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit">Create Food</button>
                    </div>

                </form>
            </div>
        </main>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        window.addEventListener("load", () => {
            const foodImageDiv = document.querySelector(".food-image")
            const foodImage = document.querySelector(".food-image img")
            const inputImage = document.querySelector("#image")
            const formFood = document.querySelector("#form-food")
            inputImage.addEventListener("change", (e) => {
                if (e.target.files[0] !== null) {
                    const reader = new FileReader();
                    reader.onload = () => {
                        foodImage.setAttribute("src", reader.result)
                        foodImageDiv.style.display = "flex"
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            })
            formFood.addEventListener("submit", (e) => {
                e.preventDefault()
                const name = e.target[0].value
                const description = e.target[1].value
                const preparation = e.target[2].value
                const ingredients = e.target[3].value
                const diagnosis = e.target[4].value
                const estadofav = e.target[5].value
                const file = e.target[6].files[0]
                const video = e.target[7].value
                const food = {
                    name,
                    description,
                    preparation,
                    ingredients,
                    estadofav,
                    diagnosis,
                    image: "https://app.vinglet.com/default-image.png",
                    video
                }
                // LOAD IMAGE   https://api.cloudinary.com/v1_1/akanza/image/upload
                const URI_CLOUDINARY = "https://api.cloudinary.com/v1_1/akanza/image/upload"
                const ID_CLOUDINARY = "aemwpuyr"
                const formData = new FormData()
                formData.append('file', file)
                formData.append("upload_preset", ID_CLOUDINARY)
                const createFood = async () => {
                    const foodRes = await fetch(URI_CLOUDINARY, {
                        method: "POST",
                        body: formData
                    })
                    const image = await foodRes.json()
                    food.image = image.secure_url
                    const res = await fetch("../../modelo/Comida/comida.controller.php", {
                        body: JSON.stringify(food),
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                    const data = await res.json();
                    if (data.ok === "true") {
                        Swal.fire({
                            title: 'Completado',
                            text: "Comida registrada con éxito !!",
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Volver al Home'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('../home.php');
                            }
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: data.message,
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        })
                    }
                }
                createFood()
            })
        })
    </script>
</body>

</html>