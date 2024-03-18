<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terapia - Online</title>
    <link rel="stylesheet" href="CSS/terapia-online(talleres)1.css">
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
        <div class="contenido">
            <div class="parte1">
                <div class="contenido1">
                    <div class="izquierda">
                        <span class="texto1">EXPLORA Y RESERVA CLASES</span>
                        <span class="texto2">Una Amplia Selección de cursos</span>
                        <span class="texto3">Elige entre más de 10 cursos de vídeos en línea con nuevo contenido cada mes. ¡ A qué esperas !</span>
                        <span class="texto3">¡ Ofrecemos talleres ! Talleres para habilidades sociales, técnicas de estudio o inteligencia emocional. </span>
                        <a href="#talle"><button class="botonEmpezar">¡Empezar Ya!</button></a>
                    </div>
                    <img src="img/derechaterapia-online.png" alt="" class="derecha">
                  
                </div>
            </div>
            <div class="parte2">
                <div class="contenido2" id="talle">
                    <div class="menu">
                    <a href="terapia-online(talleres).php"><button class="botones1">Talleres</button></a>
                    <a href="terapia-online(cursos).php"><button class="botones">Cursos</button></a>

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
                                    <img src='img/image 25.png' alt='' class='derecha'>
                                        <div class='izquierda'>
                                            <span class='text'>Taller De Habilidades Sociales</span>
                                            <span class='text2'>Los talleres de habilidades sociales son una oportunidad rápida, eficaz y divertida para todo tipo de niños y jóvenes de aprender a relacionarse con los demás...</span>
                                            <a href='taller2.php'><button class='botone'>¡Empezar Ya!</button></a>
                                        </div>
                                    </div>
                                    <div class='taller1'>
                                        <img src='img/image 26.png' alt='' class='derecha'>
                                        <div class='izquierda'>
                                            <span class='text'>Taller de Técnicas de estudio</span>
                                            <span class='text2'>Las técnicas de estudio son una serie de estrategias y procedimientos de carácter cognitivo y metacognitivo relacionados con el aprendizaje</span>
                                            <a href='taller3.php'><button class='botone'>¡Empezar Ya!</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class='grupo2'>
                                    <div class='taller1'>
                                        <img src='img/image27.png' alt='' class='derecha'>
                                        <div class='izquierda'>
                                            <span class='text'>Taller De Funciones Ejecutivas </span>
                                            <span class='text2'>Las Funciones Ejecutivas son el conjunto de habilidades cognitivas que permiten la anticipación y el establecimiento de metas, la formación de planes y programas...</span>
                                            <a href='taller1.php'><button class='botone'>¡Empezar Ya!</button></a>
                                        </div>
                                    </div>
                                    <div class='taller1'>
                                        <img src='img/image28.png' alt='' class='derecha'>
                                        <div class='izquierda'>
                                            <span class='text'>Taller De Profesionalizacion De Padre</span>
                                            <span class='text2'>un programa de Profesionalización de Padres destinado a familias de niños con dicho trastorno. El objetivo es aportar a los padres la formación y entrenamiento necesario para ayudar al niños.</span>
                                            <a href='taller4.php'><button class='botone'>¡Empezar Ya!</button></a>
                                        </div>
                                    </div>
                                </div>
                        
                        ";
                        }
                        else {
                            echo"<div class='noSuscripto'>
                            <div class='noSuscriptoImagen'></div>
                            <div class='noSuscriptoTexto'>
                                <span class='noSuscrpTexto1'>No Estás Suscripto ... ¡ Une con nosotros !</span>
                                <button type='button' class='botonIre'><a href='suscripciones(precio).php'>¡Empezar ya!</a></button>
                            </div>
                        </div>
                        ";
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <?php
                include 'footer.php'
            ?>
        </div>
  </div>
</body>
</html>