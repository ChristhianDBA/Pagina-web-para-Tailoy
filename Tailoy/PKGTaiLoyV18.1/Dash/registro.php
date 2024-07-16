<?php
session_start();
$server = "localhost";
$user = "root";
$pass = "";
$db = "tailoydbYes";

$conexion = new mysqli($server, $user, $pass, $db);

if ($conexion->connect_error) {
    die("La conexión falló: " . $conexion->connect_error);
}

if (isset($_POST['registro'])) {
    $NombreCompleto = $_POST['NombreCompleto'];
    $Correo = $_POST['Correo'];
    $Contraseña = sha1($_POST['Contraseña']); // Encriptar la contraseña usando SHA-1
    $TipoUsuario = $_POST['TipoUsuario'];

    $insertarDatos = "INSERT INTO administracion (NombreCompleto, Correo, Contraseña, TipoUsuario) VALUES ('$NombreCompleto', '$Correo', '$Contraseña', '$TipoUsuario')";

    $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

    if ($ejecutarInsertar) {
        echo "Registro exitoso";
    } else {
        echo "Error en el registro: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear un Usuario</h3></div>
                                    <div class="card-body">
                                        <form action="#" name="ejemplo" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="NombreCompleto" placeholder="Enter your first name" />
                                                        <label for="inputFirstName">Nombre Completo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="Correo" placeholder="nombre@taiLoy.com" />
                                                <label for="inputEmail">Dirección de correo</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" name="Contraseña" placeholder="Crea una contraseña" />
                                                        <label for="inputPassword">Contraseña</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="text" name="TipoUsuario" placeholder="Administrador o Analista" />
                                                        <label for="inputPasswordConfirm">Nivel de privilegios</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="registro">Crear Usuario</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">¿Ya tienes una cuenta? Inicia sesion</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
