<?php
session_start();
require 'conexion.php';

if(!isset($_SESSION['NombreCompleto'])){
    header("Location: index.php");
}
$tipo_usuario = $_SESSION['TipoUsuario'];

if($tipo_usuario == "Administrador"){
    $sql = "SELECT IdVenta, NombreCompleto, CorreoElectronico, Direccion, Ciudad, Pais, STotal AS Total FROM venta;";
} else if ($tipo_usuario == "Analista"){
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
        include 'EliminarUsuario.php';
        ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Sistema Tay Loy</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $rol  ?><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
                        <li><hr class="dropdown-divider" /></li>
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
                            <?php if($rol == "Administrador") { ?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.php">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.php">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="registro.php">Registro</a>
                                            <a class="nav-link" href="password.php">Recuperar contraseña</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
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
                        <?php echo $nombre?>
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
                                Información sobre todos los Usuarios registrados, brindado por la empresa Tay Loy.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Usuarios
                            </div>
                            <div class="card-body">
<?php
    $query = "SELECT * FROM usuarios;";
    $resultado = $conexion->query($query);

    if ($resultado->num_rows > 0) {
?>
        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Agregar Usuario</button>
        </div>
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Genero</th>
                    <th>Tipo de Documento</th>
                    <th>Numero de Documento</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['Usuario_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['NombreCompleto']); ?></td>
                    <td><?php echo htmlspecialchars($row['Correo']); ?></td>
                    <td><?php echo htmlspecialchars($row['Contraseña']); ?></td>
                    <td><?php echo htmlspecialchars($row['FechaNacimiento']); ?></td>
                    <td><?php echo htmlspecialchars($row['Genero']); ?></td>
                    <td><?php echo htmlspecialchars($row['TipoDoc']); ?></td>
                    <td><?php echo htmlspecialchars($row['NumDoc']); ?></td>
                    <td><?php echo htmlspecialchars($row['Telefono']); ?></td>
                    <td>
                        
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['Usuario_id']; ?>">Editar</button>
                        <a href="TablaUsuarios.php?id=<?php echo $row['Usuario_id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
                <div class="modal fade" id="editModal<?php echo $row['Usuario_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="EditarUsuario.php"  method="POST" >
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['Usuario_id']; ?>">
                                    <div class="mb-3">
                                        <label for="NombreCompleto" class="form-label">Nombre del Usuario</label>
                                        <input type="text" class="form-control" id="Nombre" name="NombreActualizado" value="<?php echo htmlspecialchars($row['NombreCompleto']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Correo" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="Correo" name="CorreoActualizado" value="<?php echo htmlspecialchars($row['Correo']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Contraseña" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="Contraseña" name="ContraseñaActualizada" value="<?php echo htmlspecialchars($row['Contraseña']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimientoActualizado" value="<?php echo htmlspecialchars($row['FechaNacimiento']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Genero" class="form-label">Genero</label>
                                        <select class="form-select" id="Genero" name="GeneroActualizado" required>
                                            <option value="Masculino" <?php echo ($row['Genero'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                                            <option value="Femenino" <?php echo ($row['Genero'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                                            <option value="No especificado" <?php echo ($row['Genero'] == 'No especificado') ? 'selected' : ''; ?>>No especificado</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="TipoDoc" class="form-label">Tipo de Documento</label>
                                        <select class="form-select" id="TipoDoc" name="TipoDocActualizado" required>
                                            <option value="DNI" <?php echo ($row['TipoDoc'] == 'DNI') ? 'selected' : ''; ?>>DNI</option>
                                            <option value="Pasaporte" <?php echo ($row['TipoDoc'] == 'Pasaporte') ? 'selected' : ''; ?>>Pasaporte</option>
                                            <option value="Carnet de Extranjeria" <?php echo ($row['TipoDoc'] == 'CarnetdeExtranjeria') ? 'selected' : ''; ?>>Carnet de Extranjeria</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="NumDoc" class="form-label">Numero de Documento</label>
                                        <input type="text" class="form-control" id="NumDoc" name="NumDocActualizado" value="<?php echo htmlspecialchars($row['NumDoc']); ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Telefono" class="form-label">Telefono</label>
                                        <input type="text" class="form-control" id="Telefono" name="TelefonoActualizado" value="<?php echo htmlspecialchars($row['Telefono']); ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="Editar" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </tbody>
        </table>
    
<?php } else { ?>
        <p>No se encontraron usuarios registrados.</p>
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
<!-- Ventanita para agregar usuarios-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Agregar Usuarios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="AgregarUsuario.php" method="POST">
                <div class="modal-body">
                <input type="hidden" name="id" value="<?php echo $row['Usuario_id']; ?>">
                                    <div class="mb-3">
                                        <label for="NombreCompleto" class="form-label">Nombre del Usuario</label>
                                        <input type="text" class="form-control" id="Nombre" name="Nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Correo" class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="Correo" name="Correo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Contraseña" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="Contraseña" name="Contraseña">
                                    </div>
                                    <div class="mb-3">
                                        <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="FechaNacimiento" name="FechaNacimiento">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Genero" class="form-label">Genero</label>
                                        <select class="form-select" id="Genero" name="Genero">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                            <option value="No especificado">No especificado</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="TipoDoc" class="form-label">Tipo de Documento</label>
                                        <select class="form-select" id="TipoDoc" name="TipoDoc">
                                            <option value="DNI">DNI</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="NumDoc" class="form-label">Numero de Documento</label>
                                        <input type="text" class="form-control" id="NumDoc" name="NumDoc">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Telefono" class="form-label">Telefono</label>
                                        <input type="text" class="form-control" id="Telefono" name="Telefono">
                                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" name="Agregar" class="btn btn-primary" value="Guardar Datos">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
