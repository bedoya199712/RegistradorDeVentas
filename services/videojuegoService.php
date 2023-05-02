<?php
interface IVideojuego {
    public function createVenta($console,$valorVenta);
    public function getDescuentos();
}
class VideojuegoService implements IVideojuego{
    //instancia del repositorio
    private $videojuegoRepositorie;
    
    //instancia de la conexion
    public function __construct() {
        require('../repositories/videojuegoRepositorie.php');
        $this->videojuegoRepositorie = new VideojuegoRepositorie();
    }
    function getDescuentos(){
        $datos = $this->videojuegoRepositorie->getDescuentos();
        ?><script type="text/javascript">alert("La cantidad total en descuentos es de: '.<?php echo $datos ?>.'");</script><?php ;
        return $datos;
    }

    function createVenta($console,$valorVenta) {
        
        $datos = $this->videojuegoRepositorie->createVenta($console,$valorVenta);
        return $datos;
        
    }

}


?>