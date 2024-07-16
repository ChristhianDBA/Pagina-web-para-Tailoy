<?php

include 'conexion.php';

if (isset($_POST['Registro'])) {
    $NombreCompleto = $_POST['NombreCompleto'];
    $Correo = $_POST['Correo'];
    $Contraseña = $_POST['Contraseña'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $Genero = $_POST['Genero'];
    $TipoDoc = $_POST['TipoDoc'];
    $NumDoc = $_POST['NumDoc'];
    $Telefono = $_POST['Telefono'];

    // Verificar que no haya campos vacíos
    if (empty($NombreCompleto) || empty($Correo) || empty($Contraseña) || empty($FechaNacimiento) || empty($Genero) || empty($TipoDoc) || empty($NumDoc) || empty($Telefono)) {
        die("Por favor complete todos los campos requeridos.");
    }

    $sql = "INSERT INTO usuarios (Usuario_id, NombreCompleto, Correo, Contraseña, FechaNacimiento, Genero, TipoDoc, NumDoc, Telefono) 
            VALUES (null, '$NombreCompleto', '$Correo', '$Contraseña', '$FechaNacimiento', '$Genero', '$TipoDoc', '$NumDoc', '$Telefono')";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Usuario Registrado";
        header("Location: iniciosesion.html");
        exit();
    } else {
        echo "Error al registrar Usuario" . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>