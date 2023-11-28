<?php
// Incluye la configuración de tu conexión a la base de datos
include("../../conexion.php");

// Obtiene el término de búsqueda del parámetro de la URL
$termino = isset($_GET["termino"]) ? $_GET["termino"] : "";

// Realiza la búsqueda en la base de datos
$sql = "SELECT * FROM contactos WHERE 
        id LIKE :termino OR
        apaterno LIKE :termino OR
        amaterno LIKE :termino OR
        nombre LIKE :termino OR
        email LIKE :termino OR
        caja LIKE :termino OR
        cajaclave LIKE :termino OR
        uescritorioclave LIKE :termino OR
        uservo LIKE :termino OR
        uservoclave LIKE :termino OR
        fechaini LIKE :termino OR
        perfil LIKE :termino OR
        servidor LIKE :termino OR
        campus LIKE :termino OR
        uescritorio LIKE :termino";

$stm = $conexion->prepare($sql);
$termino = "%" . $termino . "%";
$stm->bindParam(":termino", $termino);
$stm->execute();

// Muestra los resultados de la búsqueda en tiempo real
while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
     "<p>{$fila['nombre']} {$fila['apaterno']} {$fila['amaterno']}</p>";
}
?>
