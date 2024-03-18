<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita sin iniciar sesión</title>
    <link rel="icon" type="image" href="img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap"/>
    <link rel="stylesheet" href="CSS/citaSinSesion.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image" href="img/logo.png">

</head>
<body>
<div class="main-container">
    <?php include 'header.php'; ?>
    <div class="titulo">PSICOLOGOS Y TERAPEUTAS</div>
    <div class="pag">
    <div class="izquierda">
    <span class="texto1">Género del doctor</span>
    <form id="searchForm">
        <input type="checkbox" name="genero" id="hombre"> Hombre
        <input type="checkbox" name="genero" id="mujer"> Mujer
        <span class="texto1"><br>Especialida <br></span>
        <input type="checkbox" name="profesion" id="psicologo"> Psicólogos
        <br>
        <input type="checkbox" name="profesion" id="terapeuta"> Terapeuta
    </form>
</div>

        <div class="derecha" id="resultsContainer">
            <!-- Aquí se mostrarán los resultados -->
        </div>
    </div>
    <?php include 'footer.php'; ?>
</div>

<script>
    // Datos de ejemplo de los doctores
    var doctores = [
        {
            "nombre": "Emilia Mansilla",
            "especialidad": "Psicóloga",
            "genero": "mujer",
            "profesion": "psicologo",
            "direccion": "C. de Nuria, 59, Centro Comercial Mirasierra",
            "provincia":"Madrid",
            "precio": "100€"
        },
        {
            "nombre": "Maria Milagros",
            "especialidad": "Psicóloga infantil",
            "genero": "mujer",
            "profesion": "psicologo",
            "direccion": "Calle Pechúan 14",
            "provincia":"Madrid",
            "precio": "50€"
        },
        {
            "nombre": "Carlos Lopez",
            "especialidad": "Psicólogo",
            "genero": "hombre",
            "profesion": "psicologo",
            "direccion": "Calle Pechúan 14",
            "provincia":"Madrid",
            "precio": "100€"
        },
        {
            "nombre": "Alejandro Miguelez",
            "especialidad": "Terapeuta",
            "genero": "hombre",
            "profesion": "terapeuta",
            "direccion": "Paseo de los Meláncolicos 33",
            "provincia":"Madrid",
            "precio": "50€"
        },
        {
            "nombre": "Gema Vega",
            "especialidad": "Terapeuta",
            "genero": "mujer",
            "profesion": "terapeuta",
            "direccion": "Paseo de los Meláncolicos 33",
            "provincia":"Madrid",
            "precio": "50€"
        }
    ];

    $(document).ready(function(){
        $('#searchForm input[type="checkbox"]').change(function(){
            var gender = $('input[name="genero"]:checked').map(function(){ return this.id; }).get().join(',');
            var specialty = $('input[name="profesion"]:checked').map(function(){ return this.id; }).get().join(',');
           

            var results = '';
            $.each(doctores, function(key, doctor){
                if (
                    ((!gender || gender.includes(doctor.genero)) &&
                    (!specialty || specialty.includes(doctor.profesion)))) {
                    var posicion = doctores.indexOf(doctor) + 1; //id_medico
                    results += '<div class="doctor">';
                    results += '<div class="info">';
                    results += '<div class="izquierdatodo">';
                    results += '<div class="profile"><img src="img/' + doctor.nombre.replace(/\s/g, '') + '.png" alt="' + doctor.nombre + '" class="image"></div>';
                    results += '<div class="nombre_doctor"><span class="texto2">' + doctor.nombre + '</span>';
                    results += '<span class="texto3">' + doctor.especialidad + '</span></div>';
                    results += '</div>';
                    results += '<div class="cosas">';
                    results += '<span class="texto2">Dirección</span>';
                    results += '<span class="texto3">' + doctor.direccion + '</span>';
                    results += '<span class="texto3">'+ doctor.provincia + '</span>';
                    results += '</div>';
                    results += '<div class="precio">';
                    results += '<span class="texto4">Visita:</span><span class="texto4">' + doctor.precio + '</span>';
                    results += '</div>';
                    results += '<div class="botones">';
                    results += '<button class="cita"><a class="texto3" href="cita(verMas).php?id_medico='+ posicion +' ">Pedir citas</a></button>';
                    results += '</div>';
                    results += '</div>';
                    results += '</div>';
                }
            });
            // Envuelve los resultados en un contenedor adicional
            var $resultsContainer = $('<div class="doctores-container"></div>');
            $resultsContainer.html(results);
            $('#resultsContainer').html($resultsContainer);
        }).change();
    });
</script>
</body>
</html>