<!--  de Angi -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ligconsolata:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
    <link rel="stylesheet" href="CSS/cuentaPerfil1.css"/>
    <link rel="stylesheet" href="CSS/menu1.css">
    <link rel="stylesheet" href="CSS/header-footer.css">

  </head>
  <body>

  <?php
    include "Base_Datos/crea_tabla.php";
    $conexion = getConexion();
    $usuario='root';
    $id_usuario='';
    if(isset($_GET['dni'])){
      $usuario = $_GET['dni'];
    }
    else {
      header("Location: iniciaSesion.php");
      exit;
    }
  ?>
  <div class="main-container">
        <?php
        include 'header.php';
        ?>
      <div class="flex-row-d">
        <div class="contenidoRegistro">
          <div class="contenido-7">
            <span class="mi-perfil">MI PERFIL</span>
            <div class="contenido-8">
            <div class="line"><hr></div>
              <div class="frame-9">
                <div class="frame-a">
                  <?php
                  include 'menu.php';
                  ?>
                </div>
                <div class="frame-f">
                  <div class="group"></div>
                  <button class="group-button">
                    <span class="editar-perfil">Editar perfil</span>
                  </button>
                </div>
              <?php
              echo "<form action='cuentaPerfil.php?dni=$usuario' method='post' onsubmit='return validacion()'>"
              ?>
                    <div class="cosas">
                    <span class="bienvenido-usuario">Bienvenido @usuario</span>
                  <?php
                   $nombreCompleto;
                   $domicilio;
                   $email;
                   $contrasena;
                   $fecha_nac;
                   $suscripcion;
                   $sql = "SELECT * FROM usuario WHERE dni= '$usuario' ";
                   $resultadoUsuario = mysqli_query(getConexion(),$sql) or die("Error en la consulta: " . mysqli_error($conexion));
                   if (mysqli_num_rows($resultadoUsuario)){
                     while ($paciente = mysqli_fetch_assoc($resultadoUsuario)){
                      $id_usuario = $paciente['id_usuario'];
                      $nombreCompleto = $paciente['nombre'] ." ". $paciente['apellido'];
                      $domicilio = $paciente['domicilio'];
                      $email = $paciente['email'];
                      $contrasena = $paciente['contraseña'];
                      $fecha_nac = $paciente ['fecha_nac'];
                      if($paciente['suscripciones']>date('Y-m-d')){
                        $suscripcion = "SI";
                      }
                      else {
                        $suscripcion = "NO";
                      }
                      
                     }
                   }
                   echo "<div class='frame-10'>
                    <div class='nombre'>
                      <label class='nombre-completo' for='nombre'>Nombre Completo</label>
                      <input type='text' id='nombre' name='nombre' class='nombre-11' value='$nombreCompleto'>
                    </div>
                    <div class='nombre'>
                    <label class='nombre-completo' for='domicilio'>Domicilio</label>
                    <input type='text' id='domicilio' name='domicilio' class='nombre-11'value='$domicilio' >
                  </div>
                  <div class='nombre'>
                  <label class='nombre-completo' for='email'>Email</label>
                  <input type='text' id='email' name='email' class='nombre-11' value='$email' >
                 </div>
                 <div class='nombre'>
                 <label class='nombre-completo' for='CambioContrasena'>Cambiar Contraseña</label>
                 <input type='text' id='CambioContrasena' name='CambioContrasena' class='nombre-11' value='$contrasena' >
                  </div>
                  <div class='nombre'>
                  <label class='nombre-completo' for='fechaNacimiento'>Fecha De Nacimiento</label>
                 <input type='date' id='fechaNacimiento' name='fechaNacimiento' class='nombre-11' value='$fecha_nac'>
                </div>
                <div class='nombre'>
                  <label class='nombre-completo' for='suscripto'>Suscripto ?</label>
                    <input type='text' id='suscripto' name='suscripto' class='nombre-11' value='$suscripcion' >
                    </div>
                    </div>
                  <button class='botones-grandes-movil'>
                    <span class='buttonGuardar' type='submit'>GUARDAR</span>
                  </button>
                </div>";
                ?>
              </form  >
              </div>
            </div>
          </div>
        </div>
        <div class="sentada"></div>
      </div>
      <?php
        include 'footer.php';
        ?>
      <div class="fondoPerfil"></div>
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
    
    // Preparar la consulta SQL para insertar los datos en la tabla
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener los datos del formulario
      $nombreCompleto= explode(' ', $_POST['nombre'] ?? '');
      $nombre = $nombreCompleto[0] ?? '';
      $apellido = $nombreCompleto[1] ?? '';
      $domicilio = $_POST['domicilio'] ?? '';
      $email = $_POST['email'] ?? '';
      $contrasena = $_POST['CambioContrasena'] ?? '';
      $fecha_nacimiento = $_POST['fechaNacimiento'] ?? '';
      
      // Preparar la consulta SQL para actualizar los datos en la tabla
      $sql = "UPDATE usuario SET contraseña='$contrasena', nombre = '$nombre', apellido ='$apellido',
              domicilio='$domicilio', email ='$email', fecha_nac ='$fecha_nacimiento'
      WHERE id_usuario= '$id_usuario'";
      
      // Ejecutar la consulta SQL
      if (mysqli_query($conexion, $sql)) {
          echo "Datos actualizados correctamente";
      } else {
          echo "Error al actualizar datos: " . mysqli_error($conexion);
      }
    }
  
}

  ?>
  </body>
</html>

