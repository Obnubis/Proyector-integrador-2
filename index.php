<!-- de Mario -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap"/>
    <link rel="stylesheet" href="CSS/index.css"/>
  </head>
  <body>
     <form action="/ruta-del-servidor" method="post">
      <?php
      include "header.php";
      ?>
    
    
      <div class="hero">
        <h1>
          Tu singularidad es tu superpoder <br />No hay límites para lo que puedes
          <br />lograr con tu talento único.
        </h1>
        <button class="start_button">
          <a href="inicioSesion.php">Empezar</a>
        </button>
      </div>
  
      <div class="products">
        <h1>¿Necesitas ayuda? Te ayudamos</h1>
        <div class="card_container">
          <div class="card">
            <img src="#" alt="" />
            <h1>Contestar a los test</h1>
            <h3>
              Responde a tu ritmo y sin prisas es necesario, para determinar si
              tienes o no TDA o TDH una vez hecho, te animamos a ir a los consejos
            </h3>
          </div>
          <div class="card">
            <img src="#" alt="" />
            <h1>Busca tu psicologo</h1>
            <h3>
              Aquí podrás encontrar a tu psicologo, todos son profesionales del
              sector y te ayudarán. Recuerda que estan para ayudarte, animate
            </h3>
          </div>
          <div class="card">
            <img src="#" alt="" />
            <h1>Cita con tu psicologo</h1>
            <h3>
              Desbloquea tu bienestar emocional, reserva tu cita hoy y comienza el
              viaje hacia una mente más fuerte y equilibrada.
            </h3>
          </div>
          <div class="card">
            <img src="#" alt="" />
            <h1>Seguimiento con tu psicologo</h1>
            <h3>
              Descubre la transformación personal con nuestro seguimiento
              psicológico. Da el primer paso hacia un bienestar duradero hoy
              mismo.
            </h3>
          </div>
        </div>
        <div class="button_container">
          <button class="start_now">
            <a href="#">Empezar ahora</a>
          </button>
        </div>
      </div>
  
      <div class="asesor">
        <div class="text-container">
        <h1>¿Tienes el TDAH?<br> Descúbrerlo !!!</h1>
        <h3>Test para identificar el TDAH Gratuita</h3>
        <h4>Responde las preguntas para recibir un plan personalizado <br> y 
          enfrenta tus objetivos con mucha concentracion, energia y 
          voluntad!</h4>
          <button class="comienza"><a href="test.php">comienza</a></button>
        </div>
          
          <div class="image-container">
            <img src="img/personasHablando.png" alt="" />
          </div>
      </div> 
  
      <div class="servicios">
        <div class="plans">
          <h1>¿Quieres cambiar?<br> 
            ¡Transformate!  </h1>
          <h2>Elige desde 0 €</h2>
          <img src="img/imagenMujer.png" class="image">
          <button class="plan">Ver planes</button>
        </div>
        <div class="column">
        <div class="anounce">
          <h3>Di adiós al estrés, la culpa o la sensación de que estás 
            constantemente atrás. Descubre cómo el TDAH te ha 
            impedido alcanzar tus sueños </h3>
          <button class="planes">Ver planes</button>
        </div>
        <div class="health">
          <h2>Tu salud, más fácil</h2>
          <h3>Compra consultas, pruebas y cursos en más de 200 clínicas privadas a los mejores precios.  Sin listas de espera. Sin cuotas</h3>
          <button class="planes">Ver planes</button>
          <button class="planes"><a href="contacto.html">¿Te llamamos?</a></button>
        </div>
      </div>
      </div>
      <div class="valoracion">
        <h1>¿Cómo nos valoran nuestros usuarios?</h1>
        <div class="cartas">
          <div class="cards">
            <div class="profile"><img src="img/Rectangle 17.png" alt=""></div>
            <h2>Macarena García</h2>
            <h3>Han sido genial, me ha 
              ayudado mucho a 
              comprenderme a mí misma</h3>
          </div>
          <div class="cards">
            <div class="profile2"><img src="img/Rectangle 85.png" alt=""></div>
            <h2>Victor Fuertes</h2>
            <h3>El taller de gestión de estrés con TDA me dio herramientas clave para encontrar equilibrio en mi vida</h3>
          </div>
          <div class="cards">
            <div class="profile3"><img src="img/Rectangle 91.png" alt=""></div>
            <h2>Juan del Hoyo</h2>
            <h3>Gracias a los psicologos se como lidiar mejor con mis emociones y me han ayudado a centrarme</h3>
          </div>
          <div class="cards">
            <div class="profile4"><img src="img/Rectangle 88.png" alt=""></div>
            <h2>Lucia Vargas</h2>
            <h3>Gracias a los talleres se 
              como lidiar con mi hijo 
              que tiene TDA</h3>
          </div>
        </div>
      </div>
      

      <?php
      include "footer.php";
      ?>
      


  </body>
</html>
