<?php
include 'conexion.php';

if (isset($_POST['Editar'])) {
    $id = intval($_POST['id']);
    $NombreProducto = $_POST['NombreActualizado'];
    $Marca = $_POST['MarcaActualizado'];
    $Categoria = $_POST['CategoriaActualizado'];
    $Descripcion = $_POST['DescripcionActualizado'];
    $Caracteristicas = $_POST['CaracteristicasActualizado'];
    $PrecioNormal = $_POST['PrecioNormalActualizado'];
    $PrecioOferta = $_POST['PrecioOfertaActualizado'];
    $Stock = $_POST['StockActualizado'];
    $Link = $_POST['imglinkActualizado'];

    $sql = "UPDATE productos SET NombreProducto = ?, Marca = ?, Categoria = ?, Descripcion = ?, Caracteristicas = ?, PrecioNormal = ?, Precio = ?, Stock = ?, imglink = ? WHERE id_Productos = ?";
    
    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        echo "Error al preparar la consulta SQL: " . $conexion->error;
    } else {
        $stmt->bind_param("sssssssisi", $NombreProducto, $Marca, $Categoria, $Descripcion, $Caracteristicas, $PrecioNormal, $PrecioOferta, $Stock, $Link, $id);
        
        if ($stmt->execute()) {
            header("Location: TablaProductos.php");
            exit();
        } else {
            echo "Error al actualizar el producto: " . $stmt->error;
}
}
}
?>