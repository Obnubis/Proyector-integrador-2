<!-- de Angi -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
    <link rel="stylesheet" href="registrarse1.css" />
  </head>
  <body>
    <div class="main-container">
      <a href="cerrarSesion.php"><button class="cierre"></button></a>
      <div class="contenido">
        <div class="izquierda"></div>
        <form action="registrarse.php" method="post" onsubmit="return validacion()">
        <div class="derecha">
          <span class="crea-tu-cuenta">Crea Tu Cuenta</span>
          <div class="parte">
            <div class="usuario">
              <label class="nombre" for="nombre">Nombre</label>
              <input type="text" class="rectangle" id="nombre" name="nombre">
            </div>
            <div class="apellido">
              <label class="span-apellido" for="apellido">Apellido</label>
              <input type="text" class="rectangle-2" id="apellido" name="apellido">
            </div>
          </div>
          <div class="parte-2">
            <div class="dni">
              <label class="text-4" for="dni">Nº de documento</label>
              <input type="text" class="rectangle-4" id="dni" name="dni">
            
            </div>
            <div class="fecha">
              <label class="fecha-de-nacimiento" for="fecha_nacimiento">Fecha de Nacimiento</label>
              <input type="date" class="rectangle-6" id="fecha_nacimiento" name="fecha_nacimiento">
            
            </div>
          </div>
          <div class="parte-3">
            <div class="provincia">
                
              <label class="span-provincia" for="provincia_us">Provincia</label>
              <input type="text" class="rectangle-9" id="provincia" name="provincia">
            </div>
            <div class="codigo">
              <label class="span-codigo-postal" for="codigo_postal">Código Postal</label>
              <input type="text" id="codigo_postal" name="codigo_postal" class="rectangle-b">
            </div>
          </div>
          <div class="domicilio">
            <label class="span-domicilio" for="domicilio_calle">Domicilio</label>
            <input type="text" class="rectangle-d" id="domicilio_calle" name="domicilio_calle">
          </div>
          <div class="email">
            <label class="e-mail" for="gmail">E-mail</label>
            <input type="email" class="rectangle-f" id="gmail" name="gmail">
         
          </div>
          <div class="contrasena">
            <label class="text-a" for="contrasena_us">Contraseña </label>
            <input type="password" class="rectangle-11" id="contrasena_us" name="contrasena_us">
         
          </div>
          <button type="submit"class="regiistro">
            <span class="button">Registrarme</span></button>
            <span class="o-registrase-con">o registrase con </span>
          <div class="google-facebook">
            <button class="google-button">
              <div class="duck-icon-google"></div>
              <span class="google"> Google</span></button
            ><button class="facebook-button">
              <div class="bxl-facebook"></div>
              <span class="facebook">Facebook</span>
            </button>
          </div>
        </div>
        </form>
      </div>
      <div class="fondo"></div>
    </div>

    <?php
     include '../Base_Datos/crea_tabla.php';
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      //falta php, donde comprobar si el usuario existe o no 
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
        // Preparar la consulta SQL para insertar los datos en la tabla
        $sql = "INSERT INTO usuario (contraseña, dni, nombre, apellido, domicilio, codigoPostal, provincia, localidad, email, fecha_nac, suscripciones) 
                VALUES ('$contrasena_us', '$dni', '$nombre', '$apellido', '$domicilio', '$codigoPostal', '$provincia', '$localidad', '$gmail','$fecha_nacimiento', '$suscripcion')";
        // Ejecutar la consulta SQL
        if (mysqli_query($conexion, $sql)) {
            header("Location: cuentaPerfil.php?dni=$dni");
            //perfil
        } else {
            echo "Error al registrar: " . mysqli_error($conexion);
        }
    
        mysqli_close($conexion);
  
        exit;
    }
    ?>
  </body>
</html>
