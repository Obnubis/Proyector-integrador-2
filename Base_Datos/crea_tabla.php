<?php
    //Crear las tablas de consultas, medico, usuario, opiniones, chat, notificaciones, tabla para relacionar paciente con medico  

    //Establecer las conexiones
    include 'conexion.php';
    $conexion = getConexion();


    //Crear la tabla de medico 

    $medico = "CREATE TABLE IF NOT EXISTS medico(
        id_medico int AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50), 
        apellido VARCHAR(50),
        especialidad VARCHAR(50),
        direccion VARCHAR(200),
        precio_primera int, 
        precio_consulta int, 
        telefono VARCHAR(50), 
        sobre_mi VARCHAR (500), 
        enfermedades VARCHAR(500),
        curriculum LONGBLOB 
        )";
    mysqli_query($conexion, $medico) or die("Error al crear la tabla" . mysqli_error($conexion));
    
    //Asegura que no hay repeticiones de datos en la tabla

        //Ejemplos de medicos 
        $datos_medico = array ( 
            array('Emilía', 'Mansilla', 'Psicóloga', 'C. de Nuria, 59, Centro Comercial Mirasierra', 100, 100, '650124957', 
            'Soy Licenciado en Medicina por la Universidad Autónoma de Madrid y me formé como Especialista en Psicologia en el Hospital Universitario La Paz', 
            '1. Trastornos de Ansiedad, 2.Depresión, 3. TDHA'),
            array('Maria', 'Milagros', 'Psicóloga Infantil', 'Calle Pechuán 14, Madrid', 50, 40, '640711935', 
            'La Psicología además de ser mi profesión, es mi pasión. Por eso llevo dedicándome al trabajo terapéutico con personas más de 18 años. GRADO EN PSICOLOGÍA.
            Experta Universitaria en Trastornos Psicológicos en niños y adolescentes.', 
            '1. Estrés, 2.Duelo, 3. Miedo' ),
            array('Carlos', 'López', 'Psicólogo', 'Calle Pechuán 14, Madrid', 100, 80, '689532451',
            'Psicólogo con habilitación sanitaria con más de una década de experiencia en la práctica clínica. Mi objetivo es trabajar contigo para ayudarte a desarrollar paso a paso un proyecto de vida consistente con tus valores y metas personales.', 
            '1. Trastornos de Ansiedad, 2.Depresión, 3. TDHA'),
            array('Alejandro', 'Miguélez', 'Terapeuta','Paseo de los Melancólicos 33, Madrid', 60, 60,'695212240', 
            'Terapeuta en Psicología Energética y en el Par Biomagnético , Kinesiólogo, Acupuntor, Profesor de Chi-Kung, Taichí y Meditación.', 
            '1. Adiccion, 2.Duelo, 3. TDHA'),
            array('Gema', 'Vega', 'Terapeuta complementaria', 'General Pardiñas, 81. Bajo Derecha, Madrid', 90, 80, '647821351', 
            'Acompañar en los procesos de reconocimiento es mi pasión.
            15 años de experiencia en terapia. Especialista en psicoterapia cognitiva posracionalista. Talleres de Mindfulness. PNL. Coach personal', 
            '1. Trastornos de Ansiedad, 2.Depresión, 3. TDHA')
        );
    
        foreach($datos_medico as $dato)
        {
            $nombre= $dato[0];
            $apellido = $dato[1];
            $especialidad = $dato[2];
            $direccion = $dato[3];
            $precio_primera = $dato[4];
            $precio_consulta = $dato[5];
            $telefono = $dato[6];
            $sobre_mi = $dato[7];
            $enfermedades = $dato[8]; 
            
            $verficar = "SELECT * FROM medico 
                        where nombre = '$nombre' and 
                        apellido = '$apellido' and 
                        especialidad = '$especialidad'
                        ";
            $resultado = mysqli_query($conexion,$verficar);
    
            if (mysqli_num_rows($resultado)>0){
            }
            else {
                $insertar_consulta = "INSERT INTO medico(nombre, apellido, especialidad, direccion, precio_primera, precio_consulta, telefono, sobre_mi, enfermedades, curriculum) 
                                      values ('$nombre', '$apellido', '$especialidad', '$direccion', '$precio_primera', '$precio_consulta', '$telefono', '$sobre_mi', '$enfermedades', 'null')";
                 mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de medicamento: " . mysqli_error($conexion));
               
            }
        }


    //Crear la tabla de Usuario
    $fecha_actual = date("Y-m-d");
    $usuario = "CREATE TABLE IF NOT EXISTS usuario (
        id_usuario INT AUTO_INCREMENT PRIMARY KEY,
        contraseña VARCHAR(20) NOT NULL, 
        dni VARCHAR(10) NOT NULL,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(50) NOT NULL,
        domicilio VARCHAR(200),
        codigoPostal VARCHAR(10),
        provincia VARCHAR(40),
        localidad VARCHAR(40),
        email VARCHAR(100) NOT NULL, 
        fecha_nac DATE NOT NULL,
        suscripciones date
    )";
     mysqli_query($conexion, $usuario) or die("Error al crear la tabla" . mysqli_error($conexion));

     $datos_paciente = array ( 
        array ('1234','12345678A', 'Juanito', 'Gómez', 'Calle Sanchez 2','28019','Madrid', 'Madrid', '
        juanito@gmail.com', '1990-01-15', $fecha_actual),
        array('1234','98765432B', 'Ananita', 'Martínez','Calle de Tajo 6', '28670' , 'Villaviciosa de Odón', 'Madrid',
        'ananita@gmail.com', '1985-05-20', $fecha_actual),
        array('1234','45678901C', 'CarlosTomas', 'Gonzares', 'Calle Luis claudio 2','28044', 'Madrid', 'Madrid',
        'carlos@gmail.com', '1980-12-10', $fecha_actual),
        array('1234','78901234D', 'Tomas', 'Rodríguez', 'Calle clarisa', '28019','Madrid', 'Madrid',
        'tomas@gmail.com', '1995-08-05', $fecha_actual),
        array('1234','72101535D', 'Tomas', 'Sanchez', 'Calle Alejandro Sanchez', '28019','Madrid', 'Madrid',
        'tomasSanchez@gmail.com', '1975-09-25', $fecha_actual)
        
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
        
        $verficar = "SELECT * FROM usuario where dni = '$dni'";
        $resultado = mysqli_query($conexion,$verficar);

        if (mysqli_num_rows($resultado)>0){
        }
        else {
            $insertar_consulta = "INSERT INTO usuario (contraseña, dni, nombre, apellido, domicilio,codigoPostal,provincia,localidad, email, fecha_nac, suscripciones) VALUES 
            ('$contraseña', '$dni','$nombre', '$apellido', '$domicilio', '$codigoPostal', '$provincia','$localidad', '$email','$fecha_nac', '$suscripciones')";
            mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de consulta: " . mysqli_error($conexion));
           
        }
    }

    
    //Crear tabla de Consulta 

    $consulta = "CREATE TABLE IF NOT EXISTS consulta(
        id_consulta int AUTO_INCREMENT PRIMARY KEY,
        id_medico int, 
        id_usuario int,
        fecha_consulta DATE,
        comentario VARCHAR(200), 
        pdf LONGBLOB,
        FOREIGN KEY (id_medico) REFERENCES medico(id_medico), 
        FOREIGN KEY (id_usuario)REFERENCES usuario(id_usuario)
        )";
    mysqli_query($conexion, $consulta) or die("Error al crear la tabla" . mysqli_error($conexion));

    //Asegura que no hay repeticiones de datos en la tabla 

    $fecha_actual = date("Y-m-d");
    $datos_consulta = array ( 
    array(1, 4, $fecha_actual, ''),
    //Pasadas
    array(1, 1, '2023-11-25', ''),
    array(2, 3, '2023-01-25', ''),
    array(3, 2, '2023-12-05', ''),
    array(1, 4, '2023-05-18', '')

    );

    foreach($datos_consulta as $dato)
    {
        $id_medico = $dato[0];
        $id_paciente = $dato[1];
        $fecha_consulta = $dato[2];
        $comentario = $dato[3];
        $verficar = "SELECT * FROM consulta where id_medico = '$id_medico' and id_usuario = '$id_paciente' and fecha_consulta = '$fecha_consulta'";
        $resultado = mysqli_query($conexion,$verficar);

        if (mysqli_num_rows($resultado)>0){
        }
        else {
            $insertar_consulta = "INSERT INTO consulta (id_medico, id_usuario, fecha_consulta, comentario, pdf) VALUES 
            ($id_medico, $id_paciente, '$fecha_consulta', '$comentario', 'null')";
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
        array(4, 2, 'Anónimo','2023-11-30', 'me ha sorprendido gratamente. No sólo me ha explicado todo detalladamente sino que me ha dedicado el tiempo necesario para ello. Se agradece cuando vas a someterte a cualquier tratamiento.', 3)
   
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

//     //Crear la tabla de notificacion 
//    $notificacion = "CREATE TABLE IF NOT EXISTS notificacion (
//     id_notificacion int AUTO_INCREMENT PRIMARY KEY, 
//     fecha date,  
//     titulo VARCHAR(200),
//     mensaje VARCHAR(200)
// )";

// mysqli_query($conexion, $notificacion) or die("Error al crear la tabla opinion" . mysqli_error($conexion));
// //Asegura que no hay repetiones de datos en la tabla 
// $datos_notificacion = array(
//     array($fecha_actual, "Bienvenido a MenteAtenta", "Aqui estamos con MenteAtenta, Te ayudamos con los citas..."),
//     array($fecha_actual, "Codigo 20% Descuento para su cita", "Introduce el codigo BIENVENIDO24 tendra un descuento de 20% en su cita")
// );

// //1 usuario y 1 Medico en un unico chats, el id de chats es unico. Segun la fecha, el mensaje va ser sustituido
// //No se sabe si funciona
// foreach($datos_notificacion as $dato)
// {
//     $fecha= $dato[0];
//     $titulo = $dato[1];
//     $mensaje = $dato[2];

//     $verficar = "SELECT * FROM notificacion where fecha = '$fecha'";
//     $resultado = mysqli_query($conexion,$verficar);

//     if (mysqli_num_rows($resultado)>0){

//     }
//     else {
//         $insertar_consulta = "INSERT INTO notificacion (fecha, titulo , mensaje) values ( '$fecha','$titulo', '$mensaje')";
//          mysqli_query($conexion, $insertar_consulta) or die("Error al insertar los datos de medicamento: " . mysqli_error($conexion));
       
//     }
// }

// ?>