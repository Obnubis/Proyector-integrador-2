<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap" />
    <title>Información</title>
    <link rel="icon" type="image" href="img/logo.png">
    <link rel="stylesheet" href="CSS/cita(verMas)1.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <?php
    include 'Base_Datos/crea_tabla.php';
    $conexion = getConexion();
    if (!isset($_SESSION['usuario']) || !isset($_GET['id_medico'])) {
        header('Location: iniciaSesion.php');
        exit();
    }
    $usuario = $_SESSION['usuario'];
    $_SESSION['id_medico'] = $_GET['id_medico'];
    $id_medico = $_SESSION['id_medico'];
    $sql = "SELECT * FROM medico WHERE id_medico = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_medico);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($resultado)) {
        // Obtener los datos del medico
        $medico = mysqli_fetch_assoc($resultado);
        // Asignar los datos a variables individuales
        $nombre = $medico['nombre'];
        $apellido = $medico['apellido'];
        $especialidad = $medico['especialidad'];
        $direccion = $medico['direccion'];
        $precio_consulta = $medico['precio_consulta'];
        $telefono = $medico['telefono'];
        $sobre_mi = $medico['sobre_mi'];
        $enfermedades = $medico['enfermedades'];
        $imagen = $medico['imagen'];
    } else {
        echo "No se encontraron datos para el usuario: $id_medico";
        exit(); // Finalizar la ejecución del script
    }
    //Consulta de opiniones
    $sql = "SELECT COUNT(o.id_opinion) as total FROM medico m INNER JOIN consulta c ON m.id_medico = c.id_medico INNER JOIN opinion o ON c.id_consulta = o.id_consulta WHERE m.id_medico = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_medico);
    mysqli_stmt_execute($stmt);
    $resultadoOpiniones = mysqli_stmt_get_result($stmt);
    $numOpiniones = '';
    if ($resultadoOpiniones) {
        $opiniones = mysqli_fetch_assoc($resultadoOpiniones);
        $numOpiniones = $opiniones['total'];
    }
    $noExite='';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['enviarTu'])){
            $_SESSION['dia'] = $_POST['dia']; // Almacenar el valor de dia en la sesión
            $_SESSION['hora'] = $_POST['hora']; // Almacenar el valor de hora en la sesión
            $dia = $_SESSION['dia'];
            $hora = $_SESSION['hora'];
            $sql = "SELECT * FROM consulta WHERE id_medico='$id_medico' AND fecha_consulta='$dia' AND hora_cita='$hora'";
            $resultadoRepido = mysqli_query(getConexion(), $sql);
            if(mysqli_num_rows($resultadoRepido)>0){
                $noExite ="Ya existe";
                //Sale un mensaje diciendo que ya existe 
            }else {
                //Pasa a siguiente pagina
                header("Location: cita(rellenarformulario).php");
                exit;
            }
            }
        
    }
    ?>
    

    <div class="titulo">
        <span class="titulo1">PSICÓLOGOS Y TERAPEUTA</span>
    </div>
    
    <div class="contenido">
        <div class="izquierda">
        <div class="perfil">
    <div class="datosPersonales">
        <img src="<?php echo $imagen; ?>" alt="" class="fotoMedico">
        <div class="datos">
            <span class="texto2"><?php echo $nombre . ' ' . $apellido; ?></span><br>
            <span class="texto3"><?php echo $especialidad; ?></span>
            <div class="opiniones">
                <span class="texto4"><?php echo $numOpiniones; ?> opiniones</span>
            </div>



        </div>
    </div>
    <hr>
    <div class="menuMedico">
        <button type="button" class="botonMedico"><a href="#consultas" class="texto3">Consultas</a></button>
        <button type="button" class="botonMedico"><a href="#experiencia" class="texto3">Experiencia</a></button>
        <button type="button" class="botonMedico"><a href="#opiniones"class="texto3">Opiniones</a></button>
        <button type="button" class="botonMedico"><a href="#cv" class="texto3">CV</a></button>
    </div>
</div>

            <div class="consulta" id="consultas">
                <span class="texto2">Consultas</span>
                <hr>
                <div class="direccion">
                    <span class="texto3">Dirección <br> <?php echo $direccion; ?></span>
                </div>
                <hr>
                <div class="precioycontacto">
                    <div class="precio">
                        <span class="texto3">Precio Consulta:<?php echo $precio_consulta; ?>€</span>
                    
                    </div>
                    <div class="contacto">
                        <span class="texto3">Telefono: <?php echo $telefono; ?> <br>
                            <?php echo $especialidad; ?></span>
                    </div>
                </div>
            </div>
            <div class="experiencia" id="experiencia">
                <span class="texto2">Experiencia</span>
                <hr>
                <div class="experienciaD">
                    <span class="texto3">Sobre mi <br></span>
                    <span class="texto4"><?php echo $sobre_mi; ?></span>
                    <hr>
                    <span class="texto3">Enfermedades Tratadas <br></span>
                    <span class="texto4"><?php echo $enfermedades; ?></span>
                </div>
            </div>
            <div class="opinionesUsuario" id="opiniones">
    <span class="texto2">Opiniones</span>
    
    <div class="opiniones">
        <span class="texto3"><?php echo $numOpiniones; ?> opiniones</span>
    </div>
