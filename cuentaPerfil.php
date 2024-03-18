<!--  de Angi -->
<!-- Bien validado-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <script>
function habilitarEdicion() {
    console.log("Se ha llamado a la función habilitarEdicion()");
    var inputs = document.querySelectorAll('input[type="text"]');
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].id !== 'nombre') { // Si el id no es 'nombre', se habilita la edición
            inputs[i].readOnly = false;
        }
    }
    document.getElementById('guardar-btn').style.display = 'block';
}
function habilitarEdicion() {
    console.log("Se ha llamado a la función habilitarEdicion()");
    var inputs = document.querySelectorAll('input[type="text"]');
    for (var i = 0; i < inputs.length; i++) {
        if(inputs[i].id !== 'nombre') { // Si el id no es 'nombre', se habilita la edición
            inputs[i].readOnly = false;
        }
    }
    // Deshabilitar el campo Suscripto
    document.getElementById('suscripto').readOnly = true;
    document.getElementById('guardar-btn').style.display = 'block';
}


function actualizarPerfil() {
            var nombre = document.getElementById('nombre').value;
            var domicilio = document.getElementById('domicilio').value;
            var email = document.getElementById('email').value;
            var contrasena = document.getElementById('CambioContrasena').value;
            var fechaNacimiento = document.getElementById('fechaNacimiento').value;

            fetch('actualizarPerfil.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    nombre: nombre,
                    domicilio: domicilio,
                    email: email,
                    contrasena: contrasena,
                    fechaNacimiento: fechaNacimiento,
                }),
            })
            .then(response => response.text())
            .then(data => {
                alert(data);
            })
            .catch(error => console.error('Error:', error));
        }
</script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ligconsolata:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
    <link rel="stylesheet" href="CSS/cuentaPerfil1.css"/>
    <link rel="stylesheet" href="CSS/menu1.css">
    <link rel="stylesheet" href="CSS/header-footer.css">

  </head>
  <body>

  <div class="main-container">
  <div class="background-image image-27"></div>

        <?php    include 'header.php'; ?>
        <?php
        include  "Base_Datos/conexion.php";
        $conexion = getConexion();
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario'])) {
          // Si no está autenticado, redirigirlo a la página de inicio de sesión
          header('Location: iniciaSesion.php');
          exit();
        } else {
          // Obtener el nombre de usuario de la sesión
          $usuario = $_SESSION['usuario'];
        }
        ?>
        <div class="flex-row-d">
          <div class="contenidoRegistro">
          <div class="contenido-7">
            <span class="mi-perfil">Mi Perfil</span>
            <div class="contenido-8">

            <div class="frame-9">
            <div class="frame-a">
                <?php include 'menu.php'; ?>
            </div>
                
                  <div class="group"></div>
                  <button class="group-button" id="editar-perfil-btn" onclick="habilitarEdicion()">
    <span class="editar-perfil">Editar perfil</span>
