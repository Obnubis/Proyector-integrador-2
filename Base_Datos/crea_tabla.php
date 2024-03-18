<?php
    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';
    
    // Obtener la conexión a la base de datos
    $conexion = getConexion();
    
    // Crear la tabla de medico si no existe
    $medico = "CREATE TABLE IF NOT EXISTS medico(
        id_medico int AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50), 
        apellido VARCHAR(50),
        especialidad VARCHAR(50),
        direccion VARCHAR(200),
        precio_consulta int, 
        telefono VARCHAR(50), 
        sobre_mi VARCHAR (500), 
        enfermedades VARCHAR(500),
        curriculum LONGBLOB, 
        imagen varchar(200)
    )";
    mysqli_query($conexion, $medico) or die("Error al crear la tabla: " . mysqli_error($conexion));
    
    // Datos de médicos y rutas de archivos PDF
    $datos_medico = array ( 
        array('Emilía', 'Mansilla', 'Psicóloga', 'C. de Nuria, 59, Centro Comercial Mirasierra',  100, '650124957', 
        'Soy Licenciado en Medicina por la Universidad Autónoma de Madrid y me formé como Especialista en Psicologia en el Hospital Universitario La Paz', 
        '1. Trastornos de Ansiedad, 2.Depresión, 3. TDHA','img\medico1.png'),
        array('Maria', 'Milagros', 'Psicóloga Infantil', 'Calle Pechuán 14, Madrid', 40, '640711935', 
        'La Psicología además de ser mi profesión, es mi pasión. Por eso llevo dedicándome al trabajo terapéutico con personas más de 18 años. GRADO EN PSICOLOGÍA. Experta Universitaria en Trastornos Psicológicos en niños y adolescentes.', 
        '1. Estrés, 2.Duelo, 3. Miedo' ,'img\medico2.png'),
        array('Carlos', 'López', 'Psicólogo', 'Calle Pechuán 14, Madrid', 80, '689532451',
        'Psicólogo con habilitación sanitaria con más de una década de experiencia en la práctica clínica. Mi objetivo es trabajar contigo para ayudarte a desarrollar paso a paso un proyecto de vida consistente con tus valores y metas personales.', 
        '1. Trastornos de Ansiedad, 2.Depresión, 3. TDHA','img\medico3.png'),
        array('Alejandra', 'Miguélez', 'Terapeuta','Paseo de los Melancólicos 33, Madrid', 60,'695212240', 
        'Terapeuta en Psicología Energética y en el Par Biomagnético , Kinesiólogo, Acupuntor, Profesor de Chi-Kung, Taichí y Meditación.', 
        '1. Adiccion, 2.Duelo, 3. TDHA','img\medico4.png'),
        array('Gema', 'Vega', 'Terapeuta complementaria', 'General Pardiñas, 81. Bajo Derecha, Madrid', 80, '647821351', 
        'Acompañar en los procesos de reconocimiento es mi pasión. 15 años de experiencia en terapia. Especialista en psicoterapia cognitiva posracionalista. Talleres de Mindfulness. PNL. Coach personal', 
        '1. Trastornos de Ansiedad, 2.Depresión, 3. TDHA','img\medico5.png')
    );
    
    // Definir las rutas de los archivos PDF
    $ruta_pdf = array(
        "cv_medico\medico1.pdf",
        "cv_medico\medico2.pdf",
        "cv_medico\medico3.pdf",
        "cv_medico\medico4.pdf",
        "cv_medico\medico5.pdf"
    );
    
    // Recorrer los datos de los médicos y sus archivos PDF asociados
    foreach($datos_medico as $indice => $dato) {
        $nombre = $dato[0];
        $apellido = $dato[1];
        $especialidad = $dato[2];
        $direccion = $dato[3];
        $precio_consulta = $dato[4];
        $telefono = $dato[5];
        $sobre_mi = $dato[6];
        $enfermedades = $dato[7];
        $imagen = addslashes($dato[8]);
    
        // Obtener la ruta del archivo PDF correspondiente al médico actual
        $ruta_archivo_pdf = $ruta_pdf[$indice];
    
        // Leer el contenido del archivo PDF en una variable
        $contenido_pdf = file_get_contents($ruta_archivo_pdf);
    
        // Escapar el contenido del PDF para evitar problemas con comillas y caracteres especiales
        $contenido_pdf = mysqli_real_escape_string($conexion, $contenido_pdf);
    
        // Verificar si ya existe un médico con los mismos datos
        $verificar = "SELECT * FROM medico 
                      WHERE nombre = '$nombre' AND 
                            apellido = '$apellido' AND 
                            especialidad = '$especialidad'";
        $resultado = mysqli_query($conexion, $verificar);
    
        // Si no existe, insertar los datos del médico en la tabla
        if (mysqli_num_rows($resultado) == 0) {
            $insertar_consulta = "INSERT INTO medico(nombre, apellido, especialidad, direccion, precio_consulta, telefono, sobre_mi, enfermedades, curriculum, imagen) 
                                  VALUES ('$nombre', '$apellido', '$especialidad', '$direccion', '$precio_consulta', '$telefono', '$sobre_mi', '$enfermedades', '$contenido_pdf', '$imagen')";
            mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos del médico: " . mysqli_error($conexion));
        }
    }



    //Crear la tabla de Usuario
    $fecha_actual = date("Y-m-d");
    $usuario = "CREATE TABLE IF NOT EXISTS usuario (
        id_usuario INT AUTO_INCREMENT PRIMARY KEY,
        contraseña VARCHAR(255) NOT NULL, 
        dni VARCHAR(10) NOT NULL,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(50) NOT NULL,
        domicilio VARCHAR(200),
        codigoPostal VARCHAR(10),
        provincia VARCHAR(40),
        localidad VARCHAR(40),
        email VARCHAR(100) NOT NULL, 
        fecha_nac DATE NOT NULL,
        suscripciones date,
        telefono int,
        pago varchar(100), 
        iban VARCHAR(100),
        precio_mes double
    )";
     mysqli_query($conexion, $usuario) or die("Error al crear la tabla" . mysqli_error($conexion));

     $datos_paciente = array ( 
        array ('$2y$10$B2CQR9TqJ7oDEuOR9FKlqex5onG03q/bxOwcG/yDXSZQ02/hkNvPW','12345678A', 'Juanito', 'Gómez', 'Calle Sanchez 2','28019','Madrid', 'Madrid', 'juanito@gmail.com', '1990-01-15', $fecha_actual, '640212325', 'ES8820381520556400103342'),
        array('$2y$10$B2CQR9TqJ7oDEuOR9FKlqex5onG03q/bxOwcG/yDXSZQ02/hkNvPW','98765432B', 'Ananita', 'Martínez','Calle de Tajo 6', '28670' , 'Villaviciosa de Odón', 'Madrid',
        'ananita@gmail.com', '1985-05-20', $fecha_actual,'642512325', 'ES77210022678951817199410'),
        array('$2y$10$B2CQR9TqJ7oDEuOR9FKlqex5onG03q/bxOwcG/yDXSZQ02/hkNvPW','45678901C', 'CarlosTomas', 'Gonzares', 'Calle Luis claudio 2','28044', 'Madrid', 'Madrid',
        'carlos@gmail.com', '1980-12-10', $fecha_actual, '640212105', 'ES8100340502280810647140'),
        array('$2y$10$B2CQR9TqJ7oDEuOR9FKlqex5onG03q/bxOwcG/yDXSZQ02/hkNvPW','78901234D', 'Tomas', 'Rodríguez', 'Calle clarisa', '28019','Madrid', 'Madrid',
        'tomas@gmail.com', '1995-08-05', $fecha_actual, '674111325', 'ES8800230700550395652225'),
        array('$2y$10$B2CQR9TqJ7oDEuOR9FKlqex5onG03q/bxOwcG/yDXSZQ02/hkNvPW','72101535D', 'Tomas', 'Sanchez', 'Calle Alejandro Sanchez', '28019','Madrid', 'Madrid',
        'tomasSanchez@gmail.com', '1975-09-25', $fecha_actual,'612312325', 'ES9201286819518964197151')
        
    );
    
        foreach($datos_paciente as $dato)
    {
        $contraseña = $dato[0];
        $dni = $dato[1];
        $nombre = $dato[2];
        $apellido = $dato[3];
        $domicilio = $dato[4];
        $codigoPostal =$dato[5];
        $provincia = $dato[6];
        $localidad = $dato[7];
        $email = $dato[8];
        $fecha_nac = $dato[9];
        $suscripciones = $dato[10];
        $telefono = $dato[11];
        $iban = $dato [12];
        
        $verficar = "SELECT * FROM usuario where dni = '$dni'";
        $resultado = mysqli_query($conexion,$verficar);

        if (mysqli_num_rows($resultado)>0){
        }
        else {
            $insertar_consulta = "INSERT INTO usuario (contraseña, dni, nombre, apellido, domicilio,codigoPostal,provincia,localidad, email, fecha_nac, suscripciones, telefono, iban, precio_mes) VALUES 
            ('$contraseña', '$dni','$nombre', '$apellido', '$domicilio', '$codigoPostal', '$provincia','$localidad', '$email','$fecha_nac', '$suscripciones', '$telefono', '$iban', 'null')";
            mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de consulta: " . mysqli_error($conexion));
           
        }
    }

    
 //Crear tabla de Consulta 
 $consulta = "CREATE TABLE IF NOT EXISTS consulta(
    id_consulta int AUTO_INCREMENT PRIMARY KEY,
    id_medico int, 
    id_usuario int,
    fecha_consulta DATE,
    hora_cita varchar(200), -- aqui he cambiado time por varchar para que el formado se quede bien
    comentario VARCHAR(200), 
    pdf LONGBLOB,
    FOREIGN KEY (id_medico) REFERENCES medico(id_medico), 
    FOREIGN KEY (id_usuario)REFERENCES usuario(id_usuario)
    )";
