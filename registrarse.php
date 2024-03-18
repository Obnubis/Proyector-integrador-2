<?php
include 'Base_Datos/crea_tabla.php';

$mensaje = ''; // Variable para almacenar el mensaje

function existeUsuario($nombre, $conexion)
{
    $sql = "SELECT nombre FROM usuario WHERE nombre = '$nombre';";

    // Ejecutar la consulta SQL
    $resultado = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($resultado);
    if ($row) {
        return true; // El usuario ya existe
    } else {
        return false; // El usuario no existe
    }

    mysqli_close($conexion);
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $dni = $_POST['dni'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $provincia = $_POST['provincia'] ?? '';
    $codigo_postal = $_POST['codigo_postal'] ?? '';
    $domicilio_calle = $_POST['domicilio_calle'] ?? '';
    $gmail = $_POST['gmail'] ?? '';
    $contrasena_us = $_POST['contrasena_us'] ?? '';
    $suscripcion = date('Y-m-d');

    // Hashear la contraseña antes de almacenarla en la base de datos
    $contrasena_hash = password_hash($contrasena_us, PASSWORD_DEFAULT);

    // Verificar si el usuario ya existe antes de insertarlo
    if (existeUsuario($nombre, $conexion)) {
        // El usuario ya existe, mostrar un mensaje
        $mensaje = 'El usuario ya existe.';
    } else {
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO usuario (contraseña, dni, nombre, apellido, domicilio, codigoPostal, provincia, localidad, email, fecha_nac, suscripciones) 
                VALUES ('$contrasena_hash', '$dni', '$nombre', '$apellido', '$domicilio_calle', '$codigo_postal', '$provincia', '$localidad', '$gmail','$fecha_nacimiento', '$suscripcion')";

        // Ejecutar la consulta SQL
        if (mysqli_query($conexion, $sql)) {
            // Mensaje de éxito
            $mensaje = '¡Registro exitoso!';
            // Redirigir al usuario a la página de inicio de sesión
            header("Location: iniciaSesion.php");
        } else {
            $mensaje = 'Error al registrar: ' . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
  <link rel="stylesheet" href="CSS/registrarse1.css">
  <link rel="icon" type="image" href="img/logo.png">
  <style>

</style>
</head>

<body>
  <div class="main-container">
    <!-- <a href="index.php"><button class="cierre"></button></a> -->
    <div class="contenido">
      <!-- <div class="izquierda"></div>-->
      <script>
        // Función para enviar el formulario mediante AJAX
        function enviarFormulario() {
          // Obtener el formulario por su ID
          var formulario = document.getElementById('formularioRegistro');

          // Crear un objeto FormData para enviar los datos del formulario
          var formData = new FormData(formulario);

          // Realizar una solicitud AJAX
          fetch('registrarse.php', {
              method: 'POST',
              body: formData
            })
            .then(response => response.json()) // Convertir la respuesta a JSON
            .then(data => {
              // Manejar la respuesta JSON
              if (data.success) {
                // Si la respuesta indica éxito, mostrar un mensaje al usuario
                alert(data.message);
                // Redireccionar a la página de perfil
                window.location.href = 'cuentaPerfil.php?dni=' + data.dni;
              } else {
                // Si la respuesta indica error, mostrar un mensaje de error al usuario
                alert(data.message);
              }
            })
            .catch(error => {
              // En caso de error, mostrar un mensaje de error genérico
              console.error('Error al enviar la solicitud:', error);
              alert('Ocurrió un error al procesar tu solicitud. Por favor, inténtalo de nuevo más tarde.');
            });

          // Evitar que el formulario se envíe de forma convencional
          return false;
        }
      </script>
<form id="formularioRegistro" action="registrarse.php" method="post" onsubmit="return validacion()">
  <div class="derecha">
    <span class="crea-tu-cuenta">Crea Tu Cuenta</span>
    <div class="parte">
      <label class="nombre" for="nombre">Nombre</label>
      <input type="text" class="rectangle" id="nombre" name="nombre">
      <span class="mensaje-error" id="error-nombre"></span>
      
      <label class="span-apellido" for="apellido">Apellido</label>
      <input type="text" class="rectangle-2" id="apellido" name="apellido">
      <span class="mensaje-error" id="error-apellido"></span>                       
    </div>
    <div class="parte-2">
      <label class="text-4" for="dni">Nº de documento</label>
      <input type="text" class="rectangle-4" id="dni" name="dni">
      <span class="mensaje-error" id="error-dni"></span>

      <label class="fecha-de-nacimiento" for="fecha_nacimiento">Fecha de Nacimiento</label>
      <input type="date" class="rectangle-6" id="fecha_nacimiento" name="fecha_nacimiento">
      <span class="mensaje-error" id="error-fecha-nacimiento"></span>       
    </div>
    <div class="parte-3">
      <div class="provincia">
        <label class="span-provincia" for="provincia_us">Provincia</label>
        <input type="text" class="rectangle-9" id="provincia" name="provincia">
        <span class="mensaje-error" id="error-provincia"></span>
      </div>
      <div class="codigo">
        <label class="span-codigo-postal" for="codigo_postal">Código Postal</label>
        <input type="text" id="codigo_postal" name="codigo_postal" class="rectangle-b">
        <span class="mensaje-error" id="error-codigo-postal"></span>
      </div>
    </div>

    <div class="domicilio">
      <label class="span-domicilio" for="domicilio_calle">Domicilio</label>
      <input type="text" class="rectangle-d" id="domicilio_calle" name="domicilio_calle">
      <span class="mensaje-error" id="error-domicilio"></span>
    </div>

    <div class="email">
      <label class="e-mail" for="gmail">E-mail</label>
      <input type="email" class="rectangle-f" id="gmail" name="gmail">
      <span class="mensaje-error" id="error-email"></span>
    </div>

    <div class="contrasena">
      <label class="text-a" for="contrasena_us">Contraseña</label>
      <input type="password" class="rectangle-11" id="contrasena_us" name="contrasena_us">
      <span class="mensaje-error" id="error-contrasena"></span>
    </div>

    <span id="mensaje_validacion" style="color: red; display: <?php echo empty($mensaje) ? 'none' : 'block'; ?>;"><?php echo $mensaje; ?></span>
  </div>
  <a href="iniciaSesion.php">
    <button type="submit" class="registro" name="regis">
      <span class="button">Registrarme</span>
    </button>
  </a>
</form>
      <span class="o-registrase-con">o registrase con </span>
      <div class="google-facebook">
        <button class="google-button">
          <div class="duck-icon-google"></div>
          <span class="google"> Google</span>
        </button><button class="facebook-button">
          <div class="bxl-facebook"></div>
          <span class="facebook">Facebook</span>
        </button>
      </div>
    </div>
    <button class="volver-button" onclick="window.location.href = 'index.php';">Volver</button>

  </div>
  <div class="fondo"></div>
  </div>
  <?php
  // Procesar los datos recibidos y generar una respuesta en formato JSON
  $response = array();

  // Tu lógica de procesamiento aquí

  // Simular una respuesta de éxito
  $response['success'] = true;
  $response['message'] = '¡Registro exitoso!';
  $response['dni'] = $dni; // Puedes incluir más datos en la respuesta si es necesario


  ?>
</body>

<script>
  function validacion() {
    var nombre = document.getElementById('nombre').value.trim();
    var apellido = document.getElementById('apellido').value.trim();
    var dni = document.getElementById('dni').value.trim();
    var fechaNacimiento = document.getElementById('fecha_nacimiento').value.trim();
    var provincia = document.getElementById('provincia').value.trim();
    var codigoPostal = document.getElementById('codigo_postal').value.trim();
    var domicilio = document.getElementById('domicilio_calle').value.trim();
    var email = document.getElementById('gmail').value.trim();
    var contrasena = document.getElementById('contrasena_us').value.trim();

    // Verificación de campos vacíos y aplicar estilos
    var camposValidos = true;
    var mensajeError = '';

    var campos = ['nombre', 'apellido', 'dni', 'fecha_nacimiento', 'provincia', 'codigo_postal', 'domicilio_calle', 'gmail', 'contrasena_us'];

    for (var i = 0; i < campos.length; i++) {
      var campo = campos[i];
      var valorCampo = document.getElementById(campo).value.trim();

      if (valorCampo === '') {
        document.getElementById(campo).classList.add('campo-invalido');
        camposValidos = false;
      } else {
        document.getElementById(campo).classList.remove('campo-invalido');
      }
    }

    // Si hay algún campo vacío, mostrar mensaje y detener la validación
    if (!camposValidos) {
      document.getElementById('mensaje_validacion').innerText = 'Faltan campos por rellenar.';
      document.getElementById('mensaje_validacion').style.display = 'block';
      return false;
    }
    // Expresiones regulares para las validaciones
    var letras = /^[A-Za-z\s]+$/;
    var dniRegex = /^\d{8}[A-Za-z]$/;
    var provinciaRegex = /^[A-Za-z\s]+$/;
    var codigoPostalRegex = /^\d{5}$/;
    var gmailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    // Validación de nombre y apellido
    if (!nombre.match(letras)) {
      mensajeError += 'El nombre solo puede contener letras y espacios.\n';
      camposValidos = false;
    }

    if (!apellido.match(letras)) {
      mensajeError += 'El apellido solo puede contener letras y espacios.\n';
      camposValidos = false;
    }

    // Validación de DNI
    if (!dni.match(dniRegex)) {
      mensajeError += 'El DNI debe tener 8 números seguidos de una letra.\n';
      camposValidos = false;
    }

    // Validación de fecha de nacimiento
    var today = new Date();
    var birthDate = new Date(fechaNacimiento);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    if (age < 16) {
      mensajeError += 'Debes tener al menos 16 años para registrarte.\n';
      camposValidos = false;
    }

    // Validación de provincia
    if (!provincia.match(provinciaRegex)) {
      mensajeError += 'En la provincia, solo se permiten letras y espacios.\n';
      camposValidos = false;
    }

    // Validación de código postal
    if (!codigoPostal.match(codigoPostalRegex)) {
      mensajeError += 'El código postal debe tener 5 números.\n';
      camposValidos = false;
    }

    // Validación de email
    if (!email.match(gmailRegex)) {
      mensajeError += 'El correo electrónico debe ser de tipo gmail, hotmail o yahoo.\n';
      camposValidos = false;
    }

    // Si hay algún campo vacío o con error, mostrar mensaje y detener la validación
    if (!camposValidos) {
      document.getElementById('mensaje_validacion').innerText = mensajeError;
      document.getElementById('mensaje_validacion').style.display = 'block';
      return false;
    }

    // Si todas las validaciones pasan, se puede enviar el formulario
    return true;
  }
</script>



</html>
      <!-- echo "<script>alert('Nombre de usuario ya en uso');</script>"; -->
