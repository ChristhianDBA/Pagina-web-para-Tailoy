<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consulta preparada para eliminar el producto
    $sql = "DELETE FROM productos WHERE id_Productos = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->execute()) {
        header("Location: TablaProductos.php");
        exit();
    } else {
        echo "Error al eliminar Producto" . "<br>";
        echo "Error: " . $conexion->error;
    }
}
?>