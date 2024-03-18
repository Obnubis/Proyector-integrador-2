<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonios</title>
    <link rel="stylesheet" href="CSS/testimonios1.css">
    <link rel="stylesheet" href="CSS\añadirOpiniones.css"/>
    <link rel="icon" type="image" href="img/logo.png">

    <script>
    function validacion() {
      // Validar ID de cita
      var idCita = document.getElementById('cita').value;
      if (isNaN(idCita) || idCita.length > 4) {
        alert('El ID de cita debe ser un número de hasta 4 dígitos');
        return false;
      }
      // Validar opinión
      var opinion = document.getElementById('opinion').value;
      var palabrasOpinion = opinion.trim().split(/\s+/).length;
      if (palabrasOpinion < 1) {
        alert('La opinión debe contener algún comentario');
        return false;
      }


            // Validar puntuación
            var puntuacion = document.getElementById('puntuacion').value;
      if (isNaN(puntuacion) || puntuacion < 1 || puntuacion > 10) {
        alert('La puntuación debe ser un número entre 1 y 10');
        return false;
      }


      return true;
    }
  </script>
</head>
<body>
    <div class="header">
        <?php
        include 'header.php'
        ?>
    </div>
    <!-- Abrir la pestaña de añadir opiniones -->
    <div class="parte3">
    <?php
        if ($_SERVER["REQUEST_METHOD"] =="GET"){
            if(isset($_GET['anadirOpiniones'])){
                // aqui tiene que aparece la pagina de añadir opiniones 
            echo "
                <div class='main-container'>
               <div class='cierre' onclick='window.history.back();'></div>
              
                <div class='box'>
                  <span class='text'>Tu Opinión</span>
                  <form action='testimonios.php' method='post' onsubmit='return validacion()'>
                  <div class='formulario'>
                    <div class='nombre'>
                      <div class='box-2'>
                        <label class='text-2'>Nombre: </label>
                        <input type='text' name='nombre' id='nombre' class='box-nombre'>
                      
                      </div>
                      <span class='text-3'>
                      Si no quieres poner nombre, puedes dejar en blanco</span
                      >
                    </div>
                    <div class='cita'>
                      <span class='text-4'>Id de cita:</span>
                      <input type='text' name='cita' id='cita' class='box-cita'>
                      
                    </div>
                    <div class='opinion'>
                      <span class='text-5'>Tu opinión:</span>
                      <textarea name='opinion' id='opinion' cols='30' rows='10' class='box-opinion'></textarea>
                    </div>
                    <div class='puntuacion'>
                      <div class='caja'>
                        <span class='text-6'>Su puntuación de la cita: </span>
                        <input type='text' name='puntuacion' id='puntuacion' class='box-puntuacion'>
                      </div>
                      <span class='text-7'
                        >Puntuación es 1 - 5 (5 es más alta y 1 la más baja)</span
                      >
                    </div>
                    <div class='group'>
                      <button type='submit' name='enviar' class='enviar'>Enviar</button>
                      <a href='testimonios.php'><button type='button' name='cancelar' class='cancelar'>Cancelar</button></a>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            ";
            }

        }
    ?>
    </div>
    <?php
      include 'Base_Datos/crea_tabla.php';
      $valoracion;
      $sql = "SELECT COUNT(*) AS total_consultas FROM opinion";
      $resultado = mysqli_query(getConexion(),$sql) or die("Error en la consulta: " . mysqli_error($conexion));
      if($resultado){
        $numero = mysqli_fetch_assoc($resultado);
        $valoracion = $numero['total_consultas'];
      }
    ?>

<div class="parte1">
    <form action="testimonios.php" method="get" class="contenido">
        <span class="texto">Opiniones de Nuestros Pacientes</span> <br>

        <span class="texto1">En Mente Atenta tenemos un firme compromiso con la satisfacción de todos <br> nuestros pacientes por eso nos gustan recoger sus opiniones y utilizarlo para <br> mejorar nuestros servicios. 

</span> <br>
        <div class="frame22">
            <?php echo "<span class='texto2'> $valoracion valoraciones</span>"?> <br>
            <button class="tuOpinion" type="submit" value="anadirOpiniones" name="anadirOpiniones">Añadir Tu Opinión</button>
        </div>
    </form>
</div>

<div class='parte2'>
    <div class='contenido1'>
        <div class='tarjetas'>
            <?php
            $sql = "SELECT * FROM opinion";
            $resultado = mysqli_query(getConexion(),$sql) or die("Error en la consulta: " . mysqli_error($conexion));
            if (mysqli_num_rows($resultado)>0){
                while ($opinion = mysqli_fetch_assoc($resultado)){
                    $nombre = $opinion['nombre_usuario'] . " - " . $opinion['fecha_actual'] ;
                    $opiniones = htmlspecialchars("\"" . $opinion['opinion'] . "\"");
                    echo "
                    <div class='tarjeta'>
                        <span class='comentario'>$opiniones</span> <br>
                        <span class='nombre1'>$nombre</span>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
</div>

    <div class="footer">
    <?php
        include 'footer.php'
        ?>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //Identificar Usuario
      if(isset($_POST['enviar'])){
      $sql = "SELECT id_usuario FROM usuario WHERE id_usuario = '$id_usuario';";
      $resultado = mysqli_query(getConexion(),$sql) or die("Error en la consulta: " . mysqli_error($conexion));
      $fila = mysqli_fetch_assoc($resultado);
      
      if ($fila) {
        // Obtener el valor del campo id_usuario
        $id_usuario = $fila['id_usuario'];
      } 
      $nombre = $_POST['nombre'];
      $id_consulta = $_POST['cita'];
      $opiniones = $_POST['opinion'];
      $puntuacion = $_POST['puntuacion'];
      $fecha_actual = date('Y-m-d');
      $sqlOpiniones = "INSERT INTO opinion(id_usuario, id_consulta, nombre_usuario, fecha_actual, opinion, n_estrella) 
      VALUES ('$id_usuario','$id_consulta','$nombre','$fecha_actual','$opiniones','$puntuacion')";
      $resultadoOpiones =mysqli_query(getConexion(),$sqlOpiniones);
      
      if($resultadoOpiones){
        echo "Opiniones enviado";
      }
      else {
        echo "Error";
      }
      }
     
    }
    ?>
</body>
</html>