<!DOCTYPE html>
<html lang="es">

<head>

    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="../../utils/css/form_edit.css">
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>

</head>

<body>
    <?php
    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]["idrol"] == 2) {
            header("location:home.php");
        }
    } else {
        header("location:login.php");
    }
    ?>
    <div class="container">
        <main class="main">
            <header class="header">
                <h1 class="header__title">Edit your food 👩‍🍳</h1>
                <span class="header__back">
                    <a href="./edit_food.php">Go back</a>
                </span>
            </header>
            <div class="edit-form">
                <form id="form-food" class="form-food" action="">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control" id="name" name="name" placeholder="Arroz con Pollo" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="El arroz con pollo es un plato típico de América Latina y España ​ con variaciones regionales según el país. Consiste en arroz cocinado con pollo, en presas o desmechado, verduras, y sazonado con especias"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="preparation">Preparación</label>
                        <textarea class="form-control" name="preparation" id="preparation" rows="10" placeholder="El arroz con pollo es un plato típico de América Latina y España ​ con variaciones regionales según el país. Consiste en arroz cocinado con pollo, en presas o desmechado, verduras, y sazonado con especias"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredientes <i style="color: #E06C75;" class="fas fa-pepper-hot"></i> <i style="color: #FFD43B;" class="fas fa-lemon"></i></label>
                        <textarea class="form-control" name="ingredients" id="ingredients" rows="10" placeholder="3kg de Arroz, 1/2 Aceite, 1 litro de fe"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="diagnosis">Diagnóstico <i style="color: #4A416E;" class="fas fa-notes-medical"></i></label>
                        <select name="diagnosis" id="diagnosis">
                            <option value="" disabled selected>Selecciona un diagnóstico</option>
                            <option value="1">Sida</option>
                            <option value="2">Cancér</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="favorite">Estado de favorito <i style="color: #FFD43B;" class="far fa-star"></i></label>
                        <select name="favorite" id="favorite">
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Activo</option>
                            <option value="2">Desactivado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen de Comida <i style="color: #737471;" class="fas fa-utensils"></i></label>
                        <input class="form-control" type="file" id="image" name="image" />
                        <picture class="food-image">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Arroz-con-Pollo.jpg" alt="">
                        </picture>
                    </div>
                    <div class="form-group">
                        <label for="video">Video de Preparación</label>
                        <input class="form-control" id="video" name="video" placeholder="URL de video" type="link" />
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit">Edit Food</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!--SweetAler-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        "use strict"
        window.addEventListener("load", () => {
            // Capture params
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const id = urlParams.get('id');
            // Select inputs
            const nameFood = document.querySelector("#name")
            const descriptionFood = document.querySelector("#description")
            const preparationFood = document.querySelector("#preparation")
            const ingredientsFood = document.querySelector("#ingredients")
            const diagnosisFood = document.querySelector("#diagnosis")
            const favoriteFood = document.querySelector("#favorite")
            const videoFood = document.querySelector("#video")

            const foodImage = document.querySelector(".food-image img")
            const foodImageDiv = document.querySelector(".food-image")
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
            const loadFood = async () => {
                const res = await fetch("../../modelo/Comida/comida.controller.php?id=" + id)
                let food = await res.json()
                const {
                    image,
                    name,
                    description,
                    preparation,
                    ingredients,
                    preparationVideo,
                    estadofav,
                    iddiagnostico
                } = food;
                nameFood.value = name
                descriptionFood.value = description
                preparationFood.value = preparation
                ingredientsFood.value = ingredients
                favoriteFood.value = estadofav
                diagnosisFood.value = iddiagnostico
                videoFood.value = preparationVideo
                foodImage.setAttribute("src", image)
                foodImageDiv.style.display = "flex"
            }
            loadFood()
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
                    id,
                    name,
                    description,
                    preparation,
                    ingredients,
                    estadofav,
                    diagnosis,
                    image,
                    video
                }
                // LOAD IMAGE   https://api.cloudinary.com/v1_1/akanza/image/upload
                const URI_CLOUDINARY = "https://api.cloudinary.com/v1_1/akanza/image/upload"
                const ID_CLOUDINARY = "aemwpuyr"
                const formData = new FormData()
                formData.append('file', file)
                formData.append("upload_preset", ID_CLOUDINARY)
                const createFood = async () => {
                    if (file) {
                        const foodRes = await fetch(URI_CLOUDINARY, {
                            method: "POST",
                            body: formData
                        })
                        const image = await foodRes.json()
                        food.image = image.secure_url
                    } else {
                        food.image = foodImage.getAttribute("src")
                    }
                    console.log(food)
                    const res = await fetch("../../modelo/Comida/comida.controller.php", {
                        body: JSON.stringify(food),
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                    const data = await res.json();
                    console.log(data)
                    if (data.ok === "true") {
                        Swal.fire({
                            title: 'Completado',
                            text: "Comida actualizada exitosamente !!",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('./edit_food.php');
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