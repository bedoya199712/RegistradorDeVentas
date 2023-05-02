<?php
class VideojuegoRepositorie {
    private $conexion;
    private $data = 0;

    public function __construct() {
        $this->conexion = require('../configDB/config.php');
    }

    //Metodos para el videojuego

    function getDescuentos(){
        $data = 0;
        $sql = "SELECT SUM(descuento) AS suma_total FROM ventas";
        $resultSql =  $this->conexion->query($sql);
        if (isset($resultSql) and mysqli_num_rows($resultSql) != 0) {
            foreach ($resultSql as $row) {
                $descuentos = $row['suma_total'];
            }
            header("HTTP/1.1 200 OK");
            header("Content-Type: application/json");
            $this->data = $descuentos;
            return $this->data;
        }
    }

    function createVenta($console,$valorVenta){
        $valorCobrarCliente = 0;
        $sql = "SELECT id,precio_minimo,precio_maximo,descuento FROM videojuegos WHERE consola = '$console'";
        $resultSql = $this->conexion->query($sql);
        if (isset($resultSql) and mysqli_num_rows($resultSql)!=0) {

            foreach($resultSql as $row){
                $precio_minimo = $row['precio_minimo']; 
                $precio_maximo = $row['precio_maximo']; 
                $descuento = $row['descuento']; 
            }

            $valorCobrarCliente = $this->aplicarDescuento($precio_maximo,$precio_minimo,$descuento,$valorVenta);
            $descuento = $valorVenta - $valorCobrarCliente;
            $console = strtoupper($console);
            $sqlInsert = "INSERT INTO ventas (consola,valor_venta,descuento) VALUES ('$console','$valorCobrarCliente','$descuento')";
            $resultSqlInsert = $this->conexion->query($sqlInsert);
            header("HTTP/1.1 200 OK");
            header("Content-Type: application/json");
            $this->data = array("valorCobrarCliente" => $valorCobrarCliente);
            return json_encode($this->data);
        }else {
            $valorCobrarCliente = "No se encontro el videojuego comprado";
            header("HTTP/1.1 500 ERROR");
            header("Content-Type: application/json");
            $this->data = array("valorCobrarCliente" => $valorCobrarCliente);
            return json_encode($this->data);
        }
    }

    function aplicarDescuento($precio_maximo,$precio_minimo,$descuento,$valorVenta){
        $valorDescuento = $valorVenta;
        if($precio_maximo == NULL || $precio_maximo == ''){
            $precio_maximo = $valorVenta + 1;
        }
    
        if($valorVenta > $precio_minimo && $valorVenta < $precio_maximo) {
            $valorDescuento = $valorVenta - ($valorVenta * ($descuento/100));
            return $valorDescuento; 
        }else {
            return $valorDescuento;
        }
        return $valorDescuento;
    }
}
?>