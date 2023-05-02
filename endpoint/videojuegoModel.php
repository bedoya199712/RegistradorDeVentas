<?php

class VideojuegoModel{
    
    private $conexion;
    private $data;
    
    //instancia de la conexion
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
            return json_encode($this->data);
        }
    }
}

?>