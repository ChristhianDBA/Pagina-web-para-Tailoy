<?php
include 'conexion.php';

class VentasModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getSubtotales()
    {
        $sql = "SELECT subtotal FROM detalleventa";

        $result = $this->conexion->query($sql);

        if ($result === false) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['subtotal'];
        }

        $result->free();

        // Devolver los datos en formato JSON
        return json_encode($data);
    }
}


if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$model = new VentasModel($conexion);
$subtotales = $model->getSubtotales();

// Imprimir los datos en formato JSON
header('Content-Type: application/json');
echo $subtotales;

$conexion->close();
