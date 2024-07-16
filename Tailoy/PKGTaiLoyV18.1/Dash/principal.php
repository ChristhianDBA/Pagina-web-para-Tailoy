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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Sistema Tay Loy</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $rol ?><i class="fas fa-user fa-fw"></i></a>
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

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Autenticación
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Iniciar sesión</a>
                                            <a class="nav-link" href="registro.php">Registrarse</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
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
                    <!---
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
                                    <span class="text-white"></span>
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
                                    <span class="text-white"></span>
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
                                    <span class="text-white"></span>
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
                                    <span class="text-white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    DESACTIVADOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->


                    <!---GRAFICOS DE VENTAS-->

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
                            function loadChart() {
                                fetch('GraficaVentas.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const ctx = document.getElementById('VentasChart').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: data.map((_, index) => `Venta ${index + 1}`), // Etiquetas para los datos
                                                datasets: [{
                                                    label: 'Total de Ventas',
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

                            loadChart();
                        </script>


                        <!--------------------------------------------------------------------------------------------------->

                        <!---GRAFICOS STOCK-->
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header bg-dark text-white">
                                    Stock de productos
                                </div>
                                <div class="card-body">
                                    <canvas id="StockGrafico" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                        <script>
                            function loadChart() {
                                fetch('GraficoStocK.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const ctx = document.getElementById('StockGrafico').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: data.map(item => item.producto), // Nombres de los productos en el eje X
                                                datasets: [{
                                                    label: 'Stock',
                                                    data: data.map(item => item.stock), // Cantidades de stock en el eje Y
                                                    fill: true,
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    borderWidth: 1,
                                                    tension: 0.4
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                scales: {
                                                    x: {
                                                        title: {
                                                            display: true,
                                                            text: 'Producto'
                                                        }
                                                    },
                                                    y: {
                                                        beginAtZero: true,
                                                        title: {
                                                            display: true,
                                                            text: 'Stock'
                                                        }
                                                    }
                                                },
                                                plugins: {
                                                    legend: {
                                                        position: 'top'
                                                    },
                                                    tooltip: {
                                                        callbacks: {
                                                            label: function(tooltipItem) {
                                                                return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                            }
                                                        }
                                                    }
                                                },
                                                animation: {
                                                    duration: 1000, // Duración de la animación en milisegundos
                                                    easing: 'easeInOutBounce' // Efecto de la animación
                                                }
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error al cargar los datos:', error));
                            }

                            loadChart();
                        </script>


                        <!--------------------------------------------------------------------------------------------------->


                        <!---GRAFICO DE GENERO-->
                        <div class="row mt-2">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        Tasa de Género
                                    </div>
                                    <div class="card-body">
                                        <canvas id="GenderChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function loadGenderChart() {
                                    fetch('GraficaGenero.php')
                                        .then(response => response.json())
                                        .then(data => {
                                            const ctx = document.getElementById('GenderChart').getContext('2d');
                                            new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: ['Masculino', 'Femenino'], // Etiquetas para los géneros
                                                    datasets: [{
                                                        label: 'Cantidad de Usuarios',
                                                        data: [data.Masculino, data.Femenino],
                                                        backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                                                        borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    indexAxis: 'y', // Cambia el eje a horizontal o otro
                                                    responsive: true,
                                                    scales: {
                                                        x: {
                                                            beginAtZero: true
                                                        }
                                                    },
                                                    plugins: {
                                                        legend: {
                                                            position: 'top'
                                                        },
                                                        tooltip: {
                                                            callbacks: {
                                                                label: function(tooltipItem) {
                                                                    return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                                }
                                                            }
                                                        },
                                                        animation: {
                                                            duration: 1500, // Duración de la animación en milisegundos
                                                            easing: 'easeInOutBounce'
                                                        }
                                                    }
                                                }
                                            });
                                        })
                                        .catch(error => console.error('Error al cargar los datos:', error));
                                }

                                loadGenderChart();
                            </script>


                            <!---GRAFICOS STOCK-->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        Stock de productos
                                    </div>
                                    <div class="card-body">
                                        <canvas id="StockTest" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function loadChart() {
                                fetch('GraficoStock.php')
                                    .then(response => response.json())
                                    .then(data => {
                                        const ctx = document.getElementById('StockTest').getContext('2d');
                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: data.map(item => item.producto),
                                                datasets: [{
                                                    label: 'Stock',
                                                    data: data.map(item => item.stock),
                                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                    borderColor: 'rgba(75, 192, 192, 1)',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                responsive: true,
                                                indexAxis: 'y',
                                                scales: {
                                                    x: {
                                                        title: {
                                                            display: true,
                                                            text: 'Stock'
                                                        }
                                                    },
                                                    y: {
                                                        title: {
                                                            display: true,
                                                            text: 'Nombre del Producto'
                                                        },
                                                        ticks: {
                                                            // Rotar las etiquetas para que sean legibles
                                                            autoSkip: false,
                                                            callback: function(value) {
                                                                return value.length > 20 ? value.substr(0, 20) + '...' : value;
                                                            }
                                                        }
                                                    }
                                                },
                                                plugins: {
                                                    legend: {
                                                        position: 'top'
                                                    },
                                                    tooltip: {
                                                        callbacks: {
                                                            label: function(tooltipItem) {
                                                                return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                            }
                                                        }
                                                    }
                                                },
                                                animation: {
                                                    duration: 1000, // Duración de la animación en milisegundos
                                                    easing: 'easeInOutBounce' // Efecto de la animación
                                                }
                                            }
                                        });
                                    })
                                    .catch(error => console.error('Error al cargar los datos:', error));
                            }

                            loadChart();
                        </script>

                        <!---GRAFICO DE TOP PRODUCTOS VENDIDOS-->
                        <div class="row mt-2">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        Top Productos Vendidos
                                    </div>
                                    <div class="card-body">
                                        <canvas id="TopProductosChart" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <script>
                                // Función para cargar los datos y renderizar la gráfica
                                function loadTopProductosChart() {
                                    fetch('GraficaTopProductos.php')
                                        .then(response => response.json())
                                        .then(data => {
                                            const ctx = document.getElementById('TopProductosChart').getContext('2d');
                                            new Chart(ctx, {
                                                type: 'doughnut', // Tipo de gráfico: línea con puntos
                                                data: {
                                                    labels: data.map(item => `Producto ${item.id_Productos}`), // Etiquetas para los productos
                                                    datasets: [{
                                                        label: 'Cantidad Vendida',
                                                        data: data.map(item => item.cantidad_total), // Datos de cantidad vendida
                                                        backgroundColor: data.map(() => `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`), // Colores aleatorios
                                                        borderColor: data.map(() => `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`), // Colores de borde aleatorios
                                                        borderWidth: 1
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    },
                                                    plugins: {
                                                        legend: {
                                                            position: 'top'
                                                        },
                                                        tooltip: {
                                                            callbacks: {
                                                                label: function(tooltipItem) {
                                                                    return `${tooltipItem.label}: ${tooltipItem.raw}`;
                                                                }
                                                            }
                                                        },
                                                        animation: {
                                                            duration: 1000, // Duración de la animación en milisegundos
                                                            easing: 'easeInOutBounce' // Efecto de la animación
                                                        }
                                                    }
                                                }
                                            });
                                        })
                                        .catch(error => console.error('Error al cargar los datos:', error));
                                }

                                loadTopProductosChart();
                            </script>

                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header bg-dark text-white">
                                        TaiLoy
                                    </div>
                                    <div class="card-body">
                                        <img src="https://seeklogo.com/images/T/tai-loy-logo-0ADD4B04A8-seeklogo.com.png" width="540" height="540" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <hr>




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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>