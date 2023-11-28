<?php
$servidor = "localhost";
$db = "phpcrud";
$username = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$db", $username, $password);
    $conexion->exec("set names utf8"); // Establece la codificación a UTF-8
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
?>
