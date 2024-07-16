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
    <script src="Vistas.js"> </script>
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
                    <a href="carrito.php" id="categorias-link" class="categorias-link"><i class="fa-solid fa-bars"></i>Inicio</a>
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
                    <ul>
                        <?php if (isset($_SESSION['NombreCompleto'])) : ?>
                            <li><a><?php echo $_SESSION['NombreCompleto']; ?></a></li>
                        <?php else : ?>
                            <li><a href="Carga2.html"><i class="far fa-user"></i> Iniciar Sesión</a></li>
                            <li><a href="CargaR.html"><i class="fas fa-cogs"></i> Registrarse</a></li>
                        <?php endif; ?>
                    </ul>
                </ul>
            </nav>
            <div>
                <ul>
                    <li class="submenu">
                        <a href="Compra.php">
                            <img src="image/car2cuchao30final.png" id="img-carrito" alt="carritoImg">
                            <span id="num_cant"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <?php
    include "conexion.php";
    if (isset($_GET['id'])) {
        $idProducto = intval($_GET['id']);
        $sql = $conexion->prepare("SELECT * FROM productos WHERE id_Productos = ?");
        $sql->bind_param("i", $idProducto);
        $sql->execute();
        $resultado = $sql->get_result();
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
    ?>
                <div class="container-tittle"><?php echo htmlspecialchars($row['NombreProducto']); ?></div>
                <main>
                    <div class="containerimg">
                        <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                    </div>
                    <div class="container-info-product">
                        <div class="container-price">
                            <span>Precio: S/<?php echo htmlspecialchars($row['Precio']); ?></span>

                            <h5> COD PRODUCTO:
                                <?php echo htmlspecialchars($row['id_Productos']); ?>
                            </h5>
                            <h5>MARCA:
                                <?php echo htmlspecialchars($row['Marca']); ?>
                            </h5>
                        </div>

                        <div>
                            <div class="container-add-cart">
                                <div class="container-quantity">
                                    <input type="number" placeholder="1" value="1" min="1" class="input-quantity" id="quantity-<?php echo $row['id_Productos']; ?>" data-id="<?php echo $row['id_Productos']; ?>">
                                </div>
                                <div class="btn-increment-decrement">
                                    <i class="fa-solid fa-chevron-up" id="increment"></i>
                                    <i class="fa-solid fa-chevron-down" id="decrement"></i>
                                </div>
                                <button class="btn-add-to-cart" onclick="addToCart(<?php echo $row['id_Productos']; ?>)">
                                    <i class="fa-solid fa-plus"></i>Añadir al carrito
                                </button>
                            </div>
                            <div class="container-description">
                                <div class="tittle-description">
                                    <h4>Descripción</h4>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="text-description">
                                    <p><?php echo htmlspecialchars($row['Descripcion']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="container-additional-information">
                                <div class="tittle-additional-information">
                                    <h4>Información Adicional</h4>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                <div class="text-additional-information hidden">
                                    <p><?php echo htmlspecialchars($row['Caracteristicas']); ?>
                                    </p>
                                </div>
                            </div>
                            <div class="container-social">
                                <span>Compartir</span>
                                <div class="container-buttons-social">
                                    <a href="https://www.facebook.com/tailoy.oficial"><i class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/tailoy.oficial?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><i class="fa-brands fa-instagram"></i></a>
                                    <a href="https://x.com/tailoyoficial"><i class="fa-brands fa-x-twitter"></i></a>
                                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                                    <a href="https://www.tiktok.com/@tailoy.oficial?is_from_webapp=1&sender_device=pc"><i class="fa-brands fa-tiktok"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>
                <script>
                    function addToCart(productId) {
                        const quantityInput = document.getElementById('quantity-' + productId);
                        if (quantityInput) {
                            const quantity = quantityInput.value;
                            const url = 'Compra.php?id=' + productId + '&cantidad=' + quantity;
                            window.location.href = url;
                        } else {
                            console.error('Quantity input not found for product ID:', productId);
                        }
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelectorAll('.btn-add-to-cart').forEach(function(button) {
                            button.addEventListener('click', function() {
                                const productId = this.getAttribute('data-id');
                                addToCart(productId);
                            });
                        });
                    });
                </script>
    <?php
            }
        }
    } else {
        echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
    }
    ?>

    <section class="container-related-products">
        <h2>Productos similares</h2>
        <div class="card-list-products">
            <?php
            include "conexion.php";
            if (isset($_GET['categoria'])) {
                $categoria = $_GET['categoria'];
                $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = ? AND Stock >= 1 AND id_Productos != ? LIMIT 4");
                $sql->bind_param("si", $categoria, $idProducto);
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
                                    <a href="vista.php?id=<?php echo htmlspecialchars($row['id_Productos']); ?>&categoria=<?php echo htmlspecialchars($row['Categoria']); ?>">
                                        <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                                    </a>
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