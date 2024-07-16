<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$db = "tailoydbyes";

$conexion = new mysqli($server, $user, $pass, $db);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.Compra.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5f0400070f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Tai Loy - Compra</title>
</head>

<body>

    <header class="header">
        <div class="menu container">
            <a href="Carga.html" class="logo">Tai-Loy.com</a>
            <input type="checkbox" id="menu" />
            <label for="menu"><img src="image/menu.png" class="menu-mini-icono" alt=""></label>
            <div class="btn-menu">
                <div class="btn-menu">
                    <a href="carrito.php" id="categorias-link" class="categorias-link"><i
                            class="fa-solid fa-bars"></i>Inicio</a>
                </div>
            </div>
            <nav class="navbar">
                <ul class="nav-list">
                    <div class="search">
                        <li>
                            <form class="search-form" method="POST" action="Buscador.php">
                                <input type="search" name="Buscadorcito" placeholder="Buscar..." />
                                <button class="btn-search" name="Buscar">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </li>
                    </div>
                    <!-- Usuario ingresa al sistema-->
                    <ul>
                        <?php if (isset($_SESSION['NombreCompleto'])): ?>
                            <li><a><?php echo $_SESSION['NombreCompleto']; ?></a></li>
                        <?php else: ?>
                            <li><a href="Carga2.html"><i class="far fa-user"></i> Iniciar Sesión</a></li>
                            <li><a href="CargaR.html"><i class="fas fa-cogs"></i> Registrarse</a></li>
                        <?php endif; ?>
                    </ul>
                </ul>

            </nav>
            <div class="capa"></div>
            <div class="container-menu">
                <div class="cont-menu" id="menu-desplegable">
                    <li><a for="menu" class="close-icon"><i class="fa-solid fa-x"></i></a></li>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="ContenedorPago">
            <form class="CompraInfo" name="tailoydbyes" action="procesarCompra.php" method="post">
                <div class="Fila">
                    <div class="columna">
                        <!--Entrada de datos Personales-->
                        <h3 class="titulo">Datos Personales</h3>
                        <div class="EntradaTexto">
                            <span>Nombre Completo:</span>
                            <input type="text" id="NOMBRE" name="NombreCompleto" placeholder="Danielle Marsh" required>
                        </div>
                        <div class="EntradaTexto">
                            <span>CorreoElectronico:</span>
                            <input type="email" id="CORREO" name="CorreoElectronico" placeholder="Danielle@ejemplo.com"
                                required>
                        </div>
                        <div class="EntradaTexto">
                            <span>Dirección:</span>
                            <input type="text" id="DIRECCIÓN" name="Direccion" placeholder="123 Calle Principal"
                                required>
                        </div>
                        <div class="flex">
                            <div class="EntradaTexto">
                                <span>Ciudad:</span>
                                <input type="text" id="CIUDAD" name="Ciudad" placeholder="Lima" required>
                            </div>
                            <div class="EntradaTexto">
                                <span>Pais:</span>
                                <input type="text" id="PAÍS" name="País" placeholder="Perú" required>
                            </div>
                        </div>
                    </div>

                    <!--Entrada de datos Bancarios-->

                    <div class="columna">
                        <h3 class="titulo">Datos de pago</h3>
                        <div class="EntradaTexto">
                            <span>Nombre del propietario:</span>
                            <input type="text" id="NOMBRE" name="NombrePropietario" placeholder="Danielle June Marsh "
                                required>
                        </div>
                        <div class="EntradaTexto">
                            <span>Tipo Tarjeta:</span>
                            <select name="DetalleTarjeta">
                                <option></option>
                                <option value="Debito">Debito</option>
                                <option value="Credito">Credito</option>
                            </select>
                        </div>
                        <div class="EntradaTexto">
                            <span>Numero de tarjeta:</span>
                            <input type="number" id="NUMERO" name="Ntarjeta" placeholder="1111 2222 3333 4444" required>
                        </div>
                        <div class="flex">
                            <div class="EntradaTexto">
                                <span>Fecha de Expiración:</span>
                                <input type="month" id="EXPIRACION" name="DatoExpiracion" placeholder="03/26" required>
                            </div>
                            <div class="EntradaTexto">
                                <span>CVV:</span>
                                <input type="text" id="CVV" name="cvv" placeholder="123" required>
                            </div>
                        </div>
                    </div>
                    <!--Area de productos agregados al carrito-->

                    <?php

                    // Verificar si se recibió un nuevo producto para agregar
                    if (isset($_GET['id']) && isset($_GET['cantidad'])) {
                        $id = intval($_GET['id']);
                        $cantidad = intval($_GET['cantidad']);
                        // Preparar la consulta SQL
                        $sql = $conexion->prepare("SELECT * FROM productos WHERE id_Productos = ?");
                        $sql->bind_param("i", $id);
                        $sql->execute();
                        $resultado = $sql->get_result();
                        // Guardar los resultados en un array con la cantidad
                        $producto = array();
                        while ($fila = $resultado->fetch_assoc()) {
                            $fila['cantidad'] = $cantidad; // Agregar la cantidad al array $fila
                            // Agregar el producto al carrito en la sesión
                            $_SESSION['carrito'][] = $fila;
                        }
                    }
                    // Calcular el total del carrito
                    $total = 0;
                    if (!empty($_SESSION['carrito'])) {
                        foreach ($_SESSION['carrito'] as $item) {
                            $subtotal = $item['Precio'] * $item['cantidad'];
                            $total += $subtotal;
                        }
                    }
                    ?>

                    <section>
                        <table id="Compra" class="tablacarrito">
                            <thead class="TCarrito">
                                <tr>
                                    <th class="Datos">Producto</th>
                                    <th class="Datos">Marca</th>
                                    <th class="Datos">Precio</th>
                                    <th class="Datos">Cantidad</th>
                                    <th class="Datos">Subtotal</th>
                                    <th class="Datos">Imagen</th>
                                    <th class="Datos">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="lista-compra" class="Tamaño">
                                <?php
                                if (isset($_SESSION['carrito']) && is_array($_SESSION['carrito'])) {
                                    foreach ($_SESSION['carrito'] as $item):
                                        ?>
                                        <tr>
                                            <td><?php echo $item['NombreProducto']; ?></td>
                                            <td><?php echo $item['Marca']; ?></td>
                                            <td><?php echo $item['Precio']; ?></td>
                                            <td><?php echo $item['cantidad']; ?></td>
                                            <td><?php echo number_format($item['Precio'] * $item['cantidad'], 2); ?></td>
                                            <td><img src="<?php echo $item['imglink']; ?>" alt="Imagen del producto" width="150"
                                                    height="150"></td>
                                            <td><a
                                                    href="EliminarPcarrito.php?id=<?php echo $item['id_Productos']; ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                } else {
                                    echo '<tr><td colspan="7">No hay productos en el carrito</td></tr>';
                                }
                                ?>
                            </tbody>

                        </table>
                        <table style="float: right;">
                            <tr>
                                <td align="right"><strong>Total: S/ <span
                                            id="total"><?php echo number_format($total, 2); ?></span></strong></td>
                            </tr>
                        </table>
                        <input type="hidden" id="hiddenTotal" name="Total" value="<?php echo $total; ?>" />
                    </section>


                </div>
                <button class="Boton" type="submit" name="RealizarCompra">Pagar</button>
            </form>

        </div>
    </section>

</body>

</html>

<!--METODOS DE ENVIO DE DATOS--->

<script>
    document.getElementById('cerrar-sesion').addEventListener('click', function (e) {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        fetch('cerrar_sesion.php', {
            method: 'POST',
            credentials: 'same-origin' // Enviar cookies al servidor para identificar la sesión
        })
            .then(response => {
                if (response.ok) {
                    window.location.href = 'carrito.php'; // Redirigir a la página de inicio después de cerrar sesión
                } else {
                    console.error('Error al cerrar sesión');
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>