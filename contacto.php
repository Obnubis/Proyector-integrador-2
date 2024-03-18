<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>
    <link rel="icon" type="image" href="img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap"/>
    <link rel="stylesheet" href="CSS/contacto.css"/>
    <script>
        function validarFormulario(event) {
        event.preventDefault(); // Evitar que el formulario se envíe automáticamente

        var contactoInput = document.getElementById('contacto').value.trim();
        var correoInput = document.getElementById('correo').value.trim();
        var sugerenciaSelect = document.getElementById('sugerencia').value.trim();
        var writeTextarea = document.getElementById('write').value.trim();
        var mensajeError = document.getElementById('mensajeError');

        // Arreglo para almacenar los nombres de los campos vacíos
        var camposVacios = [];

        // Verifica si algún campo está vacío
        if (contactoInput === '') {
            camposVacios.push('Contacto');
        }
        if (correoInput === '') {
            camposVacios.push('Correo electrónico');
        }
        if (sugerenciaSelect === '') {
            camposVacios.push('Motivo de contacto');
        }
        if (writeTextarea === '') {
            camposVacios.push('Mensaje');
        }

        // Si hay campos vacíos, mostramos el mensaje de error
        if (camposVacios.length > 0) {
            mensajeError.textContent = 'Por favor, complete los siguientes campos: ' + camposVacios.join(', ');
            mensajeError.style.display = 'inline'; // Mostrar el mensaje de error
            return false; // Detener el envío del formulario
        }

        // Validación de longitud del texto en el textarea
        var palabras = writeTextarea.split(/\s+/).length;
        if (palabras < 1 || palabras > 150) {
            mensajeError.textContent = 'El texto debe de contener algún comentario.';
            mensajeError.style.display = 'inline'; // Mostrar el mensaje de error
            return false; // Detener el envío del formulario
        }

        // Si todas las validaciones FUNCIONAN, no mostramos el mensaje de error y DEJAMOS que se envíe del formulario
        mensajeError.style.display = 'none';

        // Reiniciar el formulario
        document.getElementById("formulario-contacto").reset();
        return true;
    }

        function enviarDatos() {
            var formulario = document.getElementById('formulario-contacto');
            var datos = new FormData(formulario);

            fetch('', {
                    method: 'POST',
                    body: datos
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Hubo un problema al enviar el formulario de contacto.');
                    }
                    return response.text();
                })
                .then(data => {
                    console.log(data); // Puedes hacer algo con la respuesta del servidor
                    alert('¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.');
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al enviar el formulario de contacto.');
                });
        }
    </script>

  </head>
  <body>
    <?php include 'header.php'; ?>
    
    <div class="main">
        <div class="contexto">
            <!-- <span class="titulo">Contáctanos</span> -->
            <div class="contenido">

            <div class="der">
            <span class="titulo">Contáctanos</span>

            <div class="info"><span class="texto">Para cualquier duda o sugerencia </span>
            <form id="formulario-contacto" onsubmit="return validarFormulario(event) && enviarDatos()">
                <input type="text" id="contacto" placeholder="Contacto" value="" class="caja texto">
                <input type="text" id="correo" placeholder="Correo electrónico" value="" class="caja1 texto">
                <select name="sugerencia" id="sugerencia" class="caja1 texto">
                    <option value="">El motivo para contáctanos</option>
                    <option value="1">Apuntarme a un curso</option>
                    <option value="1">Apuntarme a un taller</option>
                    <option value="2">Fallo en la compra</option>
                    <option value="3">Fallo en el curso</option>
                    <option value="4">Fallo con la cuenta</option>
                </select>
                <textarea name="write" id="write" cols="30" rows="5" class="caja1 texto" placeholder="Escribe aquí más detalladamente"></textarea>
                <button type="submit" class="enviar texto"> Enviar</button>
                <span id="mensajeError" style="color: red; display: none;"></span>
            </form>
            </div>
            </div>

            <div class="der">
            <div class="info"><span class="texto2">Datos de la empresa</span><br>
            <span class="texto">Mente Atenta S.L. <br>
                                Calle del Tajo, Villaviciosa de Odón <br>
                                28670 , Madrid <br>
                                España <br>
                                Telefono: 912 321 123</span>
            </div>
            </div>
            </div>
        </div>    
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>