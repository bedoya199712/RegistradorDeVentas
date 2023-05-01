<?php
require('models/videojuegoModel.php');
$videojuegoService = new videojuegoModel();

function getIndex() {
        include 'src\views\index.php';
}

function postIndex($videojuegoService) {

        $ventaJson = json_decode(file_get_contents("php://input"), true);
        $console = $ventaJson['console'];
        $valorVenta = $ventaJson['valor'];
        $datos = $videojuegoService->createVenta($console,$valorVenta);
        echo $datos;
        return $datos;
}

switch($_SERVER['REQUEST_METHOD']) {
        case 'GET': {
            getIndex();
            break;
        }
        case 'POST': {
            postIndex($videojuegoService);
            break;
        }
    }

?>

