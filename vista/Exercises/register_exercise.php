<!DOCTYPE html>
<html lang="es-PE">

<head>
    <?php session_start(); ?>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrar Ejercicio</title>
    <!--ReactJs-->
    <script crossorigin src="https://unpkg.com/react@17/umd/react.production.min.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@17/umd/react-dom.production.min.js"></script>
    <!--Babel-->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!--Stylos de index.html-->
    <link rel="stylesheet" href="../../utils/css/registerExercises.css" />
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
                <form id="form-exercise" class="form" action="">
                    <h1 class="form-title">
                        <i class="fas fa-fire-alt"></i> Nutri Fit
                    </h1>
                    <strong class="form-description">Create Exercises</strong>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control" id="name" name="name" placeholder="Nombre de ejercicio" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo de Ejercicio</label>
                        <input class="form-control" id="type" name="type" placeholder="Tipo de ejercicio" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <input class="form-control" id="video" name="video" placeholder="Url del video del ejercicio" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción de Ejercicio</label>
                        <textarea class="form-control" name="description" id="description" rows="5" placeholder="Descripción del ejercicio" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duración</label>
                        <input class="form-control" id="duration" name="duration" placeholder="Duración del ejercicio" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="series">Series</label>
                        <input class="form-control" id="series" name="series" placeholder="Cantidad de series" type="number" required />
                    </div>
                    <div class="form-group">
                        <label for="repeatxserie">Repeticiones Por Serie</label>
                        <input class="form-control" id="repeatxserie" name="repeatxserie" placeholder="Cantidad de repeticiones por serie" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen de Ejercicio</label>
                        <input class="form-control" type="file" required id="image" name="image" />
                        <picture class="exercise-image">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Arroz-con-Pollo.jpg" alt="">
                        </picture>
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit">Crear Ejercicio</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        window.addEventListener("load", () => {
            const exerciseImageDiv = document.querySelector(".exercise-image")
            const exerciseImage = document.querySelector(".exercise-image img")
            const inputImage = document.querySelector("#image")
            const formExercise = document.querySelector("#form-exercise")
            inputImage.addEventListener("change", (e) => {
                if (e.target.files[0] !== null) {
                    const reader = new FileReader();
                    reader.onload = () => {
                        exerciseImage.setAttribute("src", reader.result)
                        exerciseImageDiv.style.display = "flex"
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            })
            formExercise.addEventListener("submit", (e) => {
                e.preventDefault()
                console.log(e.target)
                const name = e.target[0].value
                const type = e.target[1].value
                const video = e.target[2].value
                const description = e.target[3].value
                const duration = e.target[4].value
                const series = e.target[5].value
                const repeatxserie = e.target[6].value
                const file = e.target[7].files[0]
                const exercise = {
                    name,
                    type,
                    video,
                    description,
                    duration,
                    series,
                    repeatxserie,
                    image: "https://app.vinglet.com/default-image.png",
                }
                // LOAD IMAGE   https://api.cloudinary.com/v1_1/akanza/image/upload
                const URI_CLOUDINARY = "https://api.cloudinary.com/v1_1/akanza/image/upload"
                const ID_CLOUDINARY = "aemwpuyr"
                const formData = new FormData()
                formData.append('file', file)
                formData.append("upload_preset", ID_CLOUDINARY)
                const createExercise = async () => {
                    const exerciseRes = await fetch(URI_CLOUDINARY, {
                        method: "POST",
                        body: formData
                    })
                    const image = await exerciseRes.json()
                    exercise.image = image.secure_url
                    const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php", {
                        body: JSON.stringify(exercise),
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                    const data = await res.json();
                    if (data.ok === "true") {
                        Swal.fire({
                            title: 'Completado',
                            text: "Ejercicio registrado con éxito !!",
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
                createExercise()
            })
        })
    </script>
</body>

</html>