<?php 
require_once __DIR__ . "/../config/config.php";

function obtenerCategorias($conexion) {
    $sql = "SELECT idCategoria, nombre FROM categorias";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function obtenerProductos($conexion, $idCategoria = 'todas') {
    if ($idCategoria !== 'todas' && !empty($idCategoria)) {
        $sql = "SELECT * FROM productos WHERE idCategoria = :idCategoria";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([':idCategoria' => $idCategoria]);
    } else {
        $sql = "SELECT * FROM productos";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
    }
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function crearProducto($conexion,$datosProducto){
    $sql = "INSERT INTO `productos`(`nombre`, `codigo`, `idCategoria`, `descripcion`, `costo`, `precio`, `foto`, `idProveedor`, `stock`, `marca`) 
    VALUES (:name, :code, :category, :description, :cost, :price, :photo, :supplier, :stock, :brand)";
    $stmt = $conexion->prepare($sql);
    return $stmt->execute($datosProducto);
}

function eliminarProducto($conexion, $idProducto){
    $sql = "DELETE FROM productos WHERE idProducto = :id";
    $stmt = $conexion->prepare($sql);
    return $stmt->execute([ ':id' => $idProducto ]);
}
?>