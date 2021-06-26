<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Css-->
    <link rel="stylesheet" href="../../utils/css/foods.css">
    <!--GoogleFonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <!--FontAwasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 class="header__title">Panel of control</h1>
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
                        <th id="th__options">Options</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <!--Content-->
                </tbody>
            </table>
        </main>
    </div>
    <script>
        "use strict"
        window.addEventListener("load", () => {
            const tbody = document.querySelector("tbody")
            const loadFoods = async () => {
                const data = await fetch("../../modelo/Comida/comida.controller.php")
                const foods = await data.json()
                foods.forEach(async (food) => {
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
                    const dataDiagnostic = await fetch("../../modelo/Diagnostico/diagnostico.controller.php?id=" + food.idDiagnostic)
                    const diagnostic = await dataDiagnostic.json()
                    let diagnosticFood = document.createElement("td")
                    diagnosticFood.innerHTML = diagnostic.name
                    Food.appendChild(idFood)
                    Food.appendChild(nameFood)
                    Food.appendChild(imageFood)
                    Food.appendChild(diagnosticFood)
                    let btnFood = document.createElement("td")
                    let btnEdit = document.createElement("button")
                    btnEdit.innerHTML = "Edit"
                    let btnDelete = document.createElement("button")
                    btnDelete.innerHTML = "Delete"
                    btnFood.appendChild(btnEdit)
                    btnFood.appendChild(btnDelete)
                    Food.appendChild(btnFood)
                    tbody.appendChild(Food)

                    Food.addEventListener("click", () => {
                        if (inputFood.checked) {
                            inputFood.checked = false
                            Food.classList.remove("active-row")
                        } else {
                            inputFood.checked = true
                            Food.classList.add("active-row")
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
                        thName.innerHTML = `${foodLenght} foods selected`
                        thImage.innerHTML = ""
                        thDiagnostic.innerHTML = ""
                        thOptions.innerHTML = ""
                    })
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