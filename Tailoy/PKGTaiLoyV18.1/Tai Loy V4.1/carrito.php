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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TaiLoy.com.pe</title>
    <link rel="icon" type="image/jpg" href="/image/logo_tayloy.jpg">
    <link rel="stylesheet" href="style.carrito.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/5f0400070f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="menu container">
            <a href="Carga.html" class="logo">Tai-Loy.com</a>
            <input type="checkbox" id="menu" />
            <label for="menu"><img src="image/menu.png" class="menu-mini-icono" alt=""></label>
            <div class="btn-menu">
                <div class="btn-menu">
                    <a href="#" id="categorias-link" class="categorias-link"><i class="fa-solid fa-bars"></i>Categorias</a>
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
                        <?php if (isset($_SESSION['NombreCompleto'])) : ?>
                            <li><a><?php echo $_SESSION['NombreCompleto']; ?></a></li>
                        <?php else : ?>
                            <li><a href="Carga2.html"><i class="far fa-user"></i> Iniciar Sesión</a></li>
                            <li><a href="CargaR.html"><i class="fas fa-cogs"></i> Registrarse</a></li>
                        <?php endif; ?>
                    </ul>
                </ul>
            </nav>

            <div class="capa"></div>
            <input type="checkbox" id="menu-toggle">
            <div class="container-menu">
                <div class="cont-menu" id="menu-desplegable">

                    <nav class="nav">
                        <u class="icono">Tai-Loy.com</u>
                        <br><br><br><br><br><br><br>

                        <ul class="list">

                            <li class="list__item list__item--click">
                                <div class="list__button list__button--click">

                                    <a href="#" class="nav__link">Principal</a>
                                    <img src="assets/arrow.svg" class="list__arrow">
                                </div>

                                <ul class="list__show">
                                    <li class="list__inside">
                                        <a href="#lista-1" class="nav__link nav__link--inside">Variados</a>
                                    </li>

                                    <li class="list__inside">
                                        <a href="#lista-10" class="nav__link nav__link--inside">Otros</a>
                                    </li>
                                </ul>

                            </li>

                            <li class="list__item list__item--click">
                                <div class="list__button list__button--click">

                                    <a href="#" class="nav__link">Arte y diseño</a>
                                    <img src="assets/arrow.svg" class="list__arrow">
                                </div>

                                <ul class="list__show">
                                    <li class="list__inside">
                                        <a href="#lista-5" class="nav__link nav__link--inside">Dibujo</a>
                                    </li>

                                    <li class="list__inside">
                                        <a href="#lista-8" class="nav__link nav__link--inside">Pintura</a>
                                    </li>
                                </ul>

                            </li>

                            <li class="list__item list__item--click">
                                <div class="list__button list__button--click">

                                    <a href="#" class="nav__link">Escolar y Universitario</a>
                                    <img src="assets/arrow.svg" class="list__arrow">
                                </div>

                                <ul class="list__show">
                                    <li class="list__inside">
                                        <a href="#lista-9" class="nav__link nav__link--inside">Utiles</a>
                                    </li>

                                    <li class="list__inside">
                                        <a href="#lista-4" class="nav__link nav__link--inside">Cuadernos y
                                            blocks</a>
                                    </li>
                                    <li class="list__inside">
                                        <a href="#lista-6" class="nav__link nav__link--inside">Libros</a>
                                    </li>

                                    <li class="list__inside">
                                        <a href="#lista-7" class="nav__link nav__link--inside">Mochilas,
                                            cartucheras y loncheras</a>
                                    </li>
                                </ul>

                            </li>

                        </ul>
                    </nav>
                    <li><a for="menu" class="close-icon"><i class="fa-solid fa-x"></i></a></li>
                </div>
            </div>

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


        <div class="header-content container">
            <div class="swiper mySwiper-1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="header-info">
                            <?php $sql = $conexion->prepare("SELECT * FROM productos WHERE id_Productos=130 AND Stock >= 1");
                            $sql->execute();

                            $resultado = $sql->get_result();

                            if ($resultado->num_rows > 0) {
                                while ($row = $resultado->fetch_assoc()) {
                            ?>
                                    <div class="header-txt">
                                        <h1><?php echo $row['NombreProducto'] ?></h1>
                                        <div class="prices">
                                            <p class="price-1">S/<?php echo $row['PrecioNormal'] ?></p>
                                            <p class="price-2">S/<?php echo $row['Precio'] ?></p>
                                        </div>
                                    </div>
                                    <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3" class="btn-1">Información</a>
                        </div>

                        <div class="header-img">
                            <img src="<?php echo $row['imglink'] ?>" alt="" width="500px">
                        </div>
                <?php
                                }
                            } else {
                                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
                            }
                ?>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </header>
    <script src="carritos.js"></script>
    <hr>

    <section class="promos container" id="lista-1">
        <h2>Promociones en Arte</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Promociones Arte' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>ID PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>
    </section>

    <hr>

    <div class="promotions-block">
        <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/06+05/carruseles/web-cintillo.jpg">
    </div>

    <hr>

    <section class="products container" id="lista-2">
        <h2>Casio potenciando tus conocimientos</h2>
        <div class="swiper mySwiper-2">
            <div class="swiper-wrapper">
                <?php
                $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Calculadoras' AND Stock >= 1");
                $sql->execute();
                $resultado = $sql->get_result();

                if ($resultado->num_rows > 0) {
                    while ($row = $resultado->fetch_assoc()) {
                ?>
                        <div class="swiper-slide">
                            <div class="product">
                                <div class="product-row"> <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                                    <div class="product-txt">
                                        <h3><?php echo htmlspecialchars($row['Marca']); ?></h3>
                                        <p><?php echo htmlspecialchars($row['NombreProducto']); ?></p>
                                        <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                                        <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                                        <h5>ID PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                                        <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
                }
                ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <hr>



    <section class="promos container" id="lista-3">
        <h2>Nuevos Productos en Oferta</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Nuevo' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>
    </section>

    <section class="promos container" id="lista-4">
        <h2>Cuadernos y Blocks</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Cuadernos y Blocks' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>
    </section>


    <section class="promos container" id="lista-5">
        <h2>Dibujo</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Dibujo' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>

    </section>

    <section class="promos container" id="lista-6">
        <h2>Libros y Cuentos</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Libros y Cuentos' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>

    </section>

    <section class="promos container" id="lista-7">
        <h2>Mochilas, Cartucheras y Loncheras</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Mochilas, Cartucheras y Loncheras' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>

    </section>

    <section class="promos container" id="lista-8">
        <h2>Pintura</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Pintura' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>

    </section>

    <section class="promos container" id="lista-9">
        <h2>Utiles</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Utiles' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>

    </section>

    <section class="promos container" id="lista-10">
        <h2>Otros</h2>
        <div class="categories">
            <?php
            $sql = $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'Otros' AND Stock >= 1");
            $sql->execute();
            $resultado = $sql->get_result();

            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
            ?>
                    <div class="categorie">
                        <div class="categorie-1">
                            <h3><?php echo htmlspecialchars($row['NombreProducto']); ?></h3>
                            <h5><?php echo htmlspecialchars($row['Marca']); ?></h5>
                            <h5>CATEGORIA: <?php echo htmlspecialchars($row['Categoria']); ?></h5>
                            <div class="prices">
                                <p class="price-1">S/<?php echo htmlspecialchars($row['PrecioNormal']); ?></p>
                                <p class="precio">S/<?php echo htmlspecialchars($row['Precio']); ?></p>
                            </div>
                            <h5>COD PRODUCTO: <?php echo htmlspecialchars($row['id_Productos']); ?></h5>
                            <a href="Vista.php?id=<?php echo $row['id_Productos']; ?> & categoria=<?php echo urlencode($row['Categoria']); ?>" class="agregar-carrito btn-3">Más Información</a>
                        </div>
                        <div class="categorie-img">
                            <img src="<?php echo htmlspecialchars($row['imglink']); ?>" alt="">
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No se encontraron productos de la categoría 'Arte' con stock mayor o igual a 1.</p>";
            }
            ?>
        </div>

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
                <li><a href="#">Politica de privacidad</a></li>
                <li><a href="#">Tratamiento de datos</a></li>
            </ul>
        </div>
        <div class="link">
            <h3>Servicio al cliente</h3>
            <ul>
                <li><a href="#">Contactanos</a></li>
                <li><a href="#">Comprobantes</a></li>
                <li><a href="#">Politica de privacidad</a></li>
                <li><a href="#">Cambios y devoluciones</a></li>
            </ul>
        </div>
        <div class="link">
            <h3>Colaboradores</h3>
            <p>
                <li><a href="http://localhost/PKGTaiLoy3.0/PKGTaiLoy3.0/Dash/index.php">Iniciar sesión</a></li>
                <li><a id="cerrar-sesion" href="#">Cerrar Sesión</a></li>
                <li><a href="#">Portal de Ayuda</a></li>
                <li><a href="#">Contactanos</a></li>

            </p>
        </div>

    </footer>


