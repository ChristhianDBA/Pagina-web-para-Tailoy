<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consulta preparada para eliminar el producto
    $sql = "DELETE FROM usuarios WHERE Usuario_id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->execute()) {
        header("Location: TablaUsuarios.php");
        exit();
    } else {
        echo "Error al eliminar usuario" . "<br>";
        echo "Error: " . $conexion->error;
    }
}
?>