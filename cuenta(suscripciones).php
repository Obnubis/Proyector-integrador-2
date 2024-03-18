<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuenta(calendario)</title>
    <link rel="stylesheet" href="CSS/cuenta(suscripcriones)1.css">
    <link rel="icon" type="image" href="img/logo.png">

</head>
<body>
    <!-- Id de usuario -->
    <?php
        include 'header.php'
    ?>
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
        $fecha_hoy = date("Y-m-d");
        if(isset($_POST['cancelar'])){
            $sql = "UPDATE `usuario` SET `suscripciones`='$fecha_hoy' WHERE id_usuario= '$usuario'";
            $resultadoCancelar = mysqli_query(getConexion(), $sql) or die('Error en la consulta: ' . mysqli_error($conexion));
            if ($resultadoCancelar) {
            } else {
                echo "Error al actualizar datos: " . mysqli_error(getConexion());
            }
        }
        if(isset($_POST['guardar'])){
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $iban = $_POST['pago'];
            $sql = "UPDATE `usuario` SET email='$email', telefono='$telefono', iban='$iban' WHERE id_usuario= '$usuario'";
            $resultadoCancelar = mysqli_query(getConexion(), $sql) or die('Error en la consulta: ' . mysqli_error($conexion));
            if ($resultadoCancelar) {
            } else {
                echo "Error al actualizar datos: " . mysqli_error(getConexion());
            }
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
                <span class="titulo1">Mi Suscripción</span>
                <div class="suscripciones">
                    <?php
                       
                        $sql = "SELECT * FROM usuario where id_usuario = $usuario and suscripciones > '$fecha_hoy'";
                        $resultado = mysqli_query(getConexion(), $sql) or die('Error en la consulta: ' . mysqli_error($conexion));
                        if (mysqli_num_rows($resultado)>0){
                            while($usuario=mysqli_fetch_assoc($resultado)){
                            $email = $usuario['email'];
                            $telefono = $usuario ['telefono'];
                            $metodoFacturacion = $usuario ['iban'];
                            $fechaSuscripcion = $usuario ['suscripciones'];
                            $precioTotal = $usuario['precio_mes'] . "€";
                            }
                            echo "
                            <div class='datos'>
    <span class='texto2'>DATOS DE SUSCRIPCIÓN</span>
    <form action='cuenta(suscripciones).php' method='post' class='formulario' onsubmit='return false;'>
        <div class='formulario1'>
            <div class='rellenar'>
                <label for='direccion' class='textoRellenar'>Dirección Email</label>
                <input type='text' name='email' id='email' class='textoResponder' value='$email' disabled>
            </div>
            <div class='rellenar'>
                <label for='telefono' class='textoRellenar'>Teléfono</label>
                <input type='text' name='telefono' id='telefono' class='textoResponder' value='$telefono' disabled>
            </div>
            <div class='rellenar'>
                <label for='pago' class='textoRellenar'>Método de facturación</label>
                <input type='text' name='pago' id='pago' class='textoResponder' value='$metodoFacturacion' disabled>
            </div>
        </div>
        <div class='botones-container'>
        <button type='button' class='butonEnviar' id='botonModificar' onclick='mostrarGuardar()'>Modificar</button>
        <button type='button' class='butonEnviar' id='botonGuardar' style='display: none;' onclick='guardar()'>Guardar</button>
    </div>
    
    </form>
</div>

<div class='datos'>
    <span class='texto2'>FACTURACIÓN Y CANCELACIÓN</span>
    <form action='cuenta(suscripciones).php' method='post' class='formulario'>
        <div class='formulario1'>
            <div class='rellenar'>
                <label for='fecha_alta' class='textoRellenar'>Fecha de renovación</label>
                <input type='text' name='fecha_alta' id='fecha_alta' class='textoResponder' value='$fechaSuscripcion' readonly>
            </div>
            <div class='rellenar'>
                <label for='direccion' class='textoRellenar'>Descripción</label>
                <input type='text' name='email' id='email' class='textoResponder' value='Pagado' readonly>
            </div>
            <div class='rellenar'>
                <label for='telefono' class='textoRellenar'>Recibos</label>
                <input type='text' name='telefono' id='telefono' class='textoResponder' value='$precioTotal' readonly>
            </div>
        </div>
        <button type='submit' class='butonEnviar' name='cancelar' id='cancelar'>Cancelar</button>
    </form>
</div>


                            ";
                        }
                        else {
                            echo "

                            <div class='suscripcion-container'>
                                <div class='suscripcion-content'>
                                <span class='textoSinSuscripcion'>No está suscripto a ningún plan de nuestro.</span> <br>
                                <span class='textoSinSuscripcion1'>Con nuestros planes te daremos acceso a varios servicios que mejor se adapten a tus necesidades. Sólo tendrás que activarlo y nosotros nos encargamos del resto.</span>
                                <button type='button' class='butonIr'><a href='suscripciones(precio).php' class='textoA'>Ver Planes</a></button>
                            </div>
                            </div>
                            
                            ";
                        }
                    
                    ?>
                </div>
            </div>

        </div>
        <div class="imagen"></div>
    </div>
    <?php
        include 'footer.php';
    ?>
    </div>
    <script>
    // Función para habilitar los campos de entrada y mostrar el botón de guardar
    function mostrarGuardar() {
        var campos = document.querySelectorAll('.textoResponder');
        for (var i = 0; i < campos.length; i++) {
            campos[i].removeAttribute('disabled');
        }
        document.getElementById('botonModificar').style.display = 'none';
        document.getElementById('botonGuardar').style.display = 'inline-block';
    }

    // Función para deshabilitar los campos de entrada y ocultar el botón de guardar
// Función para deshabilitar los campos de entrada y ocultar el botón de guardar
function guardar() {
    var campos = document.querySelectorAll('.textoResponder');
    for (var i = 0; i < campos.length; i++) {
        campos[i].setAttribute('disabled', 'disabled');
    }
    document.getElementById('botonModificar').style.display = 'inline-block'; // Mostrar el botón "Modificar"
    document.getElementById('botonGuardar').style.display = 'none';
}

    
</script>


</body>
</html>