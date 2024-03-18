<?php
session_start(); // Inicia la sesión si no está iniciada aún

// Define y verifica si el usuario ha iniciado sesión
$usuarioHaIniciadoSesion = isset($_SESSION['usuarioHaIniciadoSesion']) && $_SESSION['usuarioHaIniciadoSesion'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita sin sesión</title>
    <link rel="stylesheet" href="CSS/header.css">
    <script src="https://kit.fontawesome.com/bca873c580.js"></script>
    
</head>
<body>
    <header  class="header">
    <div class="logo-header">
            <a href="index.php"><img src="img/logo.png" alt="" ></a>
    </div>
        <!-- <div class="search-bar">
            <input type="search" placeholder="Buscar...">
            <i class="fa-solid fa-magnifying-glass"></i> 
        </div> -->
        <div class="nav-menu">
        <input type="checkbox" id="check">    
            <label for="check" class="checkbtn">
                <i class="menu-icon"><img src="img/6499731.png" alt=""></i>
            </label>
            <ul>
                <li><button class="button"><a href="suscripciones(precio).php">Suscripción</a></button></li>
                <li><button class="button"><a href="citaSinSesion.php">Cita</a></button></li>
                <li><button class="button"><a href="terapia-online(talleres).php">Cursos</a></button></li>
                <li><button class="button"><a href="sobreNosotros.php">Nosotros</a></button></li>
                <li><button id="loginButton" class="button register-button"><a href="iniciaSesion.php">Log In</a></button></li>
                <li><button id="miCuentaButton" class="buttton micuenta-button" style="display: none;"><a href="cuentaPerfil.php">Mi perfil</a></button></li>
            </ul>
        </div>
    </header>

    <script>
        // Define la variable usuarioHaIniciadoSesion en JavaScript
        var usuarioHaIniciadoSesion = <?php echo ($usuarioHaIniciadoSesion) ? "true" : "false"; ?>;
        console.log("El usuario ha iniciado sesión: " + usuarioHaIniciadoSesion); // Imprime en consola

        window.onload = function() {
            console.log("La página se ha cargado completamente.");

            var loginButton = document.getElementById('loginButton');
            var miCuentaButton = document.getElementById('miCuentaButton');

            if (usuarioHaIniciadoSesion) {
                console.log("El usuario ha iniciado sesión. Mostrando botón Mi Cuenta.");
                // Si el usuario ha iniciado sesión, muestra el botón "Mi Cuenta" y oculta el botón "Log In"
                loginButton.style.display = 'none';
                miCuentaButton.style.display = 'inline-block';
                miCuentaButton.addEventListener('click', function() {
                    console.log("Se hizo clic en el botón Mi perfil.");
                    window.location.href = 'cuentaPerfil.php';
                });
            } else {
                console.log("El usuario no ha iniciado sesión. Mostrando botón Log In.");
                // Si el usuario no ha iniciado sesión, muestra el botón "Log In" y oculta el botón "Mi Cuenta"
                loginButton.style.display = 'inline-block';
                miCuentaButton.style.display = 'none'; // Ocultar el botón "Mi Cuenta"
                loginButton.addEventListener('click', function() {
                    console.log("Se hizo clic en el botón Log In.");
                    window.location.href = 'iniciaSesion.php';
                });
            }
        };
    </script>

</body>
</html>
