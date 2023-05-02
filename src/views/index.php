<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $titulo_pagina = "Prueba tecnica";
    include "../src/commons/header.php";   
    ?>
</head>

<body>
    <div id="contenedor">
        <div id="principal" class="">
            <img class="mb-3 rounded" src="public/img/Logo-Strategico.png" alt="">
            <h1 class="mb-5 titulo">Prueba tecnica Strategico</h1>

            <form action="" id="formulario_venta">
                <div class="mb-3">
                    <label for="videojuego" class="textos">Nombre del producto: </label>
                    <input class="form-control" type="text" id="videojuego" name="videojuego" placeholder="Ingrese el nombre de la consola" required>
                </div>
                <div class="mb-3">
                    <label for="valor" class="textos">Valor de la compra: </label>
                    <input class="form-control" type="text" id="valor" name="valor" placeholder="Ingrese el valor de la compra" required>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary btn-xs">Realizar compra</button>
                </div>
                

            </form>
        </div>
    </div>


    <?php 
        include "../src/commons/footer.php";
    ?>    
</body>

</html>