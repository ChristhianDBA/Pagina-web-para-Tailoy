<?php
include 'conexion.php';

if(isset($_POST['Buscar'])){
    $ProductoBuscado = $_POST['Buscadorcito'];

    // Búsqueda exacta
    
    $stmt = $conexion->prepare("SELECT id_Productos, Categoria FROM productos WHERE NombreProducto = ?");
    $stmt->bind_param("s", $ProductoBuscado);
    $stmt->execute();
    $result_exacta = $stmt->get_result();

    if ($result_exacta->num_rows > 0) {
        // Si se encuentra el producto exacto, obtener el ID y la categoría
        $row = $result_exacta->fetch_assoc();
        $idProducto = $row['id_Productos'];
        $categoria = $row['Categoria'];

        // Redirigir a vistas.php con los datos recuperados
        header("Location: Vista.php?id=$idProducto&categoria=$categoria");
        exit();
    } else {
        // Búsqueda por similitud
        $ProductoBuscadoLike = '%' . $ProductoBuscado . '%';
        $stmt = $conexion->prepare("SELECT Categoria, NombreProducto FROM productos WHERE NombreProducto LIKE ? LIMIT 1");
        $stmt->bind_param("s", $ProductoBuscadoLike);
        $stmt->execute();
        $result_similares = $stmt->get_result();

        if ($result_similares->num_rows > 0) {
            // Si se encuentra al menos un producto similar, obtener el primero encontrado
            $row = $result_similares->fetch_assoc();
            $NombreProducto= $row['NombreProducto'];
            $categoria = $row['Categoria'];

            // Redirigir a Busquedasimilar.php con los datos del primer producto similar encontrado
            header("Location: buscadorsimilar.php?categoria=$categoria & nombre=$NombreProducto");
            exit();
        } else {
            // Si no se encuentra ningún resultado, mostrar alerta y redirigir a carrito.php
            echo "<script>
                    alert('Producto no encontrado');
                    window.location.href = 'carrito.php';
                  </script>";
            exit();
        }
}
}
?>