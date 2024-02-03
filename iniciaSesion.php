<!-- de Angi -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicia Sesion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
    <link rel="stylesheet" href="iniciaSesion1.css" />
  </head>
  <body>
  
    <div class="main-container">
      <a href="cerrarSesion.php"><button class="cierre"></button></a>
      <div class="contenido">
        <div class="izquierda"></div>
         <form action="iniciaSesion.php" method="post" onsubmit="return validacion()">
          <div class="derecha">
         
          <span class="inicio-de-sesion">Inicio de Sesión</span>
          <div class="registrase">
            <span class="primera">¿Es tu primera vez? </span>
            <div class="registrase-boton">
              <span class="button"><a href="registrarse.php">Registrate</a></span>
            </div>
          </div>
          <div class="sesion">
            <div class="usuario">
              <div class="usuario-icon"></div>
              <input type="text" id="usuario" class="nombre-usuario" value="Juanito" name="usuario">

            </div>
            <div class="contrasena">
              <div class="contrasena-icon"></div>
              <input type="password" id="contrasena" class="contrasena-usuario" value="1234" name="contrasena">
              <div class="invisible"></div> 
              <!-- JavaScript mostrar contraseña -->
            </div>
          
          </div>
          <div class="parte3">
            <div class="recuerdame">
            <input type="checkbox" id="checkbox" name="checkbox" class="component">
            <span class="recordame" for="checkbox">Recuérdame</span>
            </div>
            <span class="necesitas-ayuda"><a href="contact_us.html">¿Necesitas ayuda?</a></span>
          </div>
          <button type="submit" class="botones-iniciar-sesion">
            <span class="iniciar-sesion">Iniciar Sesión</span></button>
          
          <span class="conectate-con">o conéctate con </span>
          <div class="parte4">
            <button class="boton-google">
              <div class="google">
                <div class="google-icon"></div>
                <span class="google-texto">Google</span>
              </div></button
            ><button class="boton-facebook">
              <div class="bxl-facebook"></div>
              <span class="facebook">Facebook</span>
            </button>
          </div>
          </div>
        </form>
      </div>
      <div class="image"></div>
    </div>
    <?php 
    include '../Base_Datos/crea_tabla.php';
    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Obtener el apellido de usuario del formulario
     $usuario = $_POST['usuario'] ?? '';
     $contrasena = $_POST['contrasena'] ?? '';
     $sql = "SELECT dni FROM usuario where nombre='$usuario' and contraseña='$contrasena'";
     $resultado =mysqli_query($conexion, $sql);
     //comprobar si existe 
     if(mysqli_num_rows($resultado)>0){
        $fila = mysqli_fetch_assoc($resultado);
        $dni =$fila['dni'];
        header("Location: cuentaPerfil.php?dni=$dni");
     }
     else {
      echo "Usuario" . $usuario . "contraseña" . $contrasena;
          }
     
     mysqli_close($conexion);
     // Redirigir al usuario a la página de datos de medico
     
     exit;
    }
    ?>
  </body>
</html>
