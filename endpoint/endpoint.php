<?php
require('videojuegoModel.php');
$videojuegoService = new videojuegoModel();

function getIndex($videojuegoService) {
    
    $datos = $videojuegoService->getDescuentos();
    echo $datos;
    include 'index.php';
   
}

switch($_SERVER['REQUEST_METHOD']) {
        case 'GET': {
            getIndex($videojuegoService);
            break;
        }
    }

?>