<?php
include('conexion.php');
session_start();

if($_POST){
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM administracion WHERE Correo = '$correo'";
    $resultado = $conexion->query($sql);
    $num = $resultado->num_rows;

    if($num > 0){
        $row = $resultado->fetch_assoc();
        $password_bd = $row['Contraseña'];

        $pass_c = sha1($password);

        if($password_bd == $pass_c){
            session_start();
            $_SESSION['id_administracion'] = $row['id_administracion'];
            $_SESSION['Correo'] = $row['Correo'];
            $_SESSION['NombreCompleto'] = $row['NombreCompleto'];
            $_SESSION['TipoUsuario'] = $row['TipoUsuario'];
            header("Location: principal.php");
        } else {
            header("Location: index fallo de sesion.php");
        }
    } else {
        header("Location: index fallo de sesion.php");
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
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de Sesión ADMINISTRADOR</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="correo" type="correo" placeholder="name@example.com" />
                                                <label for="inputEmail">Correo</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recordar Contraseña</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">¿Ha olvidado su contraseña?</a>
                                                <button type="submit" class="btn btn-primary" href="index.html">Inicio de sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">¿Necesita una cuenta? Regístrese</a></div>
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
                            <div class="text-muted">Copyright &copy; Tay Loy 2024</div>
                            <div>
                                <a href="#">Políticas de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
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
