<?php

session_start();

if (isset($_SESSION['NombreCompleto'])) {
    $user = $_SESSION['NombreCompleto'];
} else {
    $user = 'Invitado'; // Valor por defecto si no hay sesión iniciada
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="/image/logo_tayloy.jpg">
  <link rel="stylesheet" href="style.index.css">
  <title>TaiLoy.com.pe</title>
</head>

<body>
  <header>
    <div class="container-hero">
      <div class="menu-overlay"></div>
        <div class="container hero">
          <div class="customer-support">
            <i class="fa-solid fa-headset"></i>
          <div class="content-customer-support">
            <span class="text">Soporte al cliente</span>
            <span class="number">778-87421</span>
          </div>
        </div>
      </div>
    <div class="container hero">
      <div class="container-logo">
      <a href="index.php">
        <img src="image/logo_tayloy.jpg" alt="Logo TaiLoy" width="70">
      </a>
      <h1 class="logo"><a href="/">TaiLoy.com.pe</a></h1>
    </div>
  </div>
  <div class="container hero">
    <div class="container-user">
      <a href="Carga2.html">
        <i class="fa-solid fa-user"></i>
      </a>
      <!--Nombre de inicio de sesion-->
      <a href="carrito.php"><?php echo $user; ?></a>
      <a href="carrito.php"><i class="fa-solid fa-basket-shopping"></i></a>
      <div class="content-shopping-cart">
        <span class="text">Carrito</span>
        <span class="number"></span>
      </div>
    </div>
  </div>
</div>

    <!--roberto-->
    
    <div class="menu container">
        <nav class="navbar">
            <input type="checkbox" id="menu">
            <label for="menu"><img src="image/menu.png" class="menu-icono" alt="Menú"></label>
            <ul>
                <li><a href="Carga2.html">Iniciar Sesión</a></li>
                <li><a href="CargaR.html">Registrarse</a></li>
                <li><a href="carrito.php#lista-5">Dibujo</a></li>
                <li><a href="carrito.php#lista-8">Pintura</a></li>
                <li><a href="carrito.php#lista-9">Útiles</a></li>
                <li><a href="carrito.php##lista-4">Cuadernos</a></li>
                <li><a href="carrito.php#lista-6">Libros</a></li>
                <li><a href="carrito.php#lista-7">Mochilas</a></li>
                <li><a href="carrito.php#lista-7">Cartucheras</a></li>
                <li><a href="carrito.php#lista-7">Loncheras</a></li>
            </ul>
        </nav>
    </div>
    
    
    <!--roberto-->
  </header>
  <main>
    <br>
    <center>
  <div class="video-container">
    <div class="video-item">
      <video id="video" autoplay muted loop>
        <source src="video/TAI LOY (Perú 2022).mp4" type="video/mp4">
        Tu navegador no soporta video HTML5.
      </video>
      <div class="background"></div>
    </div>
  </div>
</center>


  <script>
  document.addEventListener('DOMContentLoaded', function () {
  var video = document.getElementById('video');

  // Deshabilitar controles de video
  video.controls = false;

  // Evento para reiniciar el video cuando termina
  video.onended = function() {
    this.currentTime = 0;
    this.play();
  };
});
  </script>
    <br>
    <h2 class="subtitulo">
      Dibujo
    </h2>

    <hr class="barra">
    <div class="contenedorIMG">
      <div class="images">
        <a href="carrito.php#lista-5">
          <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/e/s/estuche-de-marcadores-3m-8un-basico-posca-47986-default-1.jpg" alt="jueguete1">
          <div class="texto">MARCADORES POSCA PC-3M BÁSICO ESTUCHE X 8 UND</div>
        </a>
      </div>
      <div class="images">
        <a href="carrito.php#lista-5">
          <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/a/marcador-doble-punta-acuarelables-x-36-staedtler-48163-default-1.jpg" alt="jueguete2">
          <div class="texto">MARCADORES ACUARELABLES STAEDTLER DOBLE PUNTA X 36 UND</div>
        </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-5">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/color-x-24-goldfaber-estuche-cart-faber-castell-48232-default-1.jpg" alt="jueguete3">
        <div class="texto">COLOR FABER CASTELL GOLDFABER ESTUCHE X 24 UND</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-5">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-mix-me-a3-20h-200g-graduate-canson-46644-default-1.jpg" alt="jueguete4">
        <div class="texto">BLOCK CANSON A3 GRADUATE MIX MEDIA 200 GR 20 HOJAS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-5">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-marcadores-pitt-artpen-x6-tonos-piel-claros-15221-default-1.jpg" alt="jueguete5">
        <div class="texto">MARCADORES FABER CASTELL PITT ARTPEN TONOS PIEL CLARO SET X 6 UND</div>
      </a>
      </div>
    </div>
    <div class="carousel-container">
      <div class="carousel">
        <div class="carousel-inner">
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-1.png" alt="Image 1">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-2.png" alt="Image 2">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-3.png" alt="Image 3">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-4.png" alt="Image 4">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-5.png" alt="Image 5">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-6.png" alt="Image 6">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-7.png" alt="Image 7">
            </a>
          </div>
          <div class="carousel-item">
            <a href="carrito.php#lista-5">
            <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/carrusel-8.png" alt="Image 8">
            </a>
          </div>

          <!-- Añadir más imágenes aquí si es necesario -->
        </div>
        <button class="carousel-prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="carousel-next" onclick="changeSlide(1)">&#10095;</button>
      </div>
      
      <!-- Slide Container -->
      <div class="slide">
        <div class="slide-container">
          <div class="slides">
            <a href="carrito.php#lista-5">
              <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/Carrusel-fijo-1.png" width="445" height="300" class="active">
            </a>
            <a href="carrito.php#lista-5">
              <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/Carrusel-fijo-2.png" width="445" height="300">
            </a>
            <a href="carrito.php#lista-5">
              <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/Carrusel-fijo-3.png" width="445" height="300">
            </a>
          </div>
        </div>
      
        <div class="buttons">
          <span class="next">&#10095;</span>
          <span class="prev">&#10094;</span>
        </div>
      
        <div class="dotsContainer">
          <div class="dot active" attr="0" onclick="switchImage(this)"></div>
          <div class="dot" attr="1" onclick="switchImage(this)"></div>
          <div class="dot" attr="2" onclick="switchImage(this)"></div>
        </div>
      </div>
      
    </div>
    <script src="Slides.js"></script>
    
    

    <br>
    <br>

    <h2 class="subtitulo">Pintura</h2>

    <hr class="barra">
    <div class="contenedorIMG">
      <div class="images">
      <a href="carrito.php#lista-8">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-x-24-godet-studio-set-wn-25342-default-1.jpg" alt="jueguete1">
        <div class="texto">SET WINSOR & NEWTON GODET STUDIO X 24</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-8">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-figueras-24x33-cm-10h-290g-17529-default-1.jpg" alt="jueguete2">
        <div class="texto">BLOCK CANSON FIGUERAS 24 X 33 CM 290 GR 10 HOJAS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-8">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-marcadorx5-metalico-staedtler-42903-default-1.jpg" alt="jueguete3">
        <div class="texto">MARCADOR STAEDTLER METÁLICO SET X 5 UND</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-8">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/a/c/acrilico-100ml-27-amarillo-ocre-15572022-default-1.jpg" alt="jueguete4">
        <div class="texto">ACRÍLICO PEBEO 27 AMARILLO OCRE 100 ML</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-8">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/s/e/set-acuarela-12-medio-godet-redond-pebeo-3931-default-1.jpg" alt="jueguete5">
        <div class="texto">SET ACUARELA PEBEO 12 MEDIO GODET REDONDO</div>
      </a>
      </div>
    </div>
    <div class="banner-contenedor">
      <a href="carrito.php#lista-8">
        <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/cintillo-partido-caballete.png">
        <div class="texto"></div>
      </a>
    </div>
    
    <br>

    <h2 class="subtitulo">Utiles</h2>

    <hr class="barra">

    <div class="contenedorIMG">
      <div class="images">
      <a href="carrito.php#lista-9">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/l/plumon-vinifan-420-best-color-x-12-36800-default-1.jpg" alt="jueguete1">
        <div class="texto">PLUMÓN INDELEBLE VINIFAN BEST COLOR 420 X 12 UND</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-9">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/e/tempera-ove-morado-250-ml-28020011-default-1.jpg" alt="jueguete2">
        <div class="texto">TÉMPERA OVE MORADO 250 ML</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-9">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/o/colores-ove-bicolor-x-12-und-32593-default-1.jpg" alt="jueguete3">
        <div class="texto">COLORES OVE BICOLOR X 12 UND</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-9">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/i/tiza-crayola-jumbo-lavablecax48-72238-default-1.jpg" alt="jueguete4">
        <div class="texto">TIZAS CRAYOLA JUMBO LAVABLE CAJA X 48 UND</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-9">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/r/o/rotulador-stabilo-extrafino-88-estuche-rigido-x-20-unidades-42794-default-1.jpg" alt="jueguete5">
        <div class="texto">ROTULADOR STABILO EXTRAFINO 88 ESTUCHE RÍGIDO X 20 UND</div>
      </a>
      </div>
    </div>
    

    <br>

    <br>

    <h2 class="subtitulo">Cuadernos y blocks</h2>

    <hr class="barra">

    <div class="contenedorIMG">
      <div class="images">
      <a href="carrito.php#lista-4">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-anillado-cuadriculado-minerva-a5-diseno-mujer-150-hojas-33819-default-1.jpg" alt="jueguete1">
        <div class="texto">CUADERNO ANILLADO CUADRICULADO MINERVA A5 DISEÑO MUJER 150 HOJAS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-4">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuaderno-anillado-cuadriculado-iris-color-a4-diseno-con-liga-170-hojas-8383-default-1.jpg" alt="jueguete2">
        <div class="texto">CUADERNO ANILLADO CUADRICULADO IRIS COLOR A4 DISEÑO CON LIGA 170 HOJAS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-4">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-bitacora-a3-90-hojas-90gr-anillado-5000058-default-1.jpg" alt="jueguete3">
        <div class="texto">BLOCK BITÁCORA ANILLADO OXFORD A3 90 G 90 HOJAS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-4">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/l/block-papel-lustre-a3-30h-dragon-17c-5000114-default-1.jpg" alt="jueguete4">
        <div class="texto">BLOCK DRAGON A3 PAPEL LUSTRE 30 HOJAS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-4">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuad-dlx-80h-treng-sol-mag-kids-miner-az-66738002-default-1.jpg" alt="jueguete5">
        <div class="texto">CUADERNO LORO CUADRICULADO COLOR AZUL</div>
      </a>
      </div>
    </div>
    <div class="banner-contenedor">
      <a href="carrito.php#lista-4">
        <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/arte/cintillo-partido-blocks.png">
        <div class="texto"></div>
      </a>
    </div>
    <br>
    <br>
    
    
    <h2 class="subtitulo">Libros</h2>

    <hr class="barra">

    <div class="contenedorIMG">
      <div class="images">
      <a href="carrito.php#lista-6">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/i/libro-de-actividades-aprietame-en-el-zoo-25635-default-1.jpg" alt="jueguete1">
        <div class="texto">LIBRO DE ACTIVIDADES APRIÉTAME EN EL ZOOLÓGICO</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-6">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/c/u/cuentos-peruanos-titulos-surtidos-didactica-10290-default-1.jpg" alt="jueguete2">
        <div class="texto">CUENTOS PERUANOS TÍTULOS SURTIDOS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-6">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/p/i/pinta-y-lee-unicornios-37004002-default-1.jpg" alt="jueguete3">
        <div class="texto">LIBRO DE ACTIVIDADES PINTA Y LEE UNICORNIOS</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-6">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/u/n/uno-siempre-cambia-al-amor-de-su-vida-68949-default-1.jpg" alt="jueguete4">
        <div class="texto">UNO SIEMPRE CAMBIA AL AMOR DE SU VIDA AMALIA ANDRADE</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-6">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/v/o/volver-a-empezar-colleen-hoover-68906-default-1.jpg" alt="jueguete5">
        <div class="texto">CUADERNO DELUXE TRIPLE RENGLÓN MINERVA </div>
      </a>
      </div>
    </div>
    <div class="banner-contenedor">
      <a href="carrito.php#lista-6">
        <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/lectura/cintillo-partido-2.png">
      </a>
    </div>
   
    <br>

    <h2 class="subtitulo">Mochilas, Cartucheras y loncheras</h2>

    <hr class="barra">
    <div class="contenedorIMG">
      <div class="images">
      <a href="carrito.php#lista-7">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/o/botella-policarbonato-450ml-jojo-siwa-35727-default-1.jpg" alt="jueguete1">
        <div class="texto">BOTELLA CHILDRENS CLUB JOJO SIWA 450 ML</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-7">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/m/a/maleta-paw-patrol-eva-3d-2020-scool-43727-default-1.jpg" alt="jueguete2">
        <div class="texto">MALETA ANTHAIX SCOOL PAW PATROL 3D</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-7">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/t/a/taper-cdrd-590ml-paw-patrol-m-20-scool-44552-default-1.jpg" alt="jueguete3">
        <div class="texto">TÁPER ANTHAIX CUADRADO PAW PATROL GIRL 590 ML</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-7">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/b/o/botella-cuadrada-500-ml-frozen-2-titanio-44934-default-1.jpg" alt="jueguete4">
        <div class="texto">BOTELLA CUADRADA TITANIO FROZEN 500 ML</div>
      </a>
      </div>
      <div class="images">
      <a href="carrito.php#lista-7">
        <img src="https://production-tailoy-repo-magento-statics.s3.amazonaws.com/imagenes/872x872/productos/i/l/o/lonch-ctaper-nutribox-little-pony-artes-16173027-default-1.jpg" alt="jueguete5">
        <div class="texto">LONCHERA ARTESCO NUTRI BOX LITTLE PONY</div>
      </a>
      </div>
    </div>
  <div class="promo">
    <div class="banner-contenedor2">
      <a href="carrito.php#lista-7">
        <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/m%C3%A1s+promociones/promociones-3.png">
      </a>
    </div>
    <div class="banner-contenedor2">
      <a href="carrito.php#lista-7">
        <img src="https://dj2ea42ad4rel.cloudfront.net/peru/2024/05/27+05/m%C3%A1s+promociones/promociones-5.png">
      </a>
    </div>
  </div>
  </main>
  <script src="https://kit.fontawesome.com/bdafbd8a2b.js" crossorigin="anonymous"></script>
  <script src="Slides.js">
  </script>

</body>

<footer class="footer container">
  <div class="link">
    <h3>Acerca de Tai Loy</h3>
    <ul>
      <li><a href="Nosotros.html">Nuestra misión y visión</a></li>
      <li><a href="Nosotros.html">Nuestras tiendas</a></li>
      <li><a href="Nosotros.html">Nosotros</a></li>
    </ul>
  </div>

  <div class="link">
    <h3>Libro de reclamaciones</h3>
    <ul>
      <li><a href="Nosotros.html">Respaldo de equipo legal</a></li>
      <li><a href="Nosotros.html">Terminos y condiciones</a></li>
      <li><a href="Nosotros.html">Politica de privacidad</a></li>
      <li><a href="Nosotros.html">Tratamiento de datos</a></li>
    </ul>
  </div>

  <div class="link">
    <h3>Servicio al cliente</h3>
    <ul>
      <li><a href="#">Contactanos</a></li>
      <li><a href="#">Comprobantes</a></li>
      <li><a href="#">Politica de privacidad</a></li>
      <li><a href="#">Cambios y devoluciones</a></li>
    </ul>
  </div>

  <div class="link">
    <h3>Proovedor</h3>
    <ul>
      <li><a href="#">Portal</a></li>
      <li><a href="#">Proovedores</a></li>
      <li><a href="#">Contratos</a></li>
      <li><a href="#">Declaracion legal</a></li>
    </ul>
  </div>

</footer>

</html>