mysqli_query($conexion, $consulta) or die("Error al crear la tabla" . mysqli_error($conexion));

//Asegura que no hay repeticiones de datos en la tabla 

$datos_consulta = array ( 
array(1, 4, '2023-11-26', '13:00', ''), // Agregar hora actual aquí
// Pasadas
array(1, 1, '2023-11-25', '12:00', ''), // Agregar hora deseada aquí
array(2, 3, '2023-01-25', '14:30', ''), // Agregar hora deseada aquí
array(3, 2, '2023-12-05', '10:45', ''), // Agregar hora deseada aquí
array(1, 4, '2023-05-18', '09:00', '') // Agregar hora deseada aquí
);

foreach($datos_consulta as $dato) {
    $id_medico = $dato[0];
    $id_paciente = $dato[1];
    $fecha_consulta = $dato[2];
    $hora_consulta = $dato[3]; // Obtener la hora de la matriz
    $comentario = $dato[4];
    $verficar = "SELECT * FROM consulta WHERE id_medico = '$id_medico' AND id_usuario = '$id_paciente' AND fecha_consulta = '$fecha_consulta' AND hora_cita = '$hora_consulta'";
    $resultado = mysqli_query($conexion, $verficar);

    if (mysqli_num_rows($resultado) > 0) {
        // Si ya existe una consulta con la misma fecha, hora, médico y paciente, no hacer nada
    } else {
        $insertar_consulta = "INSERT INTO consulta (id_medico, id_usuario, fecha_consulta, hora_cita, comentario, pdf) VALUES 
        ($id_medico, $id_paciente, '$fecha_consulta', '$hora_consulta', '$comentario', 'null')";
        mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de consulta: " . mysqli_error($conexion));
    }
}

    //Crear la tabla de opiniones 
    $opinion = "CREATE TABLE IF NOT EXISTS opinion (
        id_opinion int AUTO_INCREMENT PRIMARY KEY, 
        id_usuario int, 
        id_consulta int,
        nombre_usuario VARCHAR(20),
        fecha_actual date, 
        opinion VARCHAR(200), 
        n_estrella int,
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario), 
        FOREIGN KEY (id_consulta) REFERENCES consulta(id_consulta)

    )"; 
    mysqli_query($conexion, $opinion) or die("Error al crear la tabla opinion" . mysqli_error($conexion));

    //Aseguro que no hay repeticiones de datos en la tabla 
    $datos_opinion = array(
        array(1, 1, 'Maria','2023-01-01', 'Han sido genial, me ha ayudado mucho a comprenderme a mí misma',5),
        array(1, 2, 'Juan','2023-12-05', 'El taller de gestión de estrés con TDA me dio herramientas clave para encontrar equilibrio en mi vida', 5),
        array(1, 3, 'Anónimo','2023-07-18', 'Gracias a los psicologos se como lidiar mejor con mis emociones y me han ayudado a centrarme', 4),
        array(2, 2, 'Anónimo','2023-12-21', 'Encantador en el trato y riguroso. Nos atendió rápido y ubicó enseguida el problema.', 4),
        array(4, 2, 'Anónimo','2023-11-30', 'Me ha sorprendido gratamente. No sólo me ha explicado todo detalladamente sino que me ha dedicado el tiempo necesario para ello. Se agradece cuando vas a someterte a cualquier tratamiento.', 3)
   
    );

    foreach ($datos_opinion as $dato) {
        $id_usuario = $dato[0];
        $id_consulta = $dato[1];
        $nombre = $dato[2];
        $fecha_actual = $dato[3];
        $opinion = $dato[4];
        $n_estrella = $dato[5];

        $verficar = "SELECT * FROM opinion where id_usuario = '$id_usuario' and id_consulta = '$id_consulta' and fecha_actual = '$fecha_actual'";
        $resultado = mysqli_query($conexion, $verficar);

        if (mysqli_num_rows($resultado)>0){
        }
        else {
            $insertar_consulta = "INSERT INTO opinion (id_usuario, id_consulta ,nombre_usuario , fecha_actual, opinion, n_estrella) 
            values ('$id_usuario', '$id_consulta','$nombre', '$fecha_actual', '$opinion', '$n_estrella')";
             mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de opiniones: " . mysqli_error($conexion));
           
        }

    }

    //Crear la tabla de chats TIMESTAMP es para mostrar año-mes-dias-horas-minuto-segundo
    $chats = "CREATE TABLE IF NOT EXISTS chats (
        id_chats int AUTO_INCREMENT PRIMARY KEY, 
        id_medico int, 
        id_usuario int, 
        fecha timestamp,  
        mensaje VARCHAR(200),
        FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario), 
        FOREIGN KEY (id_medico) REFERENCES medico(id_medico)
    )";

    mysqli_query($conexion, $chats) or die("Error al crear la tabla opinion" . mysqli_error($conexion));
    //Asegura que no hay repetiones de datos en la tabla 
    $datos_chats = array(
        array(1 , 1, '2024-01-13 14:30:00', 'Hola, buenas'),
        array(1 , 1, '2024-01-13 15:30:00', 'Hola'),
        array(1 , 1, '2024-01-13 15:31:00', 'Querio hacer una consulta'),
        array(1 , 1, '2024-01-13 15:32:00', 'Dime'),
        array(1 , 1, '2024-01-13 15:32:10', 'Estos días, estoy teniendo muchos estrés, no puedo centrarme a estudiar')
    );

    //1 usuario y 1 Medico en un unico chats, el id de chats es unico. Segun la fecha, el mensaje va ser sustituido
    //No se sabe si funciona
    foreach($datos_chats as $dato)
    {
        $id_medico= $dato[0];
        $id_usuario = $dato[1];
        $fecha = $dato[2];
        $mensaje = $dato[3];

        $verficar = "SELECT * FROM chats where id_medico = '$id_medico' and id_usuario= '$id_usuario' and fecha = '$fecha'";
        $resultado = mysqli_query($conexion,$verficar);

        if (mysqli_num_rows($resultado)>0){

        }
        else {
            $insertar_consulta = "INSERT INTO chats (id_medico, id_usuario, fecha, mensaje) values ('$id_medico', '$id_usuario', '$fecha', '$mensaje')";
             mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de medicamento: " . mysqli_error($conexion));
           
        }
    }


    //Crear la tabla de promociones 
   $promocion = "CREATE TABLE IF NOT EXISTS promocion (
    id_promocion int AUTO_INCREMENT PRIMARY KEY, 
    fecha date,  
    codigo VARCHAR(200), 
    descuento int )";

mysqli_query($conexion, $promocion) or die("Error al crear la tabla opinion" . mysqli_error($conexion));
//Asegura que no hay repetiones de datos en la tabla 
$datos_promocion = array(
    array($fecha_actual, "2024012B", 20),
    array($fecha_actual, "2024012A", 20),
    array($fecha_actual, "BIENVENIDA", 10),
    array($fecha_actual, "NAVIDAD", 20),
    array($fecha_actual, "SOYPREMIU", 30),
);

//Promociones -> asegura que los codigos no se repide 
foreach($datos_promocion as $dato)
{
    $fecha= $dato[0];
    $titulo = $dato[1];
    $mensaje = $dato[2];

    $verficar = "SELECT * FROM promocion where codigo = '$titulo'";
    $resultado = mysqli_query($conexion,$verficar);

    if (mysqli_num_rows($resultado)>0){

    }
    else {
        $insertar_consulta = "INSERT INTO promocion (fecha, codigo , descuento) values ( '$fecha','$titulo', '$mensaje')";
         mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de medicamento: " . mysqli_error($conexion));
       
    }
}
?>