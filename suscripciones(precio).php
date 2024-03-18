<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscrición</title>
    <link rel="stylesheet" href="CSS/suscripciones(precio)1.css">
    <link rel="icon" type="image" href="img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=ABeeZee:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=GFS+Didot:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Domine:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@400&display=swap"/>
</head>
<body>
<?php
            include 'header.php'
            ?>
    <div class="contenido">
           

        <div class="parte1">
            <span class="titulo1">Unete a nuestros planes</span>
            <span class="titulo2">"Descubre el apoyo emocional que necesitas desde la comodidad de tu espacio. Suscríbete 
                a nuestro chat médico y comienza tu viaje hacia el bienestar hoy mismo"</span>
            <div class="unete">
                <div class="group">
                <a href="#precio"><button class="botonUnete">Unete</button></a>
                <!-- <button class="botonUnete"><a href="#precio" class="text1">Unete</a></button>     -->
        </div>
            </div>
        </div>
        <div class="parte2">
            <div class="medio" id="precio">
               
                <span class="text1">Elige Tu Plan De Suscripción</span>
                <div class="tarjetas"> 
                    <img src="img/precio-parte2.png" alt="" class="imagen">
                    <div class="estandar">
                        <div class="frame21">
                            <div class="frame22">
                                <span class="texto1">Premium</span>
                                <hr>
                                <span class="texto2">+ Calendario de Cita</span>
                                <span class="texto2">+ Cursos y Talleres</span>
                            </div>
                            <div class="frame23">
                            <span class="texto3">35€/</span>
                            <span class="texto4">mes</span>
                        </div>
                        <a href="suscripciones(rellenarFormulario).php?plan=premium"><button class="duda">Apuntarme</button></a>
                        
                    </div>
                        
                    </div>
                </div>
                <div class="normativa">
                <span class="texto3">
                    Normativas:
                    <ol>
                        <li>Mantén tu información personal segura al suscribirte.</li>
                        <li>Respetamos tu privacidad: recibirás solo contenido relevante.</li>
                        <li>Cancela en cualquier momento sin compromisos adicionales.</li>
                    </ol>
                </span>

                </div>
            </div>
        </div>
        <div class="parte3">
            <div class="contenido3">
                <div class="imagen"></div>
                <span class="text1"> Ventajas que trae un chat médico</span>
                <div class="ventaja">
                    <div class="columna1">
                        <div class="p1">
                            <span class="texto3">1.</span>
                            <div class="frame8">
                                <span class="texto2">Accesibilidad y comodidad</span>
                            </div>
                        </div>
                        <div class="p3">
                            <span class="texto3">3.</span>
                            <div class="frame8">
                                <span class="texto2">Registro y seguimiento eficiente</span>
                            </div>
                        </div>
                    </div>

                    <div class="columna2">
                        <div class="p2">
                            <span class="texto3">2.</span>
                            <div class="frame8">
                                <span class="texto2">Flexibilidad en los horarios</span>
                            </div>
                        </div>
                        <div class="p4">
                            <span class="texto3">4.</span>
                            <div class="frame8">
                                <span class="texto2">Respuestas rapidas y apoyo inmediato</span>
                            </div>
                        </div>

                    </div>  
                   
                </div> 
                <a href="enproceso.php"><button class="duda">Ve al Chat</button></a>
            </div>
          

        </div>
        <div class="parte4">
            <div class="textoAB">
                <span class="text1"> Terapia - Online</span>
                <span class="texto2">Programas de salud y Bienestar</span>
                <span class="texto3 espacio">El bienestar emocional, la nutrición y la forma física, son aspectos 
                que cada vez nos preocupan más, pero no siempre sabemos por 
                dónde empezar. <br> Por este motivo, le ofrecemos talleres, cursos o videos profesionales  que te ayudarán a conseguir tu versión más saludables, de manera sencilla y ordenada. </span>
                <a href="terapia-online(talleres).php"><button class="duda">Apuntarme</button></a>
            </div>
            <div class="imagen"><img src="img/parte4precio.png" alt=""></div>
        </div>
        <div class="parte5">
            <div class="contenido1">
              <span class="text1">Y además ofrecemos...</span>  
              <div class="tarjeta">
                <div class="tarjeta1">
                    <div class="salud">
                        <div class="imagen4"><img src="img/saludPrecio.png" alt=""></div>
                        <span class="texto2">Salud Personalizada</span>
                    </div>
                </div>
                <div class="tarjeta1">
                    <div class="salud">
                        <div class="imagen1"><img src="img/saludPrecio1.png" alt=""></div>
                        <span class="texto2">Contenido de Personalizado</span>
                    </div>
                </div>
                <div class="tarjeta1">
                    <div class="salud">
                        <div class="imagen2"><img src="img/saludPrecio2.png" alt=""></div>
                        <span class="texto2">Pruebas con 20% descuento</span>
                    </div>
                </div>
                <div class="tarjeta1">
                    <div class="salud">
                        <div class="imagen3"><img src="img/saludPrecio3.png" alt=""></div>
                        <span class="texto2">Conexión <br> Multiplataforma</span>
                    </div>
                </div>
              </div>
              <a href="contacto.php"><button class="duda">¿Tienes dudas?</button></a>
            </div>
        </div>

    </div>
    
    <?php
            include 'footer.php'
            ?>
</body>
</html>