<hr>
    <?php
    $sql = "SELECT o.* FROM medico m INNER JOIN consulta c ON m.id_medico = c.id_medico INNER JOIN opinion o ON c.id_consulta = o.id_consulta WHERE m.id_medico = $id_medico";
    ($resultado = mysqli_query(getConexion(), $sql)) or
        die('Error en la consulta: ' . mysqli_error($conexion));
    if (mysqli_num_rows($resultado) > 0) {
        while ($opinion = mysqli_fetch_assoc($resultado)) {
            $nombre =
                $opinion['nombre_usuario'] .
                ' - ' .
                $opinion['fecha_actual'];
            $opiniones = htmlspecialchars(
                "\"" . $opinion['opinion'] . "\""
            );
            $estrella = $opinion['n_estrella'];
    ?>
            <div class='opinion1'>
                <span class='texto3'><?php echo $nombre; ?></span><br>
                <span class='texto4'><?php echo $opiniones; ?></span><br>
                <div class='estrella'>
                    <?php
                    for ($i = 0; $i < $estrella; $i++) {
                        echo "<img src='img/estrella.png' alt='Estrella'>";
                    }
                    ?>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
             <div class="curriculum" id="cv">
                <span class="texto2">Curriculum</span>
                <button type="button" class="butonDescarga"><a href="descargar.php">Descargar</a></button>
            </div>
        </div>
        <div class="derecha">
        <form  method='post' id='formCita' class="formulario">

                <span class="texto2">Reserva</span>
                 <div class="lineaNegra"></div><!-- ESTO CAMBIARLO EN EL CSS PORQUE NO VA ASÍ -->
                <div class="contenidoCita">

                    <label for="dia" class="texto3">Día de la cita:</label>
                    <div class="calendario"></div>
                    <input type="date" name="dia" id="dia" class="motivo">
                    <label class="texto3" for="hora">Hora de la cita:</label>
                    <select name="hora" id="hora" class="motivo">
                    <option value="">Seleciona la hora de cita</option>
                    <option value="08:00">08:00 AM</option>
                    <option value="09:00">09:00 AM</option>
                    <option value="10:00">10:00 AM</option>
                    <option value="11:00">11:00 AM</option>
                    <option value="12:00">12:00 AM</option>
                    <option value="13:00">13:00 PM</option>
                    <option value="16:00">16:00 PM</option>
                    <option value="17:00">17:00 PM</option>
                    <option value="18:00">18:00 PM</option>
                    <option value="19:00">19:00 PM</option>
                    </select>
                    <div class="mensaje-error" style="color: red;"><?php echo $noExite; ?></div>
                    <div id="mensajesValidacion" class="mensaje-validacion" style="color: red;"></div> <!-- Aquí se mostrarán los mensajes de validación -->
                    <button type="submit" class="enviarBoton" name="enviarTu">Confirmar Tu Cita</button>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>


<script>
document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('form');
    var mensajesValidacion = document.getElementById('mensajesValidacion');

    form.addEventListener('submit', function(event) {
        var dia = document.getElementById('dia').value;
        var hora = document.getElementById('hora').value;
        var fechaSeleccionada = new Date(dia);
        var fechaActual = new Date();

        // Limpiar mensajes de validación previos
        mensajesValidacion.innerHTML = '';

        // Validar que se haya seleccionado una hora y un día
        if (hora === '' || dia === '') {
            mensajesValidacion.innerHTML = 'Por favor, selecciona una hora y un día para tu cita.';
            event.preventDefault();
            return;
        }

        // Validar que no se pueda pedir una cita para días anteriores al día actual
        if (fechaSeleccionada < fechaActual) {
            mensajesValidacion.innerHTML = 'No puedes programar citas para días anteriores al día actual.';
            event.preventDefault();
            return;
        }

        // Validar que no se pueda pedir una cita para fines de semana
        if (fechaSeleccionada.getDay() === 0 || fechaSeleccionada.getDay() === 6) {
            mensajesValidacion.innerHTML = 'Lo siento, no se trabajan los fines de semana.';
            event.preventDefault();
            return;
        }

        // Validar que la cita no se pueda programar para dentro de dos meses
        var dosMesesDespues = new Date();
        dosMesesDespues.setMonth(dosMesesDespues.getMonth() + 2);
        if (fechaSeleccionada > dosMesesDespues) {
            mensajesValidacion.innerHTML = 'No se pueden programar citas para dentro de dos meses.';
            event.preventDefault();
            return;
        }
    });
});
</script>

</body>

</html>


