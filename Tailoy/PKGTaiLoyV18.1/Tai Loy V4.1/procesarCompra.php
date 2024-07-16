<?php
session_start();
include 'conexion.php';

if (isset($_POST['RealizarCompra'])) {

    $NombreCompleto = $_POST['NombreCompleto'];
    $Correo = $_POST['CorreoElectronico'];
    $Dir = $_POST['Direccion'];
    $Ciu = $_POST['Ciudad'];
    $Pais = $_POST['País'];
    $Detalle = $_POST['DetalleTarjeta'];
    $NombrePropietario = $_POST['NombrePropietario'];
    $NTarjeta = $_POST['Ntarjeta'];
    $DatoExpiracion = $_POST['DatoExpiracion'];
    $cvv = $_POST['cvv'];
    $STotal = $_POST['Total'];

    if (empty($NombreCompleto) || empty($Correo) || empty($Dir) || empty($Ciu) || empty($Pais) || empty($Detalle) || empty($NombrePropietario) || empty($NTarjeta) || empty($DatoExpiracion) || empty($cvv) || empty($STotal)) {
        die("Por favor complete todos los campos requeridos.");
    }

    $sqlVenta = "INSERT INTO venta (NombreCompleto, CorreoElectronico, Direccion, Ciudad, Pais, DetalleTarjeta, NombrePropietario, NTarjeta, DatoExpiracion, cvv, STotal, FechaHora) 
                 VALUES ('$NombreCompleto', '$Correo', '$Dir', '$Ciu', '$Pais', '$Detalle', '$NombrePropietario', '$NTarjeta', '$DatoExpiracion', '$cvv', '$STotal', NOW())";

    $resultadoVenta = mysqli_query($conexion, $sqlVenta);

    if ($resultadoVenta) {
        // Rescatar la ultima venta realizada
        $idUltimaVenta = mysqli_insert_id($conexion);

        foreach ($_SESSION['carrito'] as $producto) {
            $idProducto = $producto['id_Productos'];
            $cantidad = $producto['cantidad'];
            $precioUnitario = $producto['Precio'];
            $subtotal = $precioUnitario * $cantidad;

            $sqlDetalleVenta = "INSERT INTO detalleventa (idVenta, id_Productos, cantidad, precio_unitario, subtotal) 
                                VALUES ('$idUltimaVenta', '$idProducto', '$cantidad', '$precioUnitario', '$subtotal')";

            //actualizar stock
            $sqlActualizarStock = "UPDATE productos SET Stock = Stock - $cantidad WHERE id_Productos = $idProducto";
            $resultadoActualizarStock = mysqli_query($conexion, $sqlActualizarStock);

            $resultadoDetalleVenta = mysqli_query($conexion, $sqlDetalleVenta);

            if (!$resultadoDetalleVenta) {
                die("Error al registrar el detalle de la venta: " . mysqli_error($conexion));
            }
        }

        echo "Compra Realizada";

        // Reiniciar el carrito y total
        unset($_SESSION['carrito']);
        $_SESSION['carrito'] = array();
        $_SESSION['Total'] = 0;

        header("Location: index.php");
        exit();
    } else {
        echo "Error al realizar la compra: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
