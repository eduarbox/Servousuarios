<!-- buscar.php -->

<?php
// Incluye la configuración de tu conexión a la base de datos
include("../../conexion.php");

// Obtiene el término de búsqueda del parámetro de la URL
$termino = $_GET["termino"];

// Realiza la búsqueda en la base de datos (reemplaza esto con tu consulta real)
$sql = "SELECT * FROM contactos WHERE nombre LIKE :termino OR apaterno LIKE :termino OR amaterno LIKE :termino";
$stm = $conexion->prepare($sql);
$termino = "%" . $termino . "%";
$stm->bindParam(":termino", $termino);
$stm->execute();

// Muestra los resultados de la búsqueda en tiempo real
while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
  echo "<p>{$fila['nombre']} {$fila['apaterno']} {$fila['amaterno']}</p>";
}
?>
