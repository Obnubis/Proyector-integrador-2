<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesión</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/cerrarSesion1.css">
    <link rel="icon" type="image" href="img/logo.png">

    <style>
        /* Estilo para el mensaje */
        #mensaje {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 10px;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-container">
        <div class="background-image image-27"></div>
        <div class="cerrar-sesion">
            <div class="contenido">
                <span class="mi-perfil">MI PERFIL</span>

                <div class="contenido-7">
                    <div class="frame-8">
                        <div class="frame-9">
                            <!-- menu de perfil -->
                            <?php include 'menu.php'; ?>
                        </div>
                        <!-- contenido  -->
                        <div class="cosas">
                            <span class="seguro-cerrar-sesion">¿Seguro que desea cerrar sesión?</span>
                            <div class="frame-10">
                                <button class="primary-buttons-11 micuenta-button" onclick="cerrarSesionYRedirigir()">SI</button>
                                <button class="primary-buttons-13 micuenta-button" onclick="mostrarMensaje('Muchas gracias por seguir trabajando con nosotros')">NO</button>
                            </div>
                            <div class="image-removebg-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </div>

    <!-- Contenedor del mensaje -->
    <div id="mensaje"></div>

    <!-- Script para mostrar el mensaje y redirigir después de 2 segundos -->
    <script>
        function mostrarMensajeYRedirigir(mensaje) {
            var mensajeElement = document.getElementById('mensaje');
            mensajeElement.innerText = mensaje;
            mensajeElement.style.display = 'block';
            setTimeout(function() {
                mensajeElement.style.display = 'none';
                // Redireccionar a index.php después de 2 segundos
                window.location.href = 'index.php';
            }, 2000); // Redirigir después de 2 segundos
        }

        function cerrarSesionYRedirigir() {
            // Hacer una solicitud al servidor para cerrar la sesión
            fetch('logout.php')
            .then(response => {
                if (response.ok) {
                    // Una vez que la sesión se ha cerrado en el servidor, muestra el mensaje y redirige
                    mostrarMensajeYRedirigir('Sesión cerrada. ¡Gracias por visitarnos!');
                } else {
                    throw new Error('No se pudo cerrar la sesión');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }


        function mostrarMensaje(mensaje) {
            var mensajeElement = document.getElementById('mensaje');
            mensajeElement.innerText = mensaje;
            mensajeElement.style.display = 'block';
            setTimeout(function() {
                mensajeElement.style.display = 'none';
            }, 3000); // Oculta el mensaje después de 3 segundos
        }
    </script>
</body>
</html>
