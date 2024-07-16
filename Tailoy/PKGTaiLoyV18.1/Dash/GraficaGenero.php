<?php
include 'conexion.php';

class UsuarioModel
{
    private $conexion;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }

    public function getGenderStats()
    {
        $sql = "
            SELECT 
                SUM(CASE WHEN Genero = 'Masculino' THEN 1 ELSE 0 END) as Masculino,
                SUM(CASE WHEN Genero = 'Femenino' THEN 1 ELSE 0 END) as Femenino
            FROM usuarios
        ";

        $result = $this->conexion->query($sql);

        if ($result === false) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        $data = $result->fetch_assoc();

        // Devolver los datos en formato JSON
        return json_encode($data);
    }
}

$model = new UsuarioModel($conexion);
$genderStats = $model->getGenderStats();

// Imprimir los datos en formato JSON
header('Content-Type: application/json');
echo $genderStats;

// Cerrar la conexión
$conexion->close();
?>
