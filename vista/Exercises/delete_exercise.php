<!DOCTYPE html>
<html lang="es">

<head>

    <?php session_start(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="../../utils/css/food_delete.css">
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Logo -->
    <link rel="icon" href="../vistaHomeNutriF/imgs/favicon.ico">
    <title>Eliminar Ejercicio</title>

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
                        <th id="th__cb">
                            <input id="cbAll" type="checkbox">
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
            const thCb = document.querySelector("#th__cb")
            const thName = document.querySelector("#th__name")
            const thImage = document.querySelector("#th__image")
            const thType = document.querySelector("#th_type")
            const thOptions = document.querySelector("#th__options")
            const loadExercises = async () => {
                const data = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php")
                const exercises = await data.json()
                console.log("exercises:" + exercises)
                if (exercises.error) {
                    thCb.style.display = "none"
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
                } else {
                    exercises.forEach((exercise) => {
                        thName.innerHTML = `Name`
                        thImage.innerHTML = "Image"
                        thType.innerHTML = "Type"
                        thOptions.innerHTML = "Options"
                        let Exercise = document.createElement("tr")
                        Exercise.classList.add("row-exercise")
                        let idExercise = document.createElement("td")
                        let inputExercise = document.createElement("input")
                        inputExercise.classList.add("cbExercise")
                        inputExercise.setAttribute("type", "checkbox")
                        inputExercise.setAttribute("value", exercise.id)
                        idExercise.appendChild(inputExercise)
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
                        let btnDelete = document.createElement("button")
                        btnDelete.innerHTML = "Delete"
                        btnDelete.addEventListener("click", () => {
                            Swal.fire({
                                title: 'Esta Seguro?',
                                text: "¡No podrás revertir esto!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '¡Sí, elimine la comida!'
                            }).then(async (result) => {
                                if (result.isConfirmed) {
                                    let exerciseId = {
                                        id: exercise.id
                                    }
                                    const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php", {
                                        body: JSON.stringify(exerciseId),
                                        method: "DELETE",
                                        headers: {
                                            "Content-Type": "application/json",
                                        }
                                    })
                                    const data = await res.json()
                                    tbody.innerHTML = ''
                                    loadExercises()
                                    Swal.fire(
                                        'Eliminado',
                                        'El ejercicio fue eliminado con exito',
                                        'success'
                                    )
                                }
                            })
                        })
                        btnExercise.appendChild(btnDelete)
                        Exercise.appendChild(btnExercise)
                        tbody.appendChild(Exercise)
                        Exercise.addEventListener("click", () => {
                            if (inputExercise.checked) {
                                inputExercise.checked = false
                                Exercise.classList.remove("active-row")
                                const cbExercises = document.querySelectorAll(".cbExercise")
                                let countExercise = 0
                                cbExercises.forEach(cb => {
                                    if (cb.checked) {
                                        countExercise++
                                    }
                                })
                                if (countExercise == 0) {
                                    thName.innerHTML = `Name`
                                    thImage.innerHTML = "Image"
                                    thType.innerHTML = "Diagnostic"
                                    thOptions.innerHTML = "Options"
                                } else {
                                    thName.innerHTML = `${countExercise} exercises selected`
                                    thImage.innerHTML = ""
                                    thType.innerHTML = ""
                                    let btnDelete = document.createElement("button")
                                    btnDelete.innerHTML = "Delete exercises"
                                    btnDelete.classList.add("button__delete")
                                    thOptions.innerHTML = ""
                                    thOptions.append(btnDelete)
                                }
                            } else {
                                inputExercise.checked = true
                                Exercise.classList.add("active-row")
                                const cbExercises = document.querySelectorAll(".cbExercise")
                                let countExercise = 0
                                cbExercises.forEach(cb => {
                                    if (cb.checked) {
                                        countExercise++
                                    }
                                })
                                thName.innerHTML = `${countExercise} exercises selected`
                                thImage.innerHTML = ""
                                thType.innerHTML = ""
                                let btnDeleteAll = document.createElement("button")
                                btnDeleteAll.innerHTML = "Delete exercises"
                                btnDeleteAll.classList.add("button__delete")
                                thOptions.innerHTML = ""
                                thOptions.append(btnDeleteAll)
                                btnDeleteAll.addEventListener("click", () => {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete exercises!'
                                    }).then(async (result) => {
                                        if (result.isConfirmed) {
                                            let exercises = []
                                            cbExercises.forEach(cb => {
                                                if (cb.checked) {
                                                    exercises.push(cb.value)
                                                }
                                            })
                                            if (exercises.length > 1) {
                                                const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php", {
                                                    body: JSON.stringify(exercises),
                                                    method: "DELETE",
                                                    headers: {
                                                        "Content-Type": "application/json",
                                                    }
                                                })
                                                const data = await res.json()
                                                tbody.innerHTML = ''
                                                loadExercises()
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your exercises has been deleted.',
                                                    'success'
                                                )
                                            } else {
                                                const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php", {
                                                    body: JSON.stringify({
                                                        id: exercises[0]
                                                    }),
                                                    method: "DELETE",
                                                    headers: {
                                                        "Content-Type": "application/json",
                                                    }
                                                })
                                                const data = await res.json()
                                                tbody.innerHTML = ''
                                                loadExercises()
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your exercise has been deleted.',
                                                    'success'
                                                )
                                            }
                                        }
                                    })

                                })
                            }
                        })
                    });
                }
            }
            loadExercises()
            const cbAll = document.querySelector("#cbAll")
            cbAll.addEventListener("click", () => {
                const cbExercises = document.querySelectorAll(".cbExercise")
                if (cbAll.checked) {
                    let exerciseLenght = cbExercises.length
                    cbExercises.forEach(cb => {
                        cb.checked = true
                        cb.parentNode.parentNode.classList.add("active-row")
                    })
                    thName.innerHTML = `${exerciseLenght} exercises selected`
                    thImage.innerHTML = ""
                    thType.innerHTML = ""
                    let btnDeleteAll = document.createElement("button")
                    btnDeleteAll.innerHTML = "Delete exercises"
                    btnDeleteAll.classList.add("button__delete")
                    thOptions.innerHTML = ""
                    thOptions.append(btnDeleteAll)
                    btnDeleteAll.addEventListener("click", () => {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete exercises!'
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                let exercises = []
                                cbExercises.forEach(cb => {
                                    if (cb.checked) {
                                        exercises.push(cb.value)
                                    }
                                })
                                const res = await fetch("../../modelo/EjercicioCRUD/ejercicio.controller.php", {
                                    body: JSON.stringify(exercises),
                                    method: "DELETE",
                                    headers: {
                                        "Content-Type": "application/json",
                                    }
                                })
                                const data = await res.json()
                                tbody.innerHTML = ''
                                loadExercises()
                                Swal.fire(
                                    'Deleted!',
                                    'Your exercise has been deleted.',
                                    'success'
                                )
                            }
                        })

                    })
                } else {
                    cbExercises.forEach(cb => {
                        cb.checked = false
                        cb.parentNode.parentNode.classList.remove("active-row")
                        thName.innerHTML = `Name`
                        thImage.innerHTML = "Image"
                        thType.innerHTML = "Type"
                        thOptions.innerHTML = "Options"
                    })
                }
            })
        })
    </script>
</body>

</html>