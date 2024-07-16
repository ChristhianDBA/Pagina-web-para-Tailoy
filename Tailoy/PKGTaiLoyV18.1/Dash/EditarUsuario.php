<?php
include 'conexion.php';

if (isset($_POST['Editar'])) {
    $Usuario_id = intval($_POST['id']);
    $NombreCompleto = $_POST['NombreActualizado'];
    $Correo = $_POST['CorreoActualizado'];
    $Contraseña = $_POST['ContraseñaActualizada'];
    $FechaNacimiento = $_POST['FechaNacimientoActualizado'];
    $Genero = $_POST['GeneroActualizado'];
    $TipoDoc = $_POST['TipoDocActualizado'];
    $NumDoc = $_POST['NumDocActualizado'];
    $Telefono = $_POST['TelefonoActualizado'];

    $sql = "UPDATE usuarios SET NombreCompleto = ?, Correo = ?, Contraseña = ?, FechaNacimiento = ?, Genero = ?, TipoDoc = ?, NumDoc = ?, Telefono = ? WHERE Usuario_id = ?";
    
    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        echo "Error al preparar la consulta SQL: " . $conexion->error;
    } else {
        $stmt->bind_param("ssssssssi", $NombreCompleto, $Correo, $Contraseña, $FechaNacimiento, $Genero, $TipoDoc, $NumDoc, $Telefono, $Usuario_id);
        
        if ($stmt->execute()) {
            header("Location: TablaUsuarios.php");
            exit();
        } else {
            echo "Error al actualizar el usuario: " . $stmt->error;
        }
    }
}
?>