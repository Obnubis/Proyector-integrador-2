<!-- de Mario o eso creo -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/perfil.css">
    <title>Perfil</title>
</head>
<body>
  <?php
  include "header.php";
  ?>
    

      <div class="principal">  
        <h1>MI PERFIL</h1>
        <hr>     
        <div class="izquierda">
            <h3>Información</h3>
            <h3>Mis citas</h3>
            <h3>Mis suscripciones</h3>
            <h3>Mi chat medico</h3>
            <h3>Cerrar sesión</h3>
            <div class="foto"><img src="" alt=""></div>
            <button>Editar perfil</button>
            <img src="img/_fccd9947-7906-402d-adad-306f824edbec-removebg-preview-removebg-preview 1.png" alt="">
        </div>
        <div class="derecha">
            <h1>Bienvenido usuario</h1>

            <label for="">Nombre Completo</label>
            <input type="text" name="name" id="">
            <label for="">Domicilio</label>
            <input type="text" name="domici" id="">
        </div>
      </div>

      <?php 
      include "footer.php";
      ?>

     
</body>
</html>