</body>

<!--ENVIO DE DATOS FORM-->

<!--SINOFUNCIONABANROYDEUNA A ALE-->

<?php

if (isset($_POST['registro'])) {
    //Crear Venta

    $NombreCompleto = $_POST['NombreCompleto'];
    $CorreoElectronico = $_POST['CorreoElectronico'];
    $Direccion = $_POST['Direccion'];
    $Ciudad = $_POST['Ciudad'];
    $Pais = $_POST['País'];
    $DetalleTarjeta = $_POST['DetalleTarjeta'];
    $NombreTarjeta = $_POST['NombrePropietario'];
    $NTarjeta = $_POST['Ntarjeta'];
    $DatoExpiracion = $_POST['DatoExpiracion'];
    $Cvv = $_POST['cvv'];
    $STotal = $_POST['STotal'];
    $Cantidad =  $_POST['Cantidad'];

    $insertarDatos = "INSERT INTO venta VALUES('$NombreCompleto', '$CorreoElectronico', '$Direccion',
  '$Ciudad', '$Pais', '$DetalleTarjeta', '$NombreTarjeta', '$NTarjeta', '$DatoExpiracion', '$Cvv', '$STotal', '$Cantidad', '')";

    $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

    //Actualizar cantidad del producto
    if ($ejecutarInsertar) {
        // Actualizar cantidad del producto
        $productos = json_decode($_POST['productos'], true);

        mysqli_autocommit($conexion, FALSE); // Desactivar autocommit
        mysqli_begin_transaction($conexion); // Iniciar transacción

        foreach ($productos as $producto) {
            $id = $producto['id'];
            $cantidad = $producto['cantidad'];

            // Obtener la cantidad original del producto
            $consultaCantidad = "SELECT cantidad FROM productos WHERE id = '$id'";
            $resultadoCantidad = mysqli_query($conexion, $consultaCantidad);
            $cantidadOriginal = mysqli_fetch_assoc($resultadoCantidad)['cantidad'];

            // Actualizar la cantidad en la base de datos
            $actualizarCantidad = "UPDATE productos SET cantidad = $cantidadOriginal - $cantidad WHERE id = '$id'";
            $ejecutarActualizarCantidad = mysqli_query($conexion, $actualizarCantidad);

            if (!$ejecutarActualizarCantidad) {
                // Revertir transacción si hay un error al actualizar la cantidad
                mysqli_rollback($conexion);
                echo "Error: No se pudo actualizar la cantidad del producto.";
                exit;
            }
        }

        if ($ejecutarInsertar && $ejecutarActualizarCantidad) {
            // Si todas las consultas se ejecutan correctamente, confirmar transacción
            mysqli_commit($conexion);
            echo "Venta realizada y stock actualizado correctamente.";
        } else {
            // Si hay algún error, revertir transacción
            mysqli_rollback($conexion);
            echo "Error: No se pudo completar la compra.";
        }

        // Reactivar autocommit
        mysqli_autocommit($conexion, TRUE);
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}

?>

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