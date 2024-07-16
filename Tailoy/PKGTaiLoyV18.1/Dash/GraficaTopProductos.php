<?php
include 'conexion.php';

class DetalleVentaModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getTopProductos()
    {
        $sql = "
            SELECT id_Productos, SUM(cantidad) as cantidad_total
            FROM detalleventa
            GROUP BY id_Productos
            ORDER BY cantidad_total DESC
        ";

        $result = $this->conexion->query($sql);

        if ($result === false) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'id_Productos' => $row['id_Productos'],
                'cantidad_total' => $row['cantidad_total']
            ];
        }

        $result->free();

        // Devolver los datos en formato JSON
        return json_encode($data);
    }
}

$model = new DetalleVentaModel($conexion);
$topProductos = $model->getTopProductos();

// Imprimir los datos en formato JSON
header('Content-Type: application/json');
echo $topProductos;

$conexion->close();
?>
