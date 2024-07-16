<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['NombreCompleto'])) {
    header("Location: index.php");
}
$tipo_usuario = $_SESSION['TipoUsuario'];

if ($tipo_usuario == "Administrador") {
    $sql = "SELECT IdVenta, NombreCompleto, CorreoElectronico, Direccion, Ciudad, Pais, STotal AS Total FROM venta;";
} else if ($tipo_usuario == "Analista") {
    $sql = "SELECT * FROM usuarios";
}

$resultado = $conexion->query($sql);
$nombre = $_SESSION['NombreCompleto'];
$rol = $_SESSION['TipoUsuario'];



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Tay Loy</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    include 'conexion.php';
    include 'EliminarProductos.php';
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Sistema Tay Loy</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><?php echo $rol ?><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Configuración</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Configuración</div>
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if ($rol == "Administrador") { ?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.php">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                                aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                        aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="registro.php">Registro</a>
                                            <a class="nav-link" href="password.php">Recuperar contraseña</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#pagesCollapseError" aria-expanded="false"
                                        aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.php">401 Page</a>
                                            <a class="nav-link" href="404.php">404 Page</a>
                                            <a class="nav-link" href="500.php">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                        <?php } ?>
                        <div class="sb-sidenav-menu-heading">Tabla de datos</div>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabla Ventas
                        </a>
                        <a class="nav-link" href="TablaAdministradores.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabla Colaboradores
                        </a>
                        <a class="nav-link" href="TablaProductos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabla de Productos
                        </a>
                        <a class="nav-link" href="TablaUsuarios.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tabla de Usuarios
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Conectado como:</div>
                    <?php echo $nombre ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            Información sobre la los productos agregados, brindado por la empresa Tay Loy.
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabla Productos
                        </div>
                        <div class="card-body">
                            <?php
                            $query = "SELECT * FROM productos;";
                            $resultado = $conexion->query($query);

                            if ($resultado->num_rows > 0) {
                                ?>
                                <div class="mb-3">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addModal">Agregar Producto</button>
                                </div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>IdProductos</th>
                                            <th>NombreProducto</th>
                                            <th>Marca</th>
                                            <th>Categoria</th>
                                            <th>Descripción</th>
                                            <th>Características</th>
                                            <th>PrecioNormal</th>
                                            <th>PrecioOferta</th>
                                            <th>Stock</th>
                                            <th>ing(link)</th>
                                            <th>Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['id_Productos']); ?></td>
                                                <td><?php echo htmlspecialchars($row['NombreProducto']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Marca']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Categoria']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Descripcion']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Caracteristicas']); ?></td>
                                                <td><?php echo htmlspecialchars($row['PrecioNormal']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Precio']); ?></td>
                                                <td><?php echo htmlspecialchars($row['Stock']); ?></td>
                                                <td><?php echo htmlspecialchars($row['imglink']); ?></td>
                                                <td>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editModal<?php echo $row['id_Productos']; ?>">Editar</button>
                                                    <a href="TablaProductos.php?id=<?php echo $row['id_Productos']; ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="editModal<?php echo $row['id_Productos']; ?>"
                                                tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Editar Producto</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="EditarProducto.php" method="POST">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $row['id_Productos']; ?>">
                                                                <div class="mb-3">
                                                                    <label for="NombreProducto" class="form-label">Nombre
                                                                        Producto</label>
                                                                    <input type="text" class="form-control" id="Nombre"
                                                                        name="NombreActualizado"
                                                                        value="<?php echo htmlspecialchars($row['NombreProducto']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Marca" class="form-label">Marca</label>
                                                                    <input type="text" class="form-control" id="Marca"
                                                                        name="MarcaActualizado"
                                                                        value="<?php echo htmlspecialchars($row['Marca']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Categoria" class="form-label">Tipo Categoria</label>
                                                                    <select class="form-select" id="Categoria" name="CategoriaActualizado" required>
                                                                        <option value="Promociones Arte" <?php echo ($row['Categoria'] == 'Promociones Arte') ? 'selected' : ''; ?>>Promociones Arte</option>
                                                                        <option value="Calculadoras" <?php echo ($row['Categoria'] == 'Calculadoras') ? 'selected' : ''; ?>>Calculadoras</option>
                                                                        <option value="Nuevo" <?php echo ($row['Categoria'] == 'Nuevo') ? 'selected' : ''; ?>>Nuevo</option>
                                                                        <option value="Cuadernos y Blocks" <?php echo ($row['Categoria'] == 'Cuadernos y Blocks') ? 'selected' : ''; ?>>Cuadernos y Blocks</option>
                                                                        <option value="Dibujo" <?php echo ($row['Categoria'] == 'Dibujo') ? 'selected' : ''; ?>>Dibujo</option>
                                                                        <option value="Libros y Cuentos" <?php echo ($row['Categoria'] == 'Libros y Cuentos') ? 'selected' : ''; ?>>Libros y Cuentos</option>
                                                                        <option value="Mochilas, Cartucheras y Loncheras" <?php echo ($row['Categoria'] == 'Mochilas, Cartucheras y Loncheras') ? 'selected' : ''; ?>>Mochilas, Cartucheras y Loncheras</option>
                                                                        <option value="Pintura" <?php echo ($row['Categoria'] == 'Pintura') ? 'selected' : ''; ?>>Pintura</option>
                                                                        <option value="Utiles" <?php echo ($row['Categoria'] == 'Utiles') ? 'selected' : ''; ?>> Utiles</option>
                                                                        <option value="Otros" <?php echo ($row['Categoria'] == 'Otros') ? 'selected' : ''; ?>> Otros</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Descripcion" class="form-label">Descripción</label>
                                                                    <input type="text" class="form-control" id="Descripcion"
                                                                        name="DescripcionActualizado"
                                                                        value="<?php echo htmlspecialchars($row['Descripcion']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Caracteristicas" class="form-label">Características</label>
                                                                    <input type="text" class="form-control" id="Caracteristicas"
                                                                        name="CaracteristicasActualizado"
                                                                        value="<?php echo htmlspecialchars($row['Caracteristicas']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Precio" class="form-label">Precio Normal</label>
                                                                    <input type="text" class="form-control" id="Precio"
                                                                        name="PrecioNormalActualizado"
                                                                        value="<?php echo htmlspecialchars($row['PrecioNormal']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Precio" class="form-label">Precio Oferta</label>
                                                                    <input type="text" class="form-control" id="Precio"
                                                                        name="PrecioOfertaActualizado"
                                                                        value="<?php echo htmlspecialchars($row['Precio']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="Stock" class="form-label">Stock</label>
                                                                    <input type="text" class="form-control" id="Stock"
                                                                        name="StockActualizado"
                                                                        value="<?php echo htmlspecialchars($row['Stock']); ?>"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="link" class="form-label">img</label>
                                                                    <input type="text" class="form-control" id="link"
                                                                        name="imglinkActualizado"
                                                                        value="<?php echo htmlspecialchars($row['imglink']); ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" name="Editar"
                                                                    class="btn btn-primary">Guardar Cambios</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            <?php } else { ?>
                                <p>No se encontraron productos registrados.</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Tai Loy 2024</div>
                        <div>
                            <a href="#">Privacidad</a>
                            &middot;
                            <a href="#">Terminos &amp; Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Ventanita para agregar productos-->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Agregar Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="AgregarProductos.php" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="NombreProducto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" id="Nombre" name="NombreProducto">
                            <div class="mb-3">
                                <label for="Marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="Marca" name="Marca">
                            </div>

                            <!--EDIT CATEGORY 2.0 MDV-->
                            <div class="mb-3">
                                <label for="Categoria" class="form-label">Tipo Categoria</label>
                                <select class="form-select" class="form-control" id="Categoria" name="Categoria">
                                    <option value="Promociones Arte">Promociones Arte</option>
                                    <option value="Calculadoras">Calculadoras</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Cuadernos y Blocks">Cuadernos y Blocks</option>
                                    <option value="Dibujo">Dibujo</option>
                                    <option value="Libros y Cuentos">Libros y Cuentos</option>
                                    <option value="Mochilas, Cartucheras y Loncheras">Mochilas, Cartucheras y Loncheras
                                    </option>
                                    <option value="Pintura">Pintura</option>
                                    <option value="Utiles">Utiles</option>
                                    <option value="Otros">Otros</option>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Precio" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="Precio" name="Descripcion">
                            </div> 
                            <div class="mb-3">
                                <label for="Precio" class="form-label">Características</label>
                                <input type="text" class="form-control" id="Precio" name="Caracteristicas">
                            </div>   
                            <div class="mb-3">
                                <label for="Precio" class="form-label">PrecioNormal</label>
                                <input type="text" class="form-control" id="Precio" name="PrecioNormal">
                            </div>
                            <div class="mb-3">
                                <label for="Precio" class="form-label">PrecioOferta</label>
                                <input type="text" class="form-control" id="Precio" name="PrecioOferta">
                            </div>
                            <div class="mb-3">
                                <label for="Stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="Stock" name="Stock">
                            </div>
                            <div class="mb-3">
                                <label for="link" class="form-label">img</label>
                                <input type="text" class="form-control" id="link" name="imglink">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" name="SinoseenviabanaRoberto" value="Guardar Datos"
                                class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>