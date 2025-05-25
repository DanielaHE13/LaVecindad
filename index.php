<?php
session_start();
require_once("logica/Administrador.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="bg-light">

    <?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <strong>¡Sesión cerrada exitosamente!</strong> Has salido del sistema.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <!-- Encabezado -->
    <div class="row align-items-center my-3 py-2 bg-success-subtle">
        <div class="col-md-4 col-sm-12 text-center">
            <img src="img/logo.png" alt="Logo" class="rounded-circle img-fluid" style="max-width: 250px;" />
        </div>
        <div class="col-md-8 col-sm-12 ps-5">
            <h1 class="text-success"><i class="fa-solid fa-handshake"></i> Administración La Vecindad</h1>
            <p class="text-muted">
                Gestión financiera y atención integral para nuestros residentes.
            </p>
        </div>
    </div>

    <!-- Contenedor de sesion-->
    <div class="container text-center">
        <div class="border border-success-subtle p-5 rounded-4 bg-warning-subtle">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6 mb-3 mb-md-0">
                    <img class="img-fluid rounded"
                        src="https://images.ctfassets.net/8lc7xdlkm4kt/1JKk00RYuhPKADRdNydJ4Y/1ed671c2ede0f05f1f95e41bbebab0c9/LOBBY.jpg"
                        alt="Lobby" />
                </div>
                <div class="col-sm-12 col-md-6">
                    <form class="p-3" method="POST" action="presentacion/Auteticacion.php">
                        <h2 class="m-3 text-white rounded-3 bg-success p-2">
                            Autenticar
                        </h2>

                        <div class="mb-3">
                            <input type="email" name="correo" class="form-control" placeholder="Ingresar Correo" required />
                        </div>

                        <div class="mb-3">
                            <input type="password" name="clave" class="form-control" placeholder="Ingresar contraseña" required />
                        </div>

                        <button type="submit" name="autenticar" class="btn btn-success text-white">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
