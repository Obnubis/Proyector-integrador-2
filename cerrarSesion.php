<!-- de Angi -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cerrar Sesion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/cerrarSesion1.css">
  </head>
  <body>
    <div class="main-container">
      <!-- header  -->
      <?php
      include 'header.php';
      ?>
      <div class="cerrar-sesion">
        <div class="contenido">
          <span class="mi-perfil">MI PERFIL</span>
          <div class="line">
            <hr>
          </div>
          <div class="contenido-7">
            <div class="frame-8">
              <div class="frame-9">
                <!-- menu de perfil -->
                <?php
                include 'menu.php';
                ?>
              </div>
              <!-- contenido  -->
              <div class="cosas">
                <span class="seguro-cerrar-sesion"
                  >¿Seguro que desea cerrar sesion ... ?</span
                >
                <div class="frame-10">
                  <button class="primary-buttons-11">
                    <span class="button-12"><a href="index.php">SI</a></span></button
                  ><button class="primary-buttons-13">
                    <span class="button-14"><a href="#">NO</a></span>
                  </button>
                </div>
                <div class="image-removebg-preview"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      include '../footer.php';
      ?>
      <!-- fondo de imagen -->
      <div class="image-27"></div>
    </div>
  </body>
</html>
