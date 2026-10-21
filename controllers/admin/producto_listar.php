<?php
require_once __DIR__ . "/../../config/config.php";
require_once __DIR__ . "/../../models/producto.php";

$listado = obtenerProductos($conexion);

header("Location: __DIR__ . /../../views/admin/productos.php");
?>