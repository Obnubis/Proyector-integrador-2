<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terapia - Online</title>
    <link rel="stylesheet" href="CSS/terapia-online(talleres)1.css">
    <link rel="icon" type="image" href="img/logo.png">
</head>
<body>
  <div class="terapia">
        <div class="header">
            <?php
                include 'header.php'
            ?>
        </div>
        <?php  
        include  "Base_Datos/conexion.php";
        $conexion = getConexion();
        $usuario = 'angi';
        // Verificar si el usuario está autenticado
        if (!isset($_SESSION['usuario'])) {
            // Si no está autenticado, redirigirlo a la página de inicio de sesión
            // header('Location: iniciaSesion.php');
            // exit();
        } else {
            // Obtener el nombre de usuario de la sesión
            $usuario = $_SESSION['usuario'];
        }
        ?>
        <div class="contenido">
            <div class="parte1">
                <div class="contenido1">
                    <div class="izquierda">
                        <span class="texto1">EXPLORA Y RESERVA CLASES</span>
                        <span class="texto2">Una Amplia Selección de cursos</span>
                        <span class="texto3">Elige entre más de 10 cursos de vídeos en línea con nuevo contenido cada mes. ¡ A qué esperas !</span>
                        <span class="texto3">¡ Ofrecemos talleres ! Talleres para habilidades sociales, técnicas de estudio o inteligencia emocional. </span>
                        <a href="#suscripciones(precio).php"><button class="botonEmpezar">¡Empezar Ya!</button></a>
                    </div>
                    <img src="img/derechaterapia-online.png" alt="" class="derecha">
                  
                </div>
            </div>
            <div class="parte2">
                <div class="contenido2">
                    <div class="menu">
                    <a href="terapia-online(talleres).php"><button class="botones">Talleres</button></a>
                    <a href="terapia-online(cursos).php"><button class="botones1">Cursos</button></a>


                    </div>
                    <div class="talleres">
                        <?php
                        $fecha_hoy = date("Y-m-d");
                        $sql = "SELECT * from usuario where id_usuario='$usuario' and suscripciones > '$fecha_hoy'";
                        $resultado = mysqli_query(getConexion(), $sql) or die('Error en la consulta: ' . mysqli_error($conexion));
                        if (mysqli_num_rows($resultado)>0){
                            $numero = mysqli_fetch_assoc($resultado);
                            echo "<div class='grupo1'>
                            <div class='taller1'>
                                <img src='img/image29.png' alt='' class='derecha'>
                                <div class='izquierda'>
                                    <span class='text'>Curso TDAH: diagnostico del TDAH</span>
                                    <span class='text2'>Conocer la sintomatología asociada al TDAH en la etapa preescolar, infantil, adolescente y adulta. Indicar el correcto protocolo de evaluación del TDAH para perfilar un buen diagnóstico diferencial.</span>
                                    <a href='curso2.php'><button class='botone'>¡Empezar Ya!</button></a>
                                </div>
                            </div>
                            <div class='taller1'>
                                <img src='img/image30.png' alt='' class='derecha'>
                                <div class='izquierda'>
                                    <span class='text'>Curso: Técnicas de estudios</span>
                                    <span class='text2'>Conoce las características generales que presenta el alumnado con TDAH frente al estudio y adquiere las estrategias y herramientas más eficaces para lograr una mejora en el ámbito educativo.</span>
                                    <a href='curso1.php'><button class='botone'>¡Empezar Ya!</button></a>
                                </div>
                            </div>
                        </div>
                        <div class='grupo2'>
                            <div class='taller1'>
                                <img src='img/image31.png' alt='' class='derecha'>
                                <div class='izquierda'>
                                    <span class='text'>Curso: Habilidades Sociales</span>
                                    <span class='text2'>Fórmate de una manera global sobre el TDAH. Encuentra información acerca de la evaluación y el diagnóstico, importancia del tratamiento multimodal en el TDAH, pautas y estrategias conductuales para el hogar.</span>
                                    <a href='curso3.php'><button class='botone'>¡Empezar Ya!</button></a>
                                </div>
                            </div>
                            <div class='taller1'>
                                <img src='img/image32.png' alt='' class='derecha'>
                                <div class='izquierda'>
                                    <span class='text'>Curso: Respuesta educativa</span>
                                    <span class='text2'>Adquiere conocimientos sobre la sintomatología y características propias de los adolescentes con TDAH. Aprende estrategias para desarrollar todo su potencial en las aulas</span>
                                    <a href='curso4.php'><button class='botone'>¡Empezar Ya!</button></a>
                                </div>
                            </div>
                        </div>
                        ";
                        }else {
                            echo"<div class='noSuscripto'>
                            <div class='noSuscriptoImagen'></div>
                            <div class='noSuscriptoTexto'>
                                <span class='noSuscrpTexto1'>No Estás Suscripto ... ¡ Une con nosotros !</span>
                                <button type='button' class='botonIre'><a href='suscripciones(precio).php'>¡Empezar ya!</a></button>
                            </div>
                            </div>";
                        }
                        ?>
                        <!-- <div class="grupo1">
                            <div class="taller1">
                                <img src="img/image29.png" alt="" class="derecha">
                                <div class="izquierda">
                                    <span class="text">Curso TDAH: a lo largo de la vida</span>
                                    <span class="text2">Conocer la sintomatología asociada al TDAH en la etapa preescolar, infantil, adolescente y adulta.Indicar el correcto protocolo de evaluación del TDAH para perfilar un buen diagnóstico diferencial.</span>
                                    <a href="#"><button class="botone">¡Empezar Ya!</button></a>
                                    <button type="button" class="corazon"></button>
                                </div>
                            </div>
                            <div class="taller1">
                                <img src="img/image30.png" alt="" class="derecha" >
                                <div class="izquierda">
                                    <span class="text">Curso: Técnicas de estudios</span>
                                    <span class="text2">Conoce las características generales que presenta el alumnado con TDAH frente al estudio y adquiere las estrategias y herramientas más eficaces para lograr una mejora en el ámbito educativo.</span>
                                    <a href="curso1.php"><button class="botone">¡Empezar Ya!</button></a>
                                    <button type="button" class="corazon"></button>
                                </div>
                            </div>
                        </div>
                        <div class="grupo1">
                            <div class="taller1">
                                <img src="img/image31.png" alt="" class="derecha">
                                <div class="izquierda">
                                    <span class="text">Curso: Habilidades Sociales</span>
                                    <span class="text2">Fórmate de una manera global sobre el TDAH. Encuentra información acerca de la evaluación y el diagnóstico, importancia del tratamiento multimodal en el TDAH, pautas y estrategias conductuales para el hogar.</span>
                                    <a href="#"><button class="botone">¡Empezar Ya!</button></a>
                                    <button type="button" class="corazon"></button>
                                </div>
                            </div>
                            <div class="taller1">
                                <img src="img/image32.png" alt="" class="derecha" >
                                <div class="izquierda">
                                    <span class="text">Curso: Respuesta educativa</span>
                                    <span class="text2">Adquiere conocimientos sobre la sintomatología y características propias de los adolescentes con TDAH. Aprende estrategias para desarrollar todo su potencial en las aulas</span>
                                    <a href="#"><button class="botone">¡Empezar Ya!</button></a>
                                    <button type="button" class="corazon"></button>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
            <?php
                include 'footer.php'
            ?>
  </div>
</body>
</html>