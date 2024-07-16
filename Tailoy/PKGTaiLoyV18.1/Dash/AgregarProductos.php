<?php

include 'conexion.php';

if (isset($_POST['SinoseenviabanaRoberto'])) {
        $NombreProducto = $_POST['NombreProducto'];
        $Marca = $_POST['Marca'];
        $Categoria = $_POST['Categoria'];
        $Descripcion = $_POST['Descripcion'];
        $Caracteristicas = $_POST['Caracteristicas'];
        $PrecioNormal = $_POST['PrecioNormal'];
        $PrecioOferta = $_POST['PrecioOferta'];
        $Stock = $_POST['Stock'];
        $Link = $_POST['imglink'];

        $sql = "INSERT INTO productos (id_Productos, NombreProducto, Marca, Categoria, Descripcion, Caracteristicas, PrecioNormal, Precio, Stock, imglink) VALUES (null,'$NombreProducto', '$Marca', '$Categoria','$Descripcion','$Caracteristicas','$PrecioNormal','$PrecioOferta','$Stock', '$Link' )";
        $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Producto Registrado";
        header("Location: TablaProductos.php");
        exit();
    } else {
        echo "Error al registrar Producto" . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    }
?>