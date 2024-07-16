<?php
include 'conexion.php';

class ProductoModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getStock()
    {
        // Consulta SQL para obtener la columna "Stock" de la tabla "productos"
        $sql = "SELECT Stock FROM productos";

        $result = $this->conexion->query($sql);

        // Comprobar si la consulta se ejecutó correctamente
        if ($result === false) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row['Stock'];
        }

        $result->free();

        // Devolver los datos en formato JSON
        return json_encode($data);
    }
    
}


// Instanciar el modelo y obtener los datos
$model = new ProductoModel($conexion);
$stocks = $model->getStock();

// Imprimir los datos en formato JSON
header('Content-Type: application/json');
echo $stocks;

// Cerrar la conexión
$conexion->close();
?>