</button>

    <div class="sentada"></div>
                        <div class="formulario">
                            <?php echo "<form action='cuentaPerfil.php' method='post' onsubmit='return validacion() && actualizarPerfil()'>"; ?>
                            <!-- <div class="cosas">
                                <span class="bienvenido-usuario"> @usuario </span> -->
                  <?php
                  $nombre='';
                  $nombreCompleto = '';
                  $domicilio = '';
                  $email = '';
                  $contrasena = '';
                  $fecha_nac = '';
                  $suscripcion = '';
                  $sql = "SELECT * FROM usuario WHERE id_usuario = '$usuario' ";
                  ($resultadoUsuario = mysqli_query(getConexion(), $sql)) or
                      die('Error en la consulta: ' . mysqli_error($conexion));
                  if (mysqli_num_rows($resultadoUsuario)) {
                      while (
                          $paciente = mysqli_fetch_assoc($resultadoUsuario)
                      ) {
                          $id_usuario = $paciente['id_usuario'];
                          $nombre = $paciente['nombre'] ;
                          $nombreCompleto =
                          $paciente['nombre'] . ' ' . $paciente['apellido'];
                          $domicilio = $paciente['domicilio'];
                          $email = $paciente['email'];
                          // $contrasena = $paciente['contraseña'];
                          $fecha_nac = $paciente['fecha_nac'];
                          if ($paciente['suscripciones'] > date('Y-m-d')) {
                              $suscripcion = 'SI';
                          } else {
                              $suscripcion = 'NO';
                          }
                      }
                  }
                  echo "
                  
                  <div class='cosas'>
                  <span class='bienvenido-usuario'> $nombre </span>
                  <div class='frame-10'>
                  <div class='nombre'>
                      <label class='nombre-completo' for='nombre'>Nombre Completo</label>
                      <input type='text' id='nombre' name='nombre' class='nombre-11' value='$nombreCompleto' readonly>
                  </div>
                  <div class='nombre'>
                      <label class='nombre-completo' for='domicilio'>Domicilio</label>
                      <input type='text' id='domicilio' name='domicilio' class='nombre-11' value='$domicilio' readonly>
                  </div>
                  <div class='nombre'>
                      <label class='nombre-completo' for='email'>Email</label>
                      <input type='text' id='email' name='email' class='nombre-11' value='$email' readonly>
                  </div>
                  <div class='nombre'>
                      <label class='nombre-completo' for='CambioContrasena'>Cambiar Contraseña</label>
                      <input type='text' id='CambioContrasena' name='CambioContrasena' class='nombre-11' value='$contrasena' readonly>
                  </div>
                  <div class='nombre'>
                      <label class='nombre-completo' for='fechaNacimiento'>Fecha De Nacimiento</label>
                      <input type='date' id='fechaNacimiento' name='fechaNacimiento' class='nombre-11' value='$fecha_nac'>
                  </div>
                  <div class='nombre'>
                        <label class='nombre-completo' for='suscripto'>Suscripto ?</label>
                        <input type='text' id='suscripto' name='suscripto' class='nombre-11' value='$suscripcion' readonly>
                    </div>

              </div>
              <button class='botones-grandes-movil' id='guardar-btn' style='display: none;'>
                  <span class='buttonGuardar' type='submit'>GUARDAR</span>
              </button>
              
                
                </div>";
                  ?>
              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    </div>
  </div>
  <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $domicilio = $_POST['domicilio'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['CambioContrasena'] ?? '';
    $fecha_nacimiento = $_POST['fechaNacimiento'] ?? '';
    $suscripto = $_POST['suscripto'] ?? '';

    // Verificar que la contraseña no esté vacía
    if (!empty($contrasena)) {
        // Hashear la nueva contraseña
        $contrasenaHasheada = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparar la consulta SQL para actualizar los datos en la tabla con la nueva contraseña hasheada
        $sql = "UPDATE usuario SET contraseña='$contrasenaHasheada', domicilio='$domicilio', email ='$email', fecha_nac ='$fecha_nacimiento'
        WHERE id_usuario= '$id_usuario'";
    } else {
        // Si la contraseña está vacía, actualizamos los otros campos pero dejamos la contraseña como está en la base de datos
        $sql = "UPDATE usuario SET domicilio='$domicilio', email ='$email', fecha_nac ='$fecha_nacimiento'
        WHERE id_usuario= '$id_usuario'";
    }

    // Ejecutar la consulta SQL
    if (mysqli_query($conexion, $sql)) {
        echo 'Datos actualizados correctamente';
        // Redireccionar a la misma página después de 2 segundos
        echo '<meta http-equiv="refresh" content="0; URL=\'cuentaPerfil.php?usuario=' . $usuario . '\'">';
    } else {
        echo 'Error al actualizar datos: ' . mysqli_error($conexion);
    }
}
?>


  </body>
</html>