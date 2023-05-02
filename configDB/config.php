<?php
$servername = "localhost";
$database = "";
$username = "";
$password = "";
// Create connection
try {
    $conexion = mysqli_connect($servername, $username, $password, $database);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
    
}

return $conexion;

?>