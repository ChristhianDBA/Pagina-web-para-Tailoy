<!--Verificación de usuario-->

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Sistema Tay Loy</a>
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
                                Diseños
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                                aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Paginas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                        data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                        aria-controls="pagesCollapseAuth">
                                        Autenticación
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                        data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Iniciar sesión</a>
                                            <a class="nav-link" href="registro.php">Registrarse</a>
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
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
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







        <!---CONTENDIO DEL HOME GRAFIICO-->

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning">
                                <div class="card-body d-flex text-white">
                                    Ventas
                                    <i class="fas fa-user fa-2x m-lg-auto"></i>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a href="tables.php" class="text-white">Ver
                                        detalles</a>
                                    <span class="text-white">5</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary">
                                <div class="card-body d-flex text-white">
                                    Colaboradores
                                    <i class="fas fa-user fa-2x m-lg-auto"></i>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a href="<?php echo $tablaAUsuariosUrl; ?>Usuarios" class="text-white">Ver
                                        detalles</a>
                                    <span class="text-white">5</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger">
                                <div class="card-body d-flex text-white">
                                    Productos
                                    <i class="fab fa-product-hunt fa-2x m-lg-auto"></i>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a href="<?php echo $tablaAUsuariosUrl; ?>Usuarios" class="text-white">Ver
                                        detalles</a>
                                    <span class="text-white">5</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-secondary">
                                <div class="card-body d-flex text-white">
                                    Usuarios
                                    <i class="fas fa-users fa-2x m-lg-auto"></i>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a href="<?php echo $tablaAUsuariosUrl; ?>Usuarios" class="text-white">Ver
                                        detalles</a>
                                    <span class="text-white">5</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!---GRAFICOS DE VENTAS MINIMOS Y TOP-->

                    <div class="row mt-2">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Ventas Totales
                                </div>
                                <div class="card-body">
                                    <canvas id="VentasChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <script>
                            // Función para cargar los datos y renderizar la gráfica
                            function loadChart() {
                                fetch('GraficaVentas.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const ctx = document.getElementById('VentasChart').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'bar', // Puedes cambiar el tipo de gráfico aquí
                                            data: {
                                                labels: data.map((_, index) => `Venta ${index + 1}`), // Etiquetas para los datos
                                                datasets: [{
                                                    label: 'Subtotal de Ventas',
                                                    data: data,
                                                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                                    borderColor: 'rgba(153, 102, 255, 1)',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error al cargar los datos:', error));
                            }

                            // Llamar a la función para cargar los datos y renderizar la gráfica
                            loadChart();
                        </script>



                        <!---GRAFICOS TEST DINAMICO-->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Stock de dinamicooo
                                </div>
                                <div class="card-body">
                                    <canvas id="TopVentas" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Función para cargar los datos y renderizar la gráfica
                            function loadChart() {
                                fetch('ModeloMetodosGraficos.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const ctx = document.getElementById('TopVentas').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: data.map((_, index) => `Producto ${index + 1}`), // Etiquetas para los datos
                                                datasets: [{
                                                    label: 'Stock',
                                                    data: data,
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error al cargar los datos:', error));
                            }

                            // Llamar a la función para cargar los datos y renderizar la gráfica
                            loadChart();
                        </script>


                    </div>



                    <hr>



                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabla Ventas
                        </div>
                        <div class="card-body">
                            <?php
                            // Suponiendo que $tipo_usuario contiene el rol del usuario actual
                            if ($rol == "Administrador") {
                                // Consulta a la base de datos para obtener los datos de ventas
                                $query = "SELECT IdVenta, NombreCompleto, CorreoElectronico, Direccion, Ciudad, Pais, STotal AS Total FROM venta;";
                                $resultado = $conexion->query($query); // $conexion es tu conexión a la base de datos
                            
                                if ($resultado->num_rows > 0) {
                                    ?>
                                    <table id="datatablesSimple" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre Completo</th>
                                                <th>Correo Electronico</th>
                                                <th>Direccion</th>
                                                <th>Ciudad</th>
                                                <th>Pais</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre Completo</th>
                                                <th>Correo Electronico</th>
                                                <th>Direccion</th>
                                                <th>Ciudad</th>
                                                <th>Pais</th>
                                                <th>Total</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['NombreCompleto']; ?></td>
                                                    <td><?php echo $row['CorreoElectronico']; ?></td>
                                                    <td><?php echo $row['Direccion']; ?></td>
                                                    <td><?php echo $row['Ciudad']; ?></td>
                                                    <td><?php echo $row['Pais']; ?></td>
                                                    <td><?php echo $row['Total']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo "No se encontraron resultados.";
                                }
                            } elseif ($rol == "Analista") {
                                // Consulta a la base de datos para obtener todos los usuarios
                                $query = "SELECT * FROM usuarios";
                                $resultado = $conexion->query($query); // $conexion es tu conexión a la base de datos
                            
                                if ($resultado->num_rows > 0) {
                                    ?>
                                    <table id="datatablesSimple" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Numero de Documento</th>
                                                <th>Telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $resultado->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['Usuario_id']; ?></td>
                                                    <td><?php echo $row['NombreCompleto']; ?></td>
                                                    <td><?php echo $row['Correo']; ?></td>
                                                    <td><?php echo $row['FechaNacimiento']; ?></td>
                                                    <td><?php echo $row['NumDoc']; ?></td>
                                                    <td><?php echo $row['Telefono']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    echo "No se encontraron usuarios.";
                                }
                            } else {
                                // Manejo para otros roles o situaciones no contempladas
                                echo "Acceso no autorizado.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; TaiLoy 2024</div>
                        <div>
                            <a href="#">Privacidad y politica</a>
                            &middot;
                            <a href="#">Terminos &amp; Condiciones</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
   graficos
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>