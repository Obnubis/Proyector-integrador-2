
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image" href="img/logo.png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/error.css">
    <title>Error</title>
</head>
<body>
  <?php
  include "header.php";
  ?>
    
      <div class="caja">
        <div class="columna">
            <h1>¡Oops!</h1>
            <h1>Lo sentimos mucho...</h1>
            <h1>Parece que está página sigue proceso...</h1>
        </div>
        <div class="derecha">
            <img src="img/proceso.png" alt="" class="imagen2">
        </div>
      </div>
      <button class="volver"><a href="index.php">Home</a></button>

      <?php
      include "footer.php";
      ?>

      
</body>
</html>