<?php
require('../services/videojuegoService.php');
$videojuegoService = new VideojuegoService();

function getIndex($videojuegoService) {
    include '../src/views/index.php';
}

function postIndex($videojuegoService) {

        $ventaJson = json_decode(file_get_contents("php://input"), true);
        $console = $ventaJson['console'];
        $valorVenta = $ventaJson['valor'];
        $datos = $videojuegoService->createVenta($console,$valorVenta);
        echo $datos;
}

switch($_SERVER['REQUEST_METHOD']) {
        case 'GET': {
            getIndex($videojuegoService);
            break;
        }
        case 'POST': {
            postIndex($videojuegoService);
            break;
        }
    }

?>

