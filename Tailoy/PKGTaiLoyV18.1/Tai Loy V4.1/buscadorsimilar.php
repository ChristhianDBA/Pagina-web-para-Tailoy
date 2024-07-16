<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$db = "tailoydbyes";

$conexion = new mysqli($server, $user, $pass, $db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.Vista.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="Vista.js"> </script>
    <title>Vista Productos</title>
</head>

<body>
    <header class="header">
        <div class="menu container">
            <a href="Carga.html" class="logo">Tai-Loy.com</a>
            <input type="checkbox" id="menu" />
            <label for="menu"><img src="image/menu.png" class="menu-icono" alt=""></label>
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
                            <form class="search-form" method="POST" action="Buscador.php" >
                                <input type="search" name="Buscadorcito" placeholder="Buscar..." />
                                <button class="btn-search" name="Buscar">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </li>
                    </div>
                <ul>
                <?php if(isset($_SESSION['NombreCompleto'])): ?>
                            <li><a ><?php echo $_SESSION['NombreCompleto']; ?></a></li>
            <?php else: ?>
                    <li><a href="Carga2.html"><i class="far fa-user"></i> Iniciar Sesión</a></li>
                    <li><a href="CargaR.html"><i class="fas fa-cogs"></i> Registrarse</a></li>
                    <?php endif; ?>

                </ul>
            </ul>
            </nav>
            <div>
                <ul>
                    <li class="submenu">
                        <img src="image/car2cuchao30final.png" id="img-carrito" alt="carritoImg">
                        <div id="carrito">
                            <table id="lista-carrito">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <a href="#" id="vaciar-carrito" class="btn-3">Vaciar Carrito</a>
                            <a href="#" id="ir-a-pagar" class="btn-3">Ir a Pagar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    
    <section class="container-related-products">
    <h6 style="text-align: center">No se encontro el producto</h6>
    <br><br>
    <h2>PRODUCTOS SIMILARES</h2>
    <div class="card-list-products">
    <?php
        include "conexion.php";
        if (isset($_GET['categoria'])) {
            $categoria = $_GET['categoria'];
            // Modifica la consulta SQL para que no incluya el id_Productos
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = ? AND Stock >= 1");
            // Solo un parámetro de enlace ahora
            $sql->bind_param("s", $categoria);
            $sql->execute();
            $resultado = $sql->get_result();
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
    ?>
    <div class="card">
        <div class="card-img">
            <a href="vista.php?id=<?php echo htmlspecialchars($row['id_Productos']); ?>&categoria=<?php echo htmlspecialchars($row['Categoria']); ?>">
                <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="1">
            </a>
        </div>
        <div class="info-card">
            <div class="text-product">
                <h3>
                    <a href="vista.php?id=<?php echo htmlspecialchars($row['id_Productos']); ?>&categoria=<?php echo htmlspecialchars($row['Categoria']); ?>">
                        <?php echo htmlspecialchars($row['NombreProducto']); ?>
                    </a>
                </h3>
                <p class="categorie">
                CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?>
                </p>
            </div>
            <div class="price">S/<?php echo htmlspecialchars($row['Precio']); ?></div>
        </div>
    </div>
    <?php
                }
            } else {
                echo "<p>No se encontraron productos en la categoría '$categoria' con stock mayor o igual a 1.</p>";
            }
        } else {
            echo "<p>No se especificó una categoría válida.</p>";
        }
    ?>
    </div>
</section>



    </section>

    <footer class="footer container">
        <div class="link">
            <h3>Acerca de Tai Loy</h3>
            <ul>
                <li><a href="Nosotros.html">Nuestra misión y visión</a></li>
                <li><a href="Nosotros.html">Nuestras tiendas</a></li>
                <li><a href="Nosotros.html">Nosotros</a></li>
            </ul>
        </div>
        <div class="link">
            <h3>Libro de reclamaciones</h3>
            <ul>
                <li><a href="#">Respaldo de equipo legal</a></li>
                <li><a href="#">Terminos y condiciones</a></li>
                <li><a href="#">Tratamiento de datos</a></li>
            </ul>
        </div>
        <div class="link">
            <h3>Servicio al cliente</h3>
            <ul>
                <li><a href="#">Contactanos</a></li>
                <li><a href="#">Cambios y devoluciones</a></li>
            </ul>
        </div>
        <div class="link">
            <h3>Proovedor</h3>
            <p>
                <li><a href="#">Portal</a></li>
                <li><a href="index.php">Iniciar sesión</a></li>
                <li><a id="cerrar-sesion" href="#">Cerrar Sesión</a></li>
            </p>
        </div>

    </footer>
</body>
<script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
<script src="carrito.js"></script>
</html>

<script>
    document.getElementById('cerrar-sesion').addEventListener('click', function(e) {
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