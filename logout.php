<?php
// Inicia la sesión si no está iniciada
session_start();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión
header("Location: index.php"); // Cambia "login.php" por la página a la que deseas redirigir después de cerrar sesión
exit;
?>
