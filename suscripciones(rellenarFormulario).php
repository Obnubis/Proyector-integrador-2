
  <?php
  // Incluir el archivo de conexión a la base de datos y otros archivos necesariosç
  include 'header.php';
  include "Base_Datos/crea_tabla.php";

  $conexion = getConexion();
  $precio = '35';
  $precioTotal = $precio;

  // Verificar si el usuario está autenticado
  if (!isset($_SESSION['usuario'])) {
      // Si no está autenticado, redirigirlo a la página de inicio de sesión
      header('Location: iniciaSesion.php');
      exit();
  } else {
      // Obtener el nombre de usuario de la sesión
      $usuario = $_SESSION['usuario'];
  }

  // Realizar la consulta para obtener los datos del usuario
  $sql = "SELECT * FROM usuario WHERE id_usuario = '$usuario'";
  $resultadoUsuario = mysqli_query($conexion, $sql);

  // Verificar si se encontraron resultados
  if (mysqli_num_rows($resultadoUsuario)) {
      // Obtener los datos del usuario
      $paciente = mysqli_fetch_assoc($resultadoUsuario);
      // Asignar los datos a variables individuales
      $nombre = $paciente['nombre'];
      $apellido = $paciente['apellido'];
      $fecha_nac = $paciente['fecha_nac'];
      $email = $paciente['email'];
      $dni = $paciente['dni'];
      $provincia = $paciente['provincia'];
      $direccion = $paciente['domicilio'];
      $codigoPostal = $paciente['codigoPostal'];
      $telefono = $paciente['telefono'];
      $localidad = $paciente['localidad'];
      $titular = $paciente['pago'];
      $iban = $paciente['iban'];
  } else {
      echo "No se encontraron datos para el usuario: $usuario";
      exit(); // Finalizar la ejecución del script
  }

  // Verificar si se ha enviado el formulario
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compraCita'])) {
      // Obtener los datos del formulario
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $fecha_nac = $_POST['fecha_nac'];
      $email = $_POST['email'];
      $dni = $_POST['dni'];
      $provincia = $_POST['provincia'];
      $direccion = $_POST['direccion'];
      $codigoPostal = $_POST['codigoPostal'];
      $telefono = $_POST['telefono'];
      $localidad = $_POST['localidad'];
      $titular = $_POST['titular'];
      $iban = $_POST['iban'];

      // Calcular la fecha de suscripción: la fecha actual más 30 días
      $suscripcion = date('Y-m-d', strtotime('+30 days'));

      // Preparar la consulta SQL para actualizar los datos en la tabla
      $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido',
              fecha_nac = '$fecha_nac', email = '$email', dni = '$dni', 
              provincia = '$provincia', domicilio = '$direccion',
              codigoPostal = '$codigoPostal', telefono = '$telefono',
              localidad = '$localidad', pago = '$titular', iban = '$iban',
              suscripciones = '$suscripcion', precio_mes ='$precioTotal'
              WHERE id_usuario='$usuario'";

      // Ejecutar la consulta SQL
      if (mysqli_query($conexion, $sql)) {
          $mensaje = '¡Formulario enviado y actualizado correctamente!';
          header('Location: cuenta(suscripciones).php');
          exit(); // Importante para evitar la ejecución adicional del código
      } else {
          $mensaje = 'Error al procesar el formulario. Por favor, inténtalo de nuevo.';
      }
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <link rel="icon" type="image" href="img/logo.png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Plan Para Su Compra</title>
      <script>
  function validarFormulario() {
      // Validación de campos vacíos
      var campos = document.querySelectorAll('.formulario1 input[type="text"], .formulario1 input[type="tel"], .formulario1 input[type="checkbox"], .formulario1 input[type="email"]');
      var camposCompletos = true;
      for (var i = 0; i < campos.length; i++) {
          if (campos[i].value.trim() === '' && campos[i].id !== 'comentario') {
              camposCompletos = false;
              break;
          }
      }

      // Validación de checkbox
      var checkbox = document.getElementById('basica');
      var checkboxMarcado = checkbox.checked;

      // Mostrar mensaje de error si alguna validación falla
      if (!camposCompletos || !checkboxMarcado) {
          document.getElementById('mensaje-error').style.display = 'block';
          return false; // Evita que el formulario se envíe si hay errores
      }

      return true; // Permite enviar el formulario si todas las validaciones son exitosas
  }

    </script>


      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
      <link rel="stylesheet" href="CSS/cita(rellenarformulario)1.css" />
    </head>
    <body>

      <?php
        // include 'header.php';
      ?>
      
          <div class="suscripciones">
          <div class="contenido">
            <form action="suscripciones(rellenarFormulario).php" method="post" class="formulario" onsubmit="return validarFormulario() && actualizarDatos(event)">
              <div class="parte1">
                <span class="textoA">Plan Para Su Compra Plan Premium <br></span>
                <span class="texto1">Tendrá un 20% de descuento en citas, además de cursos y talleres</span>
              </div>
              
              <div class="parte1">
                <span class="textoA">Datos Personales <br></span>
                <span class="texto1">Rellena sus datos personales si es necesario.</span>
              </div>
              <div class="parte3">
                    <div class='formulario1'>
                      <div class='box'>
                        <label class='texto3' for='nombre'>Nombre : </label>
                        <input type='text' id='nombre' name='nombre' class='nombre texto3' value='<?php echo $nombre;?>'>
                      </div>
                      <div class='box'>
                        <label class='texto3' for='nombre'>Fecha Nacimiento : </label>
                        <input type='text' id='fecha_nac' name='fecha_nac' class='fecha1 texto3' value='<?php echo $fecha_nac;?>'>
                      </div>
                      <div class='box'>
                        <label for='dni' class='texto3'>DNI/Pasaporte :</label>
                        <input type='text' id='dni' name='dni' class='dni texto3' value='<?php echo $dni;?>'>
                      </div>
                      <div class='box'>
                        <label class='texto3' for='direccion'>Dirección: </label>
                        <input type='text' id='direccion' name='direccion' class='direccion texto3' value='<?php echo $direccion ;?>'>
                      </div>
                      <div class='box'>
                        <label class='texto3' for='telefono'>Telefono: </label>
                        <input type='tel' id='telefono' name='telefono' class='telefono texto3' value='<?php echo $telefono ;?>'>
                      </div>
                    </div>

                  <div class='formulario1'>
                    <div class='box'>
                      <label class='texto3' for='apellidos'>Apellidos : </label>
                      <input type='text' id='apellido' name='apellido' class='nombre texto3' value='<?php echo $apellido ;?>'>
                    </div>
                    <div class='box'>
                      <label class='texto3' for='email'>Correo :</label>
                      <input type='text' id='email' name='email' class='nombre texto3' value='<?php echo $email ;?>'>
                    </div> 
                    <div class='box'>
                      <label class='texto3' for='provincia'>Provincia:</label>
                      <input type='text' id='provincia' name='provincia' class='nombre texto3' value='<?php echo $provincia ;?>'>
                    </div> 
                    <div class='box'>
                      <label class='texto3' for='codigoPostal'>Código Postal:</label>
                      <input type='text' id='codigoPostal' name='codigoPostal' class='codigo texto3' value='<?php echo $codigoPostal ;?>'>
                    </div>
                    <div class='box'>
                      <label class='texto3' for='localidad'>Localidad:</label>
                      <input type='text' id='localidad' name='localidad' class='localidad texto3' value='<?php echo $localidad ;?>'>
                    </div> 
                  </div> 

              </div>
              <div class="parte1">
                <span class="textoA">Método De Pago <br></span>
                <span class="texto1">Introduce el nombre del titular y el IBAN</span>
              </div>
              <div class="parte4">
                  <input class='rellenarTarjeta' id='titular' name='titular' value='<?php echo $titular;?>'>
                  <input id='iban' name='iban' value='<?php echo"$iban";?>' class="rellenarTarjeta">
              
              </div>
              <div class="parte7">
                  <input type='checkbox' id='basica' name='basica' class='aceptarTodo'>
                  <span class='texto3'
                  >He leído y acepto los terminos y condiciones</span
                  >
              </div>
              <div class="parte8">
              <button type='submit' class='texto2' name="compraCita" id="compraCita">Finalizar Pago</button>
              </div>
              <div id='mensaje-error' style='display: none; color: red;'>Por favor, complete todos los campos, y acepte los términos.</div>
              </form>

              <form class="forma" action="suscripciones(rellenarformulario).php" method="get">
              <div class="comprar">
              <div class="parteCompra1">
                <span class="textoB">Resumen de compra</span>
              </div>
              <div class="resumen">
                <span class="texto3">Precio cita</span>
                <span class="texto3"><?php echo $precio?> €</span>
              </div>

              <div class="total">
                <span class="texto3">Total</span>
                <span class="texto3"><?php echo $precioTotal; ?> €</span>
              </div>
              </div>
              </form>
        </div>
        <?php
        include 'footer.php';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Obtener los datos del formulario
          // premium o basica
          $suscripcion =date('Y-m-d');
          $suscripcion = date("Y-m-d",strtotime($suscripcion."+ 30 days"));
      
          // Recuperar los valores del formulario utilizando $_POST
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $fecha_nac = $_POST['fecha_nac'];
          $email = $_POST['email'];
          $dni = $_POST['dni'];
          $provincia = $_POST['provincia'];
          $direccion = $_POST['direccion'];
          $codigoPostal = $_POST['codigoPostal'];
          $telefono = $_POST['telefono'];
          $localidad = $_POST['localidad'];
          $titular = $_POST['titular'];
          $iban = $_POST['iban'];
          // Preparar la consulta SQL para actualizar los datos en la tabla
          $sql = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido',
          fecha_nac = '$fecha_nac',
          email = '$email',
          dni = '$dni', 
          provincia = '$provincia',
          domicilio = '$direccion',
          codigoPostal = '$codigoPostal',
          telefono = '$telefono',
          localidad = '$localidad',
          pago = '$titular',
          iban = '$iban',
          suscripciones = '$suscripcion' where id_usuario='$usuario'";
          
          // Ejecutar la consulta SQL
          if (mysqli_query(getConexion(), $sql)) {
            $mensaje = '¡Formulario enviado y actualizado correctamente!';
            header('Location: suscripciones(rellenarformulario).php');
          } else {
            $mensaje = 'Error al procesar el formulario. Por favor, inténtalo de nuevo.';
          }
        }
        ?>
    </body>
  </html>