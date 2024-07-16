<?php
session_start();
include('conexion.php');

$usuario = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$consulta="SELECT*FROM usuarios WHERE Correo='$usuario' AND Contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);


$consultaNombre = "SELECT NombreCompleto FROM usuarios WHERE Correo='$usuario'";
$resultadoNombre = mysqli_query($conexion, $consultaNombre);


if ($resultado && mysqli_num_rows($resultado) > 0) {
       
    if ($_SESSION['correo'] = $usuario){
        session_start();
        if ($resultadoNombre) {
            $fila = mysqli_fetch_assoc($resultadoNombre);
            if ($fila) {
                $_SESSION['NombreCompleto'] = $fila['NombreCompleto'];
            } else {
                echo "No se encontró el usuario con el correo proporcionado.";
            }
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
        }
        header("Location: index.php");
        exit();
    }

}else{

    header("Location: iniciosesion fallida.html");
    exit();
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>