<!DOCTYPE html>
<html lang="es-PE">

<head>

    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="../../utils/css/food_edit.css">
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Logo -->
    <link rel="icon" href="../vistaHomeNutriF/imgs/favicon.ico">
    <title>Modificar Platillos</title>

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
        <header class="header">
            <h1 class="header__title">Panel of control</h1>
            <span class="header__back">
                <a href="../menu.php">Back to Menú</a>
            </span>
        </header>
        <main>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th id="th__num">
                            #
                        </th>
                        <th id="th__name">
                            Name
                        </th>
                        <th id="th__image">
                            Image
                        </th>
                        <th id="th_type">Type</th>
                        <th id="th__options">Option</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <!--Content-->
                </tbody>
            </table>
        </main>
    </div>

    <!--SweetAler-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        "use strict"
        window.addEventListener("load", () => {
            const tbody = document.querySelector("tbody")
            const thNum = document.querySelector("#th__num")
            const thName = document.querySelector("#th__name")
            const thImage = document.querySelector("#th__image")
            const thType = document.querySelector("#th_type")
            const thOptions = document.querySelector("#th__options")
            const loadExercises = async () => {
                const data = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php")
                const exercises = await data.json()
                if (exercises.error) {
                    thName.innerHTML = ''
                    const imgEmpty = document.createElement("img")
                    imgEmpty.setAttribute("src", "https://www.muur.com.mx/images/empty_item.svg")
                    imgEmpty.style.width = "60rem"
                    const txtEmpty = document.createElement("h2")
                    txtEmpty.innerHTML = "You do not have exercises registered 🤦‍♂️🤦‍♂️🤦‍♂️"
                    thName.appendChild(txtEmpty)
                    thName.appendChild(imgEmpty)
                    thName.style.textAlign = "center"
                    thImage.style.display = "none"
                    thType.style.display = "none"
                    thOptions.style.display = "none"
                    thNum.style.display = "none"
                } else {
                    exercises.forEach((exercise, index) => {
                        let Exercise = document.createElement("tr")
                        Exercise.classList.add("row-exercise")
                        let idExercise = document.createElement("td")
                        idExercise.innerHTML = index + 1
                        let nameExercise = document.createElement("td")
                        nameExercise.innerHTML = exercise.name
                        let imageExercise = document.createElement("td")
                        let image = document.createElement("img")
                        image.setAttribute("src", exercise.image)
                        imageExercise.appendChild(image)
                        let typeExercise = document.createElement("td")
                        typeExercise.innerHTML = exercise.type
                        Exercise.appendChild(idExercise)
                        Exercise.appendChild(nameExercise)
                        Exercise.appendChild(imageExercise)
                        Exercise.appendChild(typeExercise)
                        let btnExercise = document.createElement("td")
                        let btnEdit = document.createElement("button")
                        btnEdit.innerHTML = "Edit"
                        btnEdit.addEventListener("click", () => {
                            window.location.replace(`./form_edit_exercise.php?id=` + exercise.id);
                        })
                        btnExercise.appendChild(btnEdit)
                        Exercise.appendChild(btnExercise)
                        tbody.appendChild(Exercise)
                    });
                }
            }
            loadExercises()
        })
    </script>
</body>

</html>