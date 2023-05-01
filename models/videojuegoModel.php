<?php

class VideojuegoModel{
    
    private $conexion;
    private $data;
    
    //instancia de la conexion
    public function __construct() {
        $this->conexion = require('configDB/config.php');
    }

    //Metodos para el videojuego

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
            $console = strtoupper($console);
            $sqlInsert = "INSERT INTO venta (consola,valor_venta) VALUES ('$console','$valorVenta')";
            $resultSqlInsert = $this->conexion->query($sqlInsert);

            $valorCobrarCliente = $this->aplicarDescuento($precio_maximo,$precio_minimo,$descuento,$valorVenta);
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