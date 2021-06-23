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
                        <th>
                            Name
                        </th>
                        <th>
                            Image
                        </th>
                        <th>Diagnostic</th>
                        <th>Options</th>
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
                    const Food = document.createElement("tr")
                    const idFood = document.createElement("td")
                    const inputFood = document.createElement("input")
                    inputFood.classList.add("cbFood")
                    inputFood.setAttribute("type", "checkbox")
                    inputFood.setAttribute("value", food.id)
                    idFood.appendChild(inputFood)
                    const nameFood = document.createElement("td")
                    nameFood.innerHTML = food.name
                    const imageFood = document.createElement("td")
                    const image = document.createElement("img")
                    image.setAttribute("src", food.image)
                    imageFood.appendChild(image)
                    const dataDiagnostic = await fetch("../../modelo/Diagnostico/diagnostico.controller.php?id=" + food.idDiagnostic)
                    const diagnostic = await dataDiagnostic.json()
                    const diagnosticFood = document.createElement("td")
                    diagnosticFood.innerHTML = diagnostic.name
                    Food.appendChild(idFood)
                    Food.appendChild(nameFood)
                    Food.appendChild(imageFood)
                    Food.appendChild(diagnosticFood)
                    const btnFood = document.createElement("td")
                    const btnEdit = document.createElement("button")
                    btnEdit.innerHTML = "Edit"
                    const btnDelete = document.createElement("button")
                    btnDelete.innerHTML = "Delete"
                    btnFood.appendChild(btnEdit)
                    btnFood.appendChild(btnDelete)
                    Food.appendChild(btnFood)
                    tbody.appendChild(Food)
                });


                const cbAllFoods = document.querySelector("#cbAll")
                const cbFood = document.querySelectorAll(".cbFood")
                console.log(cbAllFoods)
                console.log(cbFood)
                cbAllFoods.addEventListener("click", () => {

                })
            }
            loadFoods()
        })
    </script>
</body>

</html>