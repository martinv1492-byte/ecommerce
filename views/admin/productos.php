<?php 

if (isset($_GET['status']) && $_GET['status'] === 'success'): 

?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Excelente!</strong> El producto se ha guardado correctamente en la base de datos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


<?php 

elseif (isset($_GET['status']) && $_GET['status'] === 'error'): 
    
?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hubo un problema.</strong> No se pudo guardar el producto. Revisa los datos e intenta nuevamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif; ?>

<?php 
include("../../models/producto.php");
$listado = obtenerProductos($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="/ecommerce/assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="table-responsive">
        <h1>Vinoteca</h1>
    <div class="text-end">      
        <button onclick="window.location.href='producto_nuevo.php?'" class="btn btn-sm text-light" style="background-color: green">Cargar producto nuevo</button>
    </div>
        <table class="table table-striped table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col"class="text-center">Nombre</th>
                    <th scope="col"class="text-center">Codigo</th>
                    <th scope="col"class="text-center">Categoria</th>
                    <th scope="col"class="text-center">Descripcion</th>
                    <th scope="col"class="text-center">Costo</th>
                    <th scope="col"class="text-center">Precio</th>
                    <th scope="col"class="text-center">Foto</th>
                    <th scope="col"class="text-center">Proveedor</th>
                    <th scope="col"class="text-center">Stock</th>
                    <th scope="col"class="text-center">Marca</th>
                    <th scope= "col" colspan = "2" class="text-center" >Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($listado as $producto) { ?>
                <tr>
                    <td><?php echo $producto["idProducto"]; ?></td>
                    <td><?php echo $producto["nombre"]; ?></td>
                    <td><?php echo $producto["codigo"]; ?></td>
                    <td><?php echo $producto["idCategoria"]; ?></td>
                    <td><?php echo $producto["descripcion"]; ?></td>
                    <td><?php echo $producto["costo"]; ?></td>
                    <td><?php echo $producto["precio"]; ?></td>
                    <td><img src="<?php echo $producto["foto"]; ?>" style="width: 100px ; height: 100px"></td>
                    <td><?php echo $producto["idProveedor"]; ?></td>
                    <td><?php echo $producto["stock"]; ?></td>
                    <td><?php echo $producto["marca"]; ?></td>
                    <td><button onclick="window.location.href='producto_actualizar.php?'" class="btn btn-sm text-light" style="background-color: grey">Modificar</button></td>
                    <td><button onclick="window.location.href='producto_eliminar.php?'" class="btn btn-sm text-light" style="background-color: grey">Eliminar</button></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>        
    </div>
<script src="/ecommerce/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>