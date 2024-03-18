<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta(calendario)</title>
    <link rel="icon" type="image" href="img/logo.png">

    <link rel="stylesheet" href="CSS/usuario(calendario)1.css">
</head>
<body>
    <!-- Id de usuario -->
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
    
    <div class="calendario">
    <div class="background-image image-27"></div>
    <div class="contenido">
        <span class="titulo">Mi Perfil</span>
        <div class="menu">
        <?php include 'menu.php' ?>
    </div>        
    <div class="contexto">
          
            <div class="derecha">
                <span class="titulo1">Próximas Citas</span>
                <!-- las citas  -->
                <div class="lasCitas">
                <?php
                    $fecha = date('Y-m-d');
                    $sql = "SELECT * FROM consulta WHERE id_usuario = '$usuario' and fecha_consulta > '$fecha' ";
                    $resultado = mysqli_query(getConexion(), $sql) or die('Error en la consulta: ' . mysqli_error($conexion));

                    if (mysqli_num_rows($resultado) > 0) {
                    while ($cita = mysqli_fetch_assoc($resultado)) {
                        $fecha = $cita['fecha_consulta'];
                        $hora = $cita['hora_cita'];
                        $id_medico = $cita['id_medico'];

                        // Consulta para obtener el nombre y apellido del médico
                        $sqlMedico = "SELECT nombre, apellido FROM `medico` WHERE id_medico = '$id_medico'";
                        $resultadoMedico = mysqli_query(getConexion(), $sqlMedico) or die('Error en la consulta: ' . mysqli_error($conexion));

                        // Verificamos si se encontró el médico
                        if (mysqli_num_rows($resultadoMedico) > 0) {
                                $fila = mysqli_fetch_assoc($resultadoMedico);
                                $nombreCompletoMedico = $fila['nombre'] . " - " . $fila ['apellido'];
                            } else {
                                $nombreCompletoMedico = "Médico no encontrado";
                            }

                            $id_consulta = $cita['id_consulta'];

                            echo "
                            <div class='tarjeta'>
                                <span class='texto1'>$fecha</span> <br>
                                <span class='texto2'>Tienes una cita a las $hora <br> Con Dº/Dª $nombreCompletoMedico</span> <br>
                                <span class='texto2'>Su código de cita es: <span class='texto1'>$id_consulta</span></span> <br>
                                
                            </div>
                            ";
                        }
                    }else {
                        //En caso de cuando no hay cita
                        echo "
                        <div class='tarjeta'>
                                <span class='texto1'>No tiene cita actualmente </span> <br>
                        </div>";
                    }
                ?>

                </div>
            </div>

        </div>
        <div class="imagen"></div>
    </div>
    <div class="footer">
        <?php
            include 'footer.php';
        ?>
    </div>
    
    </div>
    <!-- <script>
        // Función para cargar las próximas citas con fetch
        function cargarCitas() {
            fetch('obtener_citas.php?id_usuario=<?php echo $id_usuario; ?>')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Hubo un problema al cargar las citas.');
                    }
                    return response.text();
                })
                .then(data => {
                    document.getElementById('lasCitas').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al cargar las citas.');
                });
        }

        // Cargar las citas al cargar la página
        cargarCitas();
    </script> -->
</body>
</html>