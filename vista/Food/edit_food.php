<!DOCTYPE html>
<html lang="es">

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
                            #
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
                foods.forEach((food, index) => {
                    let Food = document.createElement("tr")
                    Food.classList.add("row-food")
                    let idFood = document.createElement("td")
                    idFood.innerHTML = index + 1
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
                    btnEdit.addEventListener("click", () => {
                        window.location.replace(`./form_edit_food.php?id=` + food.id);
                    })
                    btnFood.appendChild(btnEdit)
                    Food.appendChild(btnFood)
                    tbody.appendChild(Food)
                });
            }
            loadFoods()
        })
    </script>
</body>

</html>