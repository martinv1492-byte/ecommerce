<?php 
require_once "config/config.php";

$sql = "SELECT * FROM categorias";

$stmt = $conexion->prepare($sql);

$stmt->execute();

$categorias = $stmt->fetchALL(PDO::FETCH_ASSOC);

foreach ($categorias as $categoria) {
    echo $categoria["nombre"] . "<br>";
}
?>