<?php
include 'header.php';
include "Base_Datos/crea_tabla.php";

$conexion = getConexion();

if (!isset($_SESSION['usuario'])) {
  header('Location: iniciaSesion.php');
  exit();
}

$usuario = $_SESSION['usuario'];
$id_medico = $_SESSION['id_medico'];
$dia = $_SESSION['dia'];
$hora = $_SESSION['hora'];

$sql = "SELECT * FROM medico WHERE id_medico = '$id_medico'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado)) {
  $medico = mysqli_fetch_assoc($resultado);
  $nombreMedico = $medico['nombre'] . " " . $medico['apellido'];
  $consultaNormal = $medico['precio_consulta'];
} else {
  echo "No se encontraron datos para el medico con ID: $id_medico";
  exit();
}

if (isset($_SESSION['dia']) && isset($_SESSION['hora'])) {
  $dia = $_SESSION['dia'];
  $hora = $_SESSION['hora'];
} else {
  $dia = '';
  $hora = '';
}

$sqlUsuario = "SELECT * FROM usuario WHERE id_usuario = '$usuario'";
$resultadoUsuario = mysqli_query($conexion, $sqlUsuario);

if (mysqli_num_rows($resultadoUsuario) > 0) {
  $paciente = mysqli_fetch_assoc($resultadoUsuario);
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
  echo "No se encontraron datos para el usuario con ID: $usuario";
  exit();
}

$precio = $consultaNormal;
$descuento20 = 0;
$fecha = date('Y-m-d');
$sqlPremium = "SELECT * FROM usuario WHERE id_usuario = '$usuario' AND suscripciones > '$fecha'";
$resultadoPremium = mysqli_query($conexion, $sqlPremium);

if (mysqli_num_rows($resultadoPremium) > 0) {
  $descuento20 = 20;
  $precioTotal = $precio - (($precio * $descuento20) / 100);
} else {
  $precioTotal = $precio;
}
$CuponNoCorrespodiente ='';

if (isset($_GET['botonAnadir'])) {
  $cupon = $_GET['cupon'];
  $sqlPromocion = "SELECT * FROM promocion WHERE codigo = '$cupon'";
  $resultadoPromocion = mysqli_query($conexion, $sqlPromocion);

  if (mysqli_num_rows($resultadoPromocion) > 0) {
    $promocion = mysqli_fetch_assoc($resultadoPromocion);
    $descuento = $promocion['descuento'];
    $precioTotal = $precio - (($precio * $descuento) / 100) - (($precio * $descuento20) / 100);
  } else {
    $CuponNoCorrespodiente = "Introduce Correctamente El Cupon";
    $precioTotal = $precio;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plan Para Su Compra</title>
  <link rel="icon" type="image" href="img/logo.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
  <link rel="stylesheet" href="CSS/cita(rellenarFormulario)1.css" />
  <Link rel="stylesheet" href="CSS/header-footer.css" />
  <script>
    function validarFormulario() {
      var campos = document.querySelectorAll('.formulario1 input[type="text"], .formulario1 input[type="tel"], .formulario1 input[type="checkbox"], .formulario1 input[type="email"]');
      var camposCompletos = true;
      for (var i = 0; i < campos.length; i++) {
        if (campos[i].value.trim() === '' && campos[i].id !== 'comentario') {
          camposCompletos = false;
          break;
        }
      }
      var checkbox = document.getElementById('basica');
      var checkboxMarcado = checkbox.checked;
      if (!camposCompletos || !checkboxMarcado) {
        document.getElementById('mensaje-error').style.display = 'block';
        return false;
      }
      return true;
    }

    function actualizarDatos(event) {
      event.preventDefault();
      window.location.href = 'cuenta(calendario).php';
    }
  </script>
</head>

<body>
  <?php
  // include 'header.php';
  ?>
      <div class="suscripciones">
        <div class="contenido">
          <form action="" method="post" class="formulario" onsubmit="return validarFormulario()">
             <div class="parte1">
              <span class="textoA">Mi Cita es <?php echo $dia . " " . $hora . "H";?> </span>
              <br>
              <span class="texto1">Con <?php echo $nombreMedico;?> </span>
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

             <div class='comentario'>
              <label class='texto3' for='nombre'>Comentario : </label>
              <textarea id='comentario' name='comentario' class='textoComentario texto3' rows='5' cols='75'></textarea>
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
             <button type='submit' name="compraCita" id="compraCita">Finalizar Pago</button>
             </div>
             <div id='mensaje-error' style='display: none; color: red;'>Por favor, complete todos los campos, y acepte los térrminos.</div>
             </form>
            
             <form class="forma" action="" method="get">
            <div class="comprar">
             <div class="parteCompra1">
              <span class="textoB">Resumen de compra</span>
             </div>
             <div class="resumen">
              <span class="texto3">Precio cita</span>
              <span class="texto3"><?php echo $precio?> €</span>
             </div>
             <div class="cupon">
                <input type="text" name="cupon" id="cupon" class="cuponBac texto3" placeholder="Código de descuento">
                <button type="submit" class="botonAñadir" name="botonAnadir">Añadir</button>
                
              </div>
              <div class="mensaje-error" style="color: red;"><?php echo $CuponNoCorrespodiente; ?></div>
             <div class="total">
              <span class="texto3">Total</span>
              <span class="texto3"><?php echo $precioTotal; ?> €</span>
             </div>
            </div>
            </form>
    
      </div>
      <?php
      include 'footer.php';
      ?>

    
<?php
  if (isset($_POST['compraCita'])) {
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
    $comentario = $_POST['comentario'];

    $sqlActualizarUsuario = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido',
      fecha_nac = '$fecha_nac',
      email = '$email',
      dni = '$dni', 
      provincia = '$provincia',
      domicilio = '$direccion',
      codigoPostal = '$codigoPostal',
      telefono = '$telefono',
      localidad = '$localidad',
      pago = '$titular',
      iban = '$iban' WHERE id_usuario='$usuario'";

    if (mysqli_query($conexion, $sqlActualizarUsuario)) {
      echo "Datos actualizados correctamente";
    } else {
      echo "Error al actualizar datos: " . mysqli_error($conexion);
    }

    $sqlInsertConsulta = "INSERT INTO consulta(id_medico, id_usuario, fecha_consulta, hora_cita, comentario, pdf) 
      VALUES ('$id_medico','$usuario','$dia','$hora','$comentario','null')";

    if (mysqli_query($conexion, $sqlInsertConsulta)) {
      echo "Cita guardada correctamente";
      echo "<script>window.location.href = 'cuenta(calendario).php';</script>"; // JavaScript para redirigir
      exit();
    } else {
      echo "Error al guardar la cita: " . mysqli_error($conexion);
    }
  }
  ?>
  </body>


</html>
