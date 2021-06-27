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
                        <th>
                            <input id="cbAll" type="checkbox">
                        </th>
                        <th id="th__name">
                            Name
                        </th>
                        <th id="th__image">
                            Image
                        </th>
                        <th id="th__diagnostic">Diagnostic</th>
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
            const loadFoods = async () => {
                const data = await fetch("../../modelo/Comida/comida.controller.php")
                const foods = await data.json()
                foods.forEach((food) => {
                    const thName = document.querySelector("#th__name")
                    const thImage = document.querySelector("#th__image")
                    const thDiagnostic = document.querySelector("#th__diagnostic")
                    const thOptions = document.querySelector("#th__options")
                    thName.innerHTML = `Name`
                    thImage.innerHTML = "Image"
                    thDiagnostic.innerHTML = "Diagnostic"
                    thOptions.innerHTML = "Options"
                    let Food = document.createElement("tr")
                    Food.classList.add("row-food")
                    let idFood = document.createElement("td")
                    let inputFood = document.createElement("input")
                    inputFood.classList.add("cbFood")
                    inputFood.setAttribute("type", "checkbox")
                    inputFood.setAttribute("value", food.id)
                    idFood.appendChild(inputFood)
                    let nameFood = document.createElement("td")
                    nameFood.innerHTML = food.name
                    let imageFood = document.createElement("td")
                    let image = document.createElement("img")
                    image.setAttribute("src", food.image)
                    imageFood.appendChild(image)
                    let diagnosticFood = document.createElement("td")
                    diagnosticFood.innerHTML = food.diagnostic
                    Food.appendChild(idFood)
                    Food.appendChild(nameFood)
                    Food.appendChild(imageFood)
                    Food.appendChild(diagnosticFood)
                    let btnFood = document.createElement("td")
                    let btnEdit = document.createElement("button")
                    btnEdit.innerHTML = "Edit"
                    let btnDelete = document.createElement("button")
                    btnDelete.innerHTML = "Delete"
                    btnDelete.addEventListener("click", () => {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete food!'
                        }).then(async (result) => {
                            if (result.isConfirmed) {
                                let foodId = {
                                    id: food.id
                                }
                                const res = await fetch("../../modelo/Comida/comida.controller.php", {
                                    body: JSON.stringify(foodId),
                                    method: "DELETE",
                                    headers: {
                                        "Content-Type": "application/json",
                                    }
                                })
                                const data = await res.json()
                                tbody.innerHTML = ''
                                loadFoods()
                                Swal.fire(
                                    'Deleted!',
                                    'Your food has been deleted.',
                                    'success'
                                )
                            }
                        })
                    })
                    // btnFood.appendChild(btnEdit)
                    btnFood.appendChild(btnDelete)
                    Food.appendChild(btnFood)
                    tbody.appendChild(Food)

                    Food.addEventListener("click", () => {
                        if (inputFood.checked) {
                            inputFood.checked = false
                            Food.classList.remove("active-row")
                            const cbFoods = document.querySelectorAll(".cbFood")
                            const thName = document.querySelector("#th__name")
                            const thImage = document.querySelector("#th__image")
                            const thDiagnostic = document.querySelector("#th__diagnostic")
                            const thOptions = document.querySelector("#th__options")
                            let countFood = 0
                            cbFoods.forEach(cb => {
                                if (cb.checked) {
                                    countFood++
                                }
                            })
                            if (countFood == 0) {
                                thName.innerHTML = `Name`
                                thImage.innerHTML = "Image"
                                thDiagnostic.innerHTML = "Diagnostic"
                                thOptions.innerHTML = "Options"
                            } else {
                                thName.innerHTML = `${countFood} foods selected`
                                thImage.innerHTML = ""
                                thDiagnostic.innerHTML = ""
                                let btnDelete = document.createElement("button")
                                btnDelete.innerHTML = "Delete foods"
                                btnDelete.classList.add("button__delete")
                                thOptions.innerHTML = ""
                                thOptions.append(btnDelete)
                            }
                        } else {
                            inputFood.checked = true
                            Food.classList.add("active-row")
                            const cbFoods = document.querySelectorAll(".cbFood")
                            const thName = document.querySelector("#th__name")
                            const thImage = document.querySelector("#th__image")
                            const thDiagnostic = document.querySelector("#th__diagnostic")
                            const thOptions = document.querySelector("#th__options")
                            let countFood = 0
                            cbFoods.forEach(cb => {
                                if (cb.checked) {
                                    countFood++
                                }
                            })
                            thName.innerHTML = `${countFood} foods selected`
                            thImage.innerHTML = ""
                            thDiagnostic.innerHTML = ""
                            let btnDelete = document.createElement("button")
                            btnDelete.innerHTML = "Delete foods"
                            btnDelete.classList.add("button__delete")
                            thOptions.innerHTML = ""
                            thOptions.append(btnDelete)
                        }
                    })
                });
            }
            loadFoods()
            const cbAll = document.querySelector("#cbAll")
            cbAll.addEventListener("click", () => {
                const cbFoods = document.querySelectorAll(".cbFood")
                const thName = document.querySelector("#th__name")
                const thImage = document.querySelector("#th__image")
                const thDiagnostic = document.querySelector("#th__diagnostic")
                const thOptions = document.querySelector("#th__options")
                if (cbAll.checked) {
                    let foodLenght = cbFoods.length
                    cbFoods.forEach(cb => {
                        cb.checked = true
                        cb.parentNode.parentNode.classList.add("active-row")
                    })
                    thName.innerHTML = `${foodLenght} foods selected`
                    thImage.innerHTML = ""
                    thDiagnostic.innerHTML = ""
                    let btnDelete = document.createElement("button")
                    btnDelete.innerHTML = "Delete foods"
                    btnDelete.classList.add("button__delete")
                    thOptions.innerHTML = ""
                    thOptions.append(btnDelete)
                } else {
                    cbFoods.forEach(cb => {
                        cb.checked = false
                        cb.parentNode.parentNode.classList.remove("active-row")
                        thName.innerHTML = `Name`
                        thImage.innerHTML = "Image"
                        thDiagnostic.innerHTML = "Diagnostic"
                        thOptions.innerHTML = "Options"
                    })
                }
            })
        })
    </script>
</body>

</html>