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
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">Sistema Tay Loy</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
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
                            Información sobre la los empleados registrados, brindado por la empresa Tay Loy.
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tabla Asignada
                        </div>
                        <div class="card-body">
                                <?php
                                if ($tipo_usuario == "Administrador") {

                                    // Función para eliminar usuario 2.0
                                    if (isset($_GET['Eliminar'])) {
                                        $id = intval($_GET['Eliminar']);
                                        $query = "DELETE FROM administracion WHERE id_administracion = $id";
                                        if ($conexion->query($query) === TRUE) {
                                        } else {
                                            echo "Error al eliminar usuario: " . $conexion->error;
                                        }
                                    }

                                    // Función para actualizar usuario 2.0
                                    if (isset($_POST['edicion'])) {
                                        $Correo = ($_POST['CorreoEU']);
                                        $NombreCompleto = ($_POST['NombreCompletoEU']);
                                        $TipoUsuario = ($_POST['TipoUsuarioEU']);
                                        $id = $_POST['id'];

                                        $query = "UPDATE administracion SET Correo='$Correo', NombreCompleto='$NombreCompleto', TipoUsuario='$TipoUsuario' WHERE id_administracion='$id'";

                                        if ($conexion->query($query) === TRUE) {
                                        } else {
                                            echo "Error al actualizar usuario: " . $conexion->error;
                                        }
                                    }

                                    // Función para agregar usuario 2.0
                                    if (isset($_POST['guardar'])) {

                                        $Correo = ($_POST['CorreoMD']);
                                        $NombreCompleto = ($_POST['NombreCompletoMD']);
                                        $Contraseña = sha1($_POST['ContraseñaMD']); //Encriptado cuantico :3
                                        $TipoUsuario = ($_POST['TipoUsuarioMD']);
                                        $query = "INSERT INTO administracion (Correo, NombreCompleto, Contraseña, TipoUsuario) VALUES ('$Correo', '$NombreCompleto', '$Contraseña', '$TipoUsuario')";
                                        if ($conexion->query($query) === TRUE) {
                                        } else {
                                            echo "Error al agregar usuario: " . $conexion->error;
                                        }
                                    }

                                    $query = "SELECT id_administracion, Correo, NombreCompleto, TipoUsuario FROM administracion;";
                                    $resultado = $conexion->query($query);

                                    if ($resultado->num_rows > 0) {
                                        ?>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addModal">Agregar Colaborador</button>
                                        </div>
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>Correo</th>
                                                    <th>Nombre Completo</th>
                                                    <th>Tipo Usuario</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = $resultado->fetch_assoc()) { ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($row['Correo']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['NombreCompleto']); ?></td>
                                                        <td><?php echo htmlspecialchars($row['TipoUsuario']); ?></td>
                                                        <td>
                                                        <button class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#editModal<?php echo $row['id_administracion']; ?>">Editar</button>
                                                          <a href="TablaAdministradores.php?Eliminar=<?php echo $row['id_administracion']; ?>"
                                                          class="btn btn-danger"
                                                          onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="editModal<?php echo $row['id_administracion']; ?>"
                                                        tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editModalLabel">Editar Usuario</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>

                                                                <!-- VENTANA DE EDICIÓN Administradores 2.0-->

                                                                <form action="#" name="edicion" method="post">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id"
                                                                            value="<?php echo $row['id_administracion']; ?>">
                                                                        <div class="mb-3">
                                                                            <label for="Correo" class="form-label">Correo</label>
                                                                            <input type="email" name="CorreoEU" class="form-control"
                                                                                value="<?php echo htmlspecialchars($row['Correo']); ?>">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="NombreCompleto" class="form-label">Nombre
                                                                                Completo</label>
                                                                            <input type="text" class="form-control" id="NombreCompleto"
                                                                                name="NombreCompletoEU"
                                                                                value="<?php echo htmlspecialchars($row['NombreCompleto']); ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="TipoUsuario" class="form-label">Tipo
                                                                                Usuario</label>
                                                                            <select class="form-select" id="TipoUsuario"
                                                                                name="TipoUsuarioEU">
                                                                                <option value="Administrador" <?php echo ($row['TipoUsuario'] == 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                                                                                <option value="Analista" <?php echo ($row['TipoUsuario'] == 'Analista') ? 'selected' : ''; ?>>Analista</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary">Cancelar</button>
                                                                        <button type="submit" name="edicion"
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
                                        <p>No se encontraron usuarios registrados.</p>
                                    <?php } ?>
                                <?php } else if ($tipo_usuario == "Analista") { ?>
                                        <h1>Vista de Analista</h1>
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

        <!-- Ventanita para Administradores 2.0-->

        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Agregar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" name="usuarios" method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="Correo" class="form-label">Correo</label>
                                <input type="email" name="CorreoMD" class="form-control" placeholder="ejemplo@tailoy.com">
                            </div>
                            <div class="mb-3">
                                <label for="NombreCompleto" class="form-label">Nombre Completo</label>
                                <input type="text" name="NombreCompletoMD" class="form-control" placeholder="Danielle Marsh">
                            </div>
                            <div class="mb-3">
                                <label for="Contraseña" class="form-label">Contraseña</label>
                                <input type="password" name="ContraseñaMD" class="form-control" placeholder="******">
                            </div>
                            <div class="mb-3">
                                <label for="TipoUsuario" class="form-label">Tipo Usuario</label>
                                <select class="form-select" name="TipoUsuarioMD">
                                    <option value="Administrador">Administrador</option>
                                    <option value="Analista">Analista</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-secondary">
                            <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Datos">
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