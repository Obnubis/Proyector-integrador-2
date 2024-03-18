<!-- de Mario -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mente Atenta</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap"/>
    <link rel="stylesheet" href="CSS/index.css"/>
    <link rel="icon" type="image" href="img/logo.png">

  </head>
  <body>
     <form action="/ruta-del-servidor" method="post">
      <?php
      include "header.php";
      ?>
       <?php include 'Base_Datos/crea_tabla.php';?>


      <div class="hero">
        <span class="texto">
          Tu singularidad es tu superpoder <br />No hay límites para lo que puedes
          <br />lograr con tu talento único.
        </span>
        
        <button class="start_button">
          <a href="iniciaSesion.php">Empezar</a>
        </button>
      </div>
  
      <div class="products">
        <span class="texto2">¿Necesitas ayuda? Te ayudamos</span>
        <div class="card_container">
          <div class="card">
            <img src="img/Rectangle 10.png" alt="" />
            <span class="texto3">Contestar a los test</span>
            <span class="texto4">
              Responde a tu ritmo y sin prisas es necesario, para determinar si
              tienes o no TDA o TDH una vez hecho, te animamos a ir a los consejos
            </span>
          </div>
          <div class="card">
            <img src="img/Rectangle 10 (1).png" alt="" />
            <span class="texto3">Busca tu psicologo</span>
            <span class="texto4">
              Aquí podrás encontrar a tu psicologo, todos son profesionales del
              sector y te ayudarán. Recuerda que estan para ayudarte, animate
            </span>
          </div>
          <div class="card">
            <img src="img/Rectangle 10 (2).png" alt="" />
            <span class="texto3">Cita con tu psicologo</span>
            <span class="texto4">
              Desbloquea tu bienestar emocional, reserva tu cita hoy y comienza el
              viaje hacia una mente más fuerte y equilibrada.
            </span>
          </div>
          <div class="card">
            <img src="img/Rectangle 10 (3).png" alt="" />
            <span class="texto3">Seguimiento con tu psicologo</span>
            <span class="texto4">
              Descubre la transformación personal con nuestro seguimiento
              psicológico. Da el primer paso hacia un bienestar duradero hoy
              mismo.
            </span>
          </div>
        </div>
        <div class="button_container">
          <button class="start_now">
            <a href=citaSinSesion.php class="texto5">Empezar ahora</a>
          </button>
        </div>
      </div>
  
      <div class="asesor">
        <div class="text-container">
        <span class="texto8">¿Tienes el TDAH? <br> Descúbrerlo !!!</span>
        <span class="texto6">Test para identificar el TDAH Gratuita</span>
        <span class="texto7">Responde las preguntas para recibir un plan personalizado <br> y 
          enfrenta tus objetivos con mucha concentracion, energia y 
          voluntad!</span>
          <button class="start_now"><a href="test.php" class="texto5">Comienza</a></button>
        </div>
          
          <div class="image-container">
            <img src="img/personasHablando.png" alt="" />
          </div>
      </div> 
  
      <div class="servicios">
        <div class="plans">
          <span class="texto9">¿Quieres cambiar?<br> 
            ¡Transformate!  </span>
          <span class="texto10">Elige desde 0 €</span>
          <img src="img/imagenMujer.png" class="image">
          <button class="plan"><a href="suscripciones(precio).php">Ver planes</a></button>
        </div>
        <div class="column">
        <div class="anounce">
          <span class="texto11">Di adiós al estrés, la culpa o la sensación de que estás <br>
            constantemente atrás. Descubre cómo el TDAH te ha <br>
            impedido alcanzar tus sueños </span>
            <button class="plan"><a href="suscripciones(precio).php">Ver planes</a></button>
        </div>
        <div class="health">
          <span class="texto6">Tu salud, más fácil</span>
          <span class="texto11">Compra consultas, pruebas y cursos en más de 200 <br>clínicas 
           privadas a los mejores precios. Sin listas  de<br> espera. Sin cuotas</span>
           <button class="plan"><a href="suscripciones(precio).php">Ver planes</a></button>
          <button class="planese"><a href="contacto.php">¿Te llamamos?</a></button>
        </div>
      </div>
      </div>
      <div class="valoracion">
        <span class="texto2">¿Cómo nos valoran nuestros usuarios?</span>
        <div class="cartas">
          <div class="cards">
            <span class="texto6">Macarena García</span>
            <span class="texto4">" Han sido genial, me ha 
              ayudado mucho a 
              comprenderme a mí misma "</span>
          </div>
          <div class="cards">
            <span class="texto6">Victor Fuertes</span>
            <span class="texto4">" El taller de gestión de estrés con TDA me dio herramientas clave para encontrar equilibrio en mi vida "</span>
          </div>
          <div class="cards">
            <span class="texto6">Juan del Hoyo</span>
            <span class="texto4">" Gracias a los psicologos se como lidiar mejor con mis emociones y me han ayudado a centrarme "</span>
          </div>
          <div class="cards">
            <span class="texto6">Lucia Vargas</span>
            <span class="texto4">" Gracias a los talleres se 
              como lidiar con mi hijo 
              que tiene TDA "</span>
          </div>
        </div>
      </div>
      

      <?php
      include "footer.php";
      ?>
      


  </body>
</html>