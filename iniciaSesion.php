<?php session_start()?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
    <link rel="stylesheet" href="CSS/iniciaSesion1.css">
    <link rel="icon" type="image" href="img/logo.png">
</head>

<body>
    <div class="main-container" style="background-image: url('../img/fondo1.png');">
        <!-- <a href="index.php"><button class="cierre"></button></a> -->
        <div class="contenido">
            <div class="izquierda"></div>
            <form action="iniciaSesion.php" method="post" onsubmit="return validacion() && iniciarSesion()">
                <div class="derecha">
                    <h1 class="inicio-de-sesion">Iniciar Sesión</h1>
                    <div class="registrase">
                        <span class="primera">¿Es tu primera vez? </span>
                        <div class="registrase-boton">
                            <span class="button"><a href="registrarse.php">Registrate</a></span>
                        </div>
                    </div>
                    <div class="sesion">
                        <div class="usuario">
                            <div class="usuario-icon"></div>
                            <input type="email" id="usuario" class="nombre-usuario" name="usuario" placeholder="Correo de usuario">
                        </div>
                        <div class="contrasena">
                            <div class="invisible" onclick="togglePasswordVisibility()">
                <input type="password" id="contrasena" class="contrasena-usuario" placeholder="Contraseña" name="contrasena">
                
                  <!-- La imagen de la contraseña -->
                  <img src="icons/invisible_1.png" alt="visible">
                </div>
              </div>
                    </div>
                    <div class="parte3">
                        <div class="recuerdame">
                            <input type="checkbox" id="checkbox" name="checkbox" class="component">
                            <label class="recordame" for="checkbox">Recuérdame</label>
                        </div>
                        <span class="necesitas-ayuda"><a href="contacto.php">¿Necesitas ayuda?</a></span>
                    </div>
                    <button type="submit" class="botones-iniciar-sesion">
                        <span class="iniciar-sesion">Iniciar Sesión</span>
                    </button>
                    <span id="mensaje_error" style="color: red;"></span><br>
                    <span class="conectate-con">o conéctate con</span>
                    <div class="parte4">
                        <button class="boton-google">
                            <div class="google">
                                <div class="google-icon"></div>
                                <span class="google-texto">Google</span>
                            </div>
                        </button>
                        <button class="boton-facebook">
                            <div class="bxl-facebook"></div>
                            <span class="facebook">Facebook</span>
                        </button>
                    </div>
                </div>
            </form>
            <button class="volver-button" onclick="window.location.href = 'index.php';">Volver</button>

        </div>
        <div class="image"></div>
    </div>
    <?php
    // iniciamos la sesión

    include 'Base_Datos/crea_tabla.php';
    // Verificar si se ha enviado el formulario
    $usuario="";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener el usuario y la contraseña del formulario
      $usuario = $_POST['usuario'] ?? '';
      $contrasena = $_POST['contrasena'] ?? '';

      // Consultar la base de datos para obtener la contraseña hasheada asociada al usuario
      $sql = "SELECT * FROM usuario WHERE email='$usuario'";
      $resultado = mysqli_query($conexion, $sql);


      // Comprobar si se encontró un usuario con ese nombre
      if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $contrasena_hasheada = $fila['contraseña'];
        $usuario = $fila['id_usuario'];
        // Verificar si la contraseña introducida coincide con la contraseña hasheada
        if (password_verify($contrasena, $contrasena_hasheada)) {
          $_SESSION['usuario'] = $usuario;
          $_SESSION['usuarioHaIniciadoSesion'] = true;
          // Si coinciden, redirigir al usuario a la página de perfil
          header("Location: cuentaPerfil.php?usuario=$usuario");
          exit();
        } else {
          // Si no coinciden, mostrar un mensaje de error
          echo "La contraseña es incorrecta";
        }
      } else {
        // Si no se encuentra un usuario con ese nombre, mostrar un mensaje de error
        echo "No se encontró ningún usuario con ese nombre.";
      }

      mysqli_close($conexion);
    }
    ?>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("contrasena");
        var invisibleImage = document.querySelector(".invisible img");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            invisibleImage.src = "icons/ver.png";
        } else {
            passwordInput.type = "password";
            invisibleImage.src = "icons/invisible_1.png";
        }
    }

    function validacion() {
        var usuarioInput = document.getElementById("usuario").value;
        var contrasenaInput = document.getElementById("contrasena").value;

        // Expresión regular para validar un correo electrónico
        var emailRegex = /^\S+@\S+\.\S+$/;

        // Verificar si el usuario es un correo electrónico válido
        if (!emailRegex.test(usuarioInput)) {
            document.getElementById("mensaje_error").innerText = "Por favor, introduce una dirección de correo electrónico válida.";
            return false;
        }

        // Contraseña: solo números
        var contrasenaRegex = /^\d+$/;
        if (!contrasenaRegex.test(contrasenaInput)) {
            document.getElementById("mensaje_error").innerText = "La contraseña solo puede contener números.";
            return false;
        }

        return true;
    }

    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();
        iniciarSesion();
    });

    function iniciarSesion() {
        var usuario = document.getElementById("usuario").value;
        var contrasena = document.getElementById("contrasena").value;

        fetch("iniciaSesion.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "usuario=" + usuario + "&contrasena=" + contrasena,
        })
        .then(function (response) {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Hubo un problema con la respuesta del servidor.");
        })
        .then(function (data) {
            if (data === "success") {
                window.location.href = "cuentaPerfil.php?usuario=" + usuario;
            } else {
                // Manejar otros casos si es necesario
            }
        })
        .catch(function (error) {
            console.error("Error:", error);
        });
    }
</script>
</body>

</html>