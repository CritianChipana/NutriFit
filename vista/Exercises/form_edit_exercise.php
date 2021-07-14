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
    <title>Edit Form</title>

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
                <h1 class="header__title">Edit your exercise 👩‍🍳</h1>
                <span class="header__back">
                    <a href="./edit_exercise.php">Go back</a>
                </span>
            </header>
            <div class="edit-form">
                <form id="form-exercise" class="form-exercise" action="">
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
                        <input class="form-control" type="file" id="image" name="image" />
                        <picture class="exercise-image">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/Arroz-con-Pollo.jpg" alt="">
                        </picture>
                    </div>
                    <div class="form-group">
                        <button class="btn" type="submit">Edit Exercise</button>
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
            const nameExercise = document.querySelector("#name")
            const typeExercise = document.querySelector("#type")
            const videoExercise = document.querySelector("#video")
            const descriptionExercise = document.querySelector("#description")
            const durationExercise = document.querySelector("#duration")
            const seriesExercise = document.querySelector("#series")
            const repeatSerieExercise = document.querySelector("#repeatxserie")

            const exerciseImage = document.querySelector(".exercise-image img")
            const exerciseImageDiv = document.querySelector(".exercise-image")
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
            const loadExercises = async () => {
                const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php?id=" + id)
                let exercise = await res.json()
                const {
                    name,
                    type,
                    video,
                    description,
                    duration,
                    series,
                    repeatxserie,
                    image
                } = exercise;
                nameExercise.value = name
                typeExercise.value = type
                videoExercise.value = video
                descriptionExercise.value = description
                durationExercise.value = duration
                seriesExercise.value = series
                repeatSerieExercise.value = repeatxserie
                exerciseImage.setAttribute("src", image)
                exerciseImageDiv.style.display = "flex"
            }
            loadExercises()
            formExercise.addEventListener("submit", (e) => {
                e.preventDefault()
                const name = e.target[0].value
                const type = e.target[1].value
                const video = e.target[2].value
                const description = e.target[3].value
                const duration = e.target[4].value
                const series = e.target[5].value
                const repeatxserie = e.target[6].value
                const file = e.target[7].files[0]
                const exercise = {
                    id,
                    name,
                    type,
                    video,
                    description,
                    duration,
                    series,
                    repeatxserie,
                    image
                }
                // LOAD IMAGE   https://api.cloudinary.com/v1_1/akanza/image/upload
                const URI_CLOUDINARY = "https://api.cloudinary.com/v1_1/akanza/image/upload"
                const ID_CLOUDINARY = "aemwpuyr"
                const formData = new FormData()
                formData.append('file', file)
                formData.append("upload_preset", ID_CLOUDINARY)
                const createExercise = async () => {
                    if (file) {
                        const exerciseRes = await fetch(URI_CLOUDINARY, {
                            method: "POST",
                            body: formData
                        })
                        const image = await exerciseRes.json()
                        exercise.image = image.secure_url
                    } else {
                        exercise.image = exerciseImage.getAttribute("src")
                    }
                    console.log(exercise)
                    const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php", {
                        body: JSON.stringify(exercise),
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json",
                        }
                    })
                    const data = await res.json();
                    if (data.ok === "true") {
                        Swal.fire({
                            title: 'Completado',
                            text: "Ejercicio actualizado exitosamente !!",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace('./edit_exercise.php');
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