<?php

include 'conexion.php';

if (isset($_POST['Agregar'])) {
        $NombreCompleto = $_POST['Nombre'];
        $Correo = $_POST['Correo'];
        $Contraseña = $_POST['Contraseña'];
        $FechaNacimiento = $_POST['FechaNacimiento'];
        $Genero = $_POST['Genero'];
        $TipoDoc = $_POST['TipoDoc'];
        $NumDoc = $_POST['NumDoc'];
        $Telefono = $_POST['Telefono'];

        $sql = "INSERT INTO usuarios (Usuario_id, NombreCompleto, Correo, Contraseña, FechaNacimiento, Genero, TipoDoc, NumDoc, Telefono) 
        VALUES (null,'$NombreCompleto', '$Correo', '$Contraseña','$FechaNacimiento','$Genero','$TipoDoc', '$NumDoc','$Telefono')";
        $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "Usuario Registrado";
        header("Location: TablaUsuarios.php");
        exit();
    } else {
        echo "Error al registrar usuario" . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    }
?>