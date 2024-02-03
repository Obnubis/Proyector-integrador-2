<!-- de Angi -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plan Para Su Compra</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
    <link rel="stylesheet" href="suscripciones(rellenar)1.css" />
    <Link rel="stylesheet" href="CSS/header-footer.css" />
  </head>
  <body>
  <?php
    include  "Base_Datos/conexion.php";
    $conexion = getConexion();
    $usuario='12345678A';
    $id_usuario='';
    if(isset($_GET['dni'])){
      $usuario = $_GET['dni'];
    }
    else {
      // header("Location: iniciaSesion.php");
      // exit;
    }
  ?>


    <div class="main-container">
      
        <?php
        include 'header.php'
        ?>
      <?php
         // Formulacion 
        echo "<form action='suscripciones(rellenarFormulario).php?dni=$usuario' method='post' onsubmit='return validacion()'>" ?>
      <div class="box-3">
        <div class="pic-2"></div>
        <div class="wrapper">
          <div class="derecha">
            <div class="parte1">
              <span class="text-6">Plan Para Su Compra </span
              ><span class="text-7"
                >Escoge la suscripción que mejor se adapte a tus necesitades.
              </span>
            </div>
            <div class="group-5">
              <div class="basico">
                
                <input type="radio" id="basica" name="basica" class="wrapper-a">
                <span class="text-8">Basica</span>
                <div class="pic-3">
                    <hr>
                </div>
                <span class="text-9"
                  >+ Calendario personalizado<br />+ Chat Medico</span
                >
              </div>
              
              <div class="premium">
                <input type="radio" id="premium" name="premium" class="wrapper-a">
                <span class="text-8">Premiun</span>
                <div class="pic-3">
                    <hr>
                </div>
                <span class="text-b"
                  >+ Calendario personalizado<br />+ 20% descuento en cada
                  compra<br />+ Todo los cursos gratis de terapia online<br />+
                  Chat Medico</span
                >
              </div>
            </div>
            <div class="box-6">
              <span class="text-c">Datos Personales</span
              ><span class="text-d"
                >Rellena sus datos personales si es necesario</span
              >
            </div>
          <?php
              $nombre;
              $apellido;
              $fecha_nac;
              $email;
              $dni;
              $provincia;
              $direccion;
              $codigoPostal;
              $telefono;
              $localidad;
              $titular;
              $iban;
              $sql = "SELECT * FROM usuario WHERE dni= '$usuario' ";
              $resultadoUsuario = mysqli_query(getConexion(),$sql) or die("Error en la consulta: " . mysqli_error($conexion));
              if (mysqli_num_rows($resultadoUsuario)){
                while ($paciente = mysqli_fetch_assoc($resultadoUsuario)){
                  $nombre = $paciente['nombre'];
                 $apellido = $paciente['apellido'];
                 $fecha_nac = $paciente['fecha_nac'];
                 $email = $paciente['email'];
                 $dni = $paciente['dni'];
                 $provincia = $paciente ['provincia'];
                 $direccion = $paciente['domicilio'];
                 $codigoPostal = $paciente ['codigoPostal'];
                 $telefono = $paciente ['telefono'];
                 $localidad = $paciente ['localidad'];
                 $titular = $paciente['pago'];
                 $iban = $paciente['iban'];
                }
              }
               echo "<div class='box-7'>
              <div class='wrapper-2'>
                <div class='box-8'>
                  <label class='text-e' for='nombre'>Nombre : </label>
                  <input type='text' id='nombre' name='nombre' class='nombre' value='$nombre'>
                </div>
                <div class='box-8'>
                  <label class='fecha' for='nombre'>Fecha de Nacimiento : </label>
                  <input type='date' id='fecha_nac' name='fecha_nac' class='fecha1' value='$fecha_nac'>
                </div>
                <div class='dni'>
                  <label for='dni' class='textdni'>DNI/NIE/Pasaporte :</label>
                  <input type='text' id='dni' name='dni' class='textdni1' value='$dni'>
                </div>
                <div class='direccion'>
                  <label class='textdireccion' for='direccion'>Dirección: </label>
                  <input type='text' id='direccion' name='direccion' class='boxdireccion' value='$direccion'>
                </div>
                <div class='direccion'>
                  <label class='telefono' for='telefono'>Telefono: </label>
                  <input type='tel' id='telefono' name='telefono' class='boxtelefono' value='$telefono'>
                </div>
              </div>
              <div class='wrapper-5'>
              <div class='box-8'>
                  <label class='text-e' for='apellidos'>Apellidos: </label>
                  <input type='text' id='apellido' name='apellido' class='nombre' value='$apellido'>
                </div>
                <div class='box-8'>
                  <label class='text-e' for='email'>Correo:</label>
                  <input type='test' id='email' name='email' class='nombre' value='$email'>
                </div> 
                <div class='box-8'>
                  <label class='text-e' for='provincia'>Provincia:</label>
                  <input type='test' id='provincia' name='provincia' class='nombre' value='$provincia'>
                </div> 
                <div class='box-8'>
                  <label class='text-16' for='codigoPostal'>Código Postal:</label>
                  <input type='test' id='codigoPostal' name='codigoPostal' class='codigo' value='$codigoPostal'>
                </div>
                <div class='box-8'>
                  <label class='text-17' for='localidad'>Localidad:</label>
                  <input type='test' id='localidad' name='localidad' class='localidad' value='$localidad'>
                </div> 
                
              </div>
            </div>
            
            <div class='wrapper-8'>
              <span class='text-18'>Método De Pago</span
              ><span class='text-19'
                >Introduce el nombre del titular y el IBAN</span
              >
            </div>
            <div class='section-d'>
             
              <div class='section-e'>
                <input class='text-1b' id='titular' name= 'titular' value='$titular'>
              </div>
              <div class='section-e'>
              <input class='text-1b' id='iban' name='iban' value='$iban'>
              </div>
            </div>
            <div class='group-b'>
              <input type='checkbox' id='basica' name='basica' class='wrapper-a'>
              <span class='text-1c'
                >He leído y acepto los terminos y condiciones</span
              >
            </div>
            <div class='wrapper-b'>
              <button type='submit' class='text-1d' >Finalizar Pago</button>
            </div>
      </div>";
      ?>
      </form> 

          <!-- Aqui tiene que hacer JavaScrip para que el precio se cambie cuando elige el checkbox -->
          <div class="izquierda">
            <div class="wrapper-c">
              <span class="text-1e">Resumen de compra</span>
            </div>
            <div class="section-10">
              <span class="text-1f">Basica</span><span class="text-20">x1</span
              ><span class="text-21">00.00€</span>
            </div>
            <div class="section-11">
              <span class="text-22">Subtotal</span
              ><span class="text-23">00.00€</span>
            </div>
            <div class="group-c">
              <div class="section-12">
                <span class="text-24">Código o cupún<br /></span>
              </div>
              <div class="group-d"><span class="text-25">Añadir</span></div>
            </div>
            <div class="group-e">
              <span class="text-26">Total</span
              ><span class="text-27">00.00€</span>
            </div>
          </div>
        </div>
      </div>
      
        <?php
        include 'footer.php';
        ?>
      
    </div>
    <?php
    // Preparar la consulta SQL para insertar los datos en la tabla
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Obtener los datos del formulario
      //premium o basica
      $suscripcion = date('Y-m-d');
      if(isset($_POST['basica'])){
        $suscripcion = date('Y-m-d');
        // echo "El usuario ha seleccionado la opción Básica.";
      }
      elseif (isset($_POST['premium'])) {
        $suscripcion = date("Y-m-d",strtotime($suscripcion."+ 30 days"));
        // echo "El usuario ha seleccionado la opción premium.";
      }

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

      echo "$nombre" . "$suscripcion";
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
      suscripciones = '$suscripcion' where dni='$usuario'";
      
      // Ejecutar la consulta SQL
      if (mysqli_query($conexion, $sql)) {
          echo "Datos actualizados correctamente";
      } else {
          echo "Error al actualizar datos: " . mysqli_error($conexion);
      }
    }
    
    ?>
  </body>
</html>
