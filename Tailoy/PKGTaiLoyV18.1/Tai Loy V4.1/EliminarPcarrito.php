<?php
session_start();
include 'conexion.php';

// Verificar si se recibió el ID del producto a eliminar
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Obtener el carrito actual de la sesión
    if (isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];

        // Buscar el producto en el carrito y eliminarlo
        foreach ($carrito as $indice => $producto) {
            if ($producto['id_Productos'] === $id) {
                unset($carrito[$indice]);
                break; // Salir del bucle una vez que se elimine el producto
            }
        }

        // Actualizar el carrito en la sesión
        $_SESSION['carrito'] = array_values($carrito);
    }
}

// Redireccionar de vuelta a la página de Compra.php
header("Location: Compra.php");
exit();
?>