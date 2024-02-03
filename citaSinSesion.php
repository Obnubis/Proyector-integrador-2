<!--  creo que de Mario -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cita sin iniciar sesión</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap"/>
    <link rel="stylesheet" href="CSS/citaSinSesion.css"/>
  </head>
  <body>
    <div class="main-container">

      <?php
      include "header.php";
      ?>
      
      <div class="pag">
        <div class="izquierda">
            <h1>Género del doctor</h1>
            <form action="">
                <input type="radio" name="hombre" id=""> Hombre
                <input type="radio" name="mujer" id=""> Mujer
                <h1>Especialidad</h1>
                <input type="radio" name="psicologo" id=""> Psicólogos
                <br>
                <input type="radio" name="terapeuta" id=""> terapeuta
                <h1>Precio</h1>
                <h5>min</h5>
                <h5>max</h5>   
            </form>
        </div>
        <div class="derecha">
            <div class="maria">
                <div class="info">
                    <div class="profile"></div>
                    <h3>Maria Milagros</h3>
                    <h4>Psicóloga infantil</h4>
                    <h3>Dirección</h3>
                    <h4>Calle Pechúan 14</h4>
                    <h6>Madrid</h6>
                    <h3>Visita</h3>
                    <h3>50€</h3>
                    <button class="cita"><a href="#">Pedir citas</a></button>
                    <button class="ver"><a href="#">Ver Más</a></button>
                </div>
                <div class="calendar">
                    <div class="lunes">
                        <h1>LUN</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="martes">
                        <h1>MAR</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="miercoles">
                        <h1>MIÉ</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="jueves">
                        <h1>JUE</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="viernes">
                        <h1>VIE</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                </div>
            </div>
            <div class="carlos">
                <div class="info">
                    <div class="profile"></div>
                    <h3>Carlos López</h3>
                    <h4>Psicólogol</h4>
                    <h3>Dirección</h3>
                    <h4>Calle Pechúan 14</h4>
                    <h6>Madrid</h6>
                    <h3>Visita</h3>
                    <h3>50€</h3>
                    <button><a href="#">Pedir citas</a></button>
                    <button><a href="#">Ver Más</a></button>
                </div>
                <div class="calendar">
                    <div class="lunes">
                        <h1>LUN</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="martes">
                        <h1>MAR</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="miercoles">
                        <h1>MIÉ</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="jueves">
                        <h1>JUE</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="viernes">
                        <h1>VIE</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                </div>
            </div>
            <div class="jorge">
                <div class="info">
                    <div class="profile"></div>
                    <h3>Jorge Martinez</h3>
                    <h4>Terapeuta</h4>
                    <h3>Dirección</h3>
                    <h4>Calle Pechúan 14</h4>
                    <h6>Madrid</h6>
                    <h3>Visita</h3>
                    <h3>50€</h3>
                    <button><a href="#">Pedir citas</a></button>
                    <button><a href="#">Ver Más</a></button>
                </div>
                <div class="calendar">
                    <div class="lunes">
                        <h1>LUN</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="martes">
                        <h1>MAR</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="miercoles">
                        <h1>MIÉ</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="jueves">
                        <h1>JUE</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                    <div class="viernes">
                        <h1>VIE</h1>
                        <button>9:00</button>
                        <button>10:00</button>
                        <button>11:00</button>
                        <button>12:00</button>
                        <button>16:00</button>
                        <button>17:00</button>
                        <button>18:00</button>
                        <button>19:00</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>
      
      
    </div>
  </body>
</html>

