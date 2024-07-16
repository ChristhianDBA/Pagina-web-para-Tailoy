<?php
include 'conexion.php';

class ProductoModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getStock($limit = 5, $offset = 0)
    {
        $sql = "SELECT NombreProducto, Stock FROM productos LIMIT ? OFFSET ?";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = [
                'producto' => $row['NombreProducto'],
                'stock' => $row['Stock']
            ];
        }

        $result->free();
        $stmt->close();

        // Devolver los datos en formato JSON
        return json_encode($data);
    }
}

$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$model = new ProductoModel($conexion);
$stocks = $model->getStock($limit, $offset);

header('Content-Type: application/json');
echo $stocks;

$conexion->close();
?>
