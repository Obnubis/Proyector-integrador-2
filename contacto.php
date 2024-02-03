<!-- de Mario -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap"/>
    <link rel="stylesheet" href="CSS/contacto.css"/>
  </head>
  <body>

    <?php
    include "header.php";
    ?>
      <div class="main">
      <div class="izq">
      <h1>Contáctanos</h1>
      <h3>Para cualquier duda o sugerencia </h3>
      <form>
          <input type="text" placeholder="Contacto">
          <input type="text" placeholder="Correo electrónico">
          <select name="sugerencia" id="sugerencia">
            <option value="1">Fallo con la cuenta</option>
            <option value="2">Fallo en la compra</option>
            <option value="3">Fallo en el curso</option>
        </select>
          <textarea name="write" id="write" cols="30" rows="10"></textarea>
          <input type="submit" value="Enviar">
      </form>
      </div>

      <div class="der">
      <h1 class="empresa">Datos de la empresa</h1>
      <p>Mente Atenta S.L. </p>
      <p>Calle del Tajo, Villaviciosa de Odón <br>
        28670 , Madrid <br> 
        España
      </p>
      <p>Telefono: 912 321 123</p>
      </div>
      </div>
      <?php
      include "footer.php";
      ?>
      

  </body>
</html>
