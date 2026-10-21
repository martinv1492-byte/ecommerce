<?php 
require_once __DIR__ . "/../config/config.php";



function obtenerProductos($conexion){

    $sql = "SELECT * FROM productos";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $productos;
}
function crearProducto($conexion,$datosProducto){
    $sql = "INSERT INTO `productos`(`nombre`, `codigo`, `idCategoria`, `descripcion`, `costo`, `precio`, `foto`, `idProveedor`, `stock`, `marca`) 
    VALUES (:name, :code, :category, :description, :cost, :price, :photo, :supplier, :stock, :brand)";
    $stmt = $conexion->prepare($sql);
    return $stmt->execute($datosProducto);
}
?>