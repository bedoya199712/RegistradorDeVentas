<?php   

require '../vendor/autoload.php';

 #Cargar todas las dependencias
//Librerias
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;

$collector = new RouteCollector();
$collector->post("/videojuegos", function(){
    include '../controllers/videojuegoController.php';
});
$collector->get("/totaldescuentos", function(){
    require('../services/videojuegoService.php');
    $videojuegoService = new videojuegoService();
    $datos = $videojuegoService->getDescuentos();
    
});
$collector->get("/", function(){
    include '../controllers/videojuegoController.php';
});


$despachador = new Dispatcher($collector->getData());
$rutaCompleta = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER['REQUEST_METHOD'];
$rutaLimpia = processInput($rutaCompleta);

try {
    echo json_encode($despachador->dispatch($metodo, $rutaLimpia)); # Mandar sólo el método y la ruta limpia
} catch (HttpRouteNotFoundException $e) {
    echo "Error: Ruta no encontrada";
} catch (HttpMethodNotAllowedException $e) {
    echo "Error: Ruta encontrada pero método no permitido";
}


/**
 * Gracias a https://www.sitepoint.com/fast-php-routing-phroute/
 */
function processInput($uri){
    return @array_pop(array_filter(explode('/', $uri)));
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
//header("HTTP/1.1 400 Bad Request");


?>