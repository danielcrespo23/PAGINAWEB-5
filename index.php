<?php
session_start();

// 1. IMPORTAR BASE DE DATOS
// Ajusta la ruta si es necesario. Si index.php está en la raíz:
include_once __DIR__ . '/dat/AccesoDatos.php';
// 2. TIMEOUT 10 MINUTOS (Solo se aplica si hay una sesión activa)
$inactividad = 600; 
if (isset($_SESSION['usuario']) && isset($_SESSION['ultimo_acceso'])) {
    $vida_session = time() - $_SESSION['ultimo_acceso'];
    if ($vida_session > $inactividad) {
        session_unset();
        session_destroy();
        header("Location: login.php?mensaje=expirado");
        exit();
    }
    $_SESSION['ultimo_acceso'] = time(); // Actualizamos el acceso si está logueado
}

// 3. DETERMINAR ROL (Sin expulsar a nadie)
// Si no hay sesión, $esAdmin será falso y $usuarioLogueado será null, permitiendo ver la web.
$esAdmin = (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'ADMIN');
$usuarioLogueado = (isset($_SESSION['usuario']) && !$esAdmin) ? $_SESSION['usuario'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="web/style.css">
  <title>Camino Profesional </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="icon" type="image/x-icon" href="web/2.ico">
</head>

<body>
  <header class="cp-header">
    <div class="top-bar">
        <nav class="top-nav">
            <a href="#">Sobre CP</a>
        </nav>
        <div class="insti-access">
            <a href="#">Acceso a Institutos</a>
        </div>
    </div>

<div class="main-bar">
        <div class="logo">CAMINOPROFESIONAL</div> 
        
        <nav class="main-nav">
            <ul>
                <li class="dropdown">
                    <a href="#">Formación Profesional ▼</a>
                    <ul class="dropdown-content">
                        <li><a href="daw.html">DAW</a></li>
                        <li><a href="asir.html">ASIR</a></li>
                        <li><a href="dam.html">DAM</a></li>
                        <li><a href="smr.html">SMR</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Especializaciones ▼</a>
                    <ul class="dropdown-content">
                        <li><a href="ciberseguridad.html">CIBERSEGURIDAD</a></li>
                        <li><a href="bigdata.html">BIG DATA</a></li>
                        <li><a href="ia.html">INTELIGENCIA ARTIFICIAL</a></li>
                    </ul>
                </li>
                <li style="padding: 10px; color: #333; font-weight: bold;">
                    Hola, <?php echo $esAdmin ? 'Administrador' : ($usuarioLogueado ? $usuarioLogueado->NOMBRE : 'Invitado'); ?>
                </li>
            </ul>
        </nav>

        <div class="actions">
            <div class="search-box">
                <?php if ($esAdmin || $usuarioLogueado): ?>
                    <a href="app/logout.php" style="color:red;">Cerrar Sesión</a>
                <?php else: ?>
                    <a href="login.php" style="color:blue; font-weight:bold;">Área Privada</a>
                <?php endif; ?>
            </div>
            <button class="cta-button" onclick="location.href='#puestostrabajoyformulario';">
                Infórmate
            </button>
        </div>
    </div>
</header>
  
  <article>
    <div class="elementosprincipales">
      <section class="hero">
        <video autoplay muted loop playsinline class="video-fondo">
          <source src="web/videosPaginas/videoprogramando.mp4" type="video/mp4">
          Tu navegador no soporta el video.
        </video>
        <div class="hero-content">
          <h1>Tu camino profesional en la informática empieza aquí</h1>
          <p>
            Descubre las principales titulaciones de Formación Profesional en informática:
            <strong>DAW, DAM y ASIR</strong>. Conoce las especialidades con mayor demanda laboral, las competencias más valoradas por las empresas tecnológicas y las oportunidades que ofrece el mundo de la <strong>programación, la ciberseguridad y la inteligencia artificial</strong>.<br><br>
            Prepárate para destacar y construir una carrera sólida junto a los referentes del sector digital.
          </p>
          <a href="#puestostrabajoyformulario" class="btn-hero">Explorar especialidades y salidas laborales</a>
        </div>
      </section>
<div class="contenido-dinamico" style="padding: 20px; max-width: 1200px; margin: auto;">
    <?php if ($esAdmin): ?>
        <h2 style="color:white;">Panel de Administración: Usuarios Registrados</h2>
        <table border="1" style="width:100%; background: white; color: black; border-collapse: collapse;">
            <tr style="background: #333; color: white;">
                <th>Nombre</th><th>Email</th><th>Grado</th>
            </tr>
            <?php
            $db = AccesoDatos::getModelo();
            $lista = $db->getTodosLosUsuarios(); 
            foreach ($lista as $u): ?>
                <tr>
                    <td><?php echo $u->NOMBRE; ?></td>
                    <td><?php echo $u->EMAIL; ?></td>
                    <td><?php echo $u->GRADOS; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php elseif ($usuarioLogueado): ?>
        <div style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 10px; color: white;">
            <h2>Hola <?php echo $usuarioLogueado->NOMBRE; ?></h2>
            <p>Gracias por registrarte. Pronto te contactaremos.</p>
        </div>
    <?php endif; ?>
    
    </div>
      </div>
   <section class="englobado"> ```
      <br>
   <section class="englobado">
  <div class="grados-titulo">
    <h1>Grados de informática y especialidades destacados:</h1>
  </div>
  <!-- 8 imágenes de los grados -->
<div class="grados-caja">
  <div class="gradosimg">
    <div class="grado">
      <a href="asir.html">
        <img src="web/imagenesgrados/empleadoredes.webp" alt="ASIR">
        <span class="grado-texto">ASIR</span>
      </a>
    </div>
    <div class="grado">
      <a href="daw.html">
        <img src="web/imagenesgrados/programacion.jpg" alt="DAW">
        <span class="grado-texto">DAW</span>
      </a>
    </div>
    <div class="grado">
      <a href="dam.html">
        <img src="web/imagenesgrados/DAM.jpeg" alt="DAM">
        <span class="grado-texto">DAM</span>
      </a>
    </div>
    <div class="grado">
      <a href="smr.html">
        <img src="web/imagenesgrados/SMR.webp" alt="SMR">
        <span class="grado-texto">SMR</span>
      </a>
    </div>
  </div>
    <div class="gradosimg">
      <div class="grado">
        <a href="bigdata.html">
        <img src="web/imagenesgrados/ANALISTAS.webp" alt="BIG DATA">
        <span class="grado-texto">BIG DATA</span>
        </a>
      </div>
      <div class="grado">
        <img src="web/imagenesgrados/DISEÑO.jpg" alt="DISEÑO GRAFICO">
        <span class="grado-texto">DISEÑO GRAFICO</span>
      </div>
      <div class="grado">
        <a href="ia.html">
        <img src="web/imagenesgrados/informatico.jpg" alt="IA">
        <span class="grado-texto">IA</span>
        </a>
      </div>
      <div class="grado">
        <a href="ciberseguridad.html">
        <img src="web/imagenesgrados/CIBER.jpg" alt="CIBERSEGURIDAD">
        <span class="grado-texto">CIBERSEGURIDAD</span>
      </a>
      </div>
    </div>
  </div>
</section>
      <div class="puestostrabajoyformulario" id="puestostrabajoyformulario">
        <section class="trabajos">
          <h1>Puestos de trabajo con mayor crecimiento laboral:</h1>
          <h2>Big Data y análisis de datos</h2>
          <p>La información que las empresas tienen de sus clientes y sus procesos es, sin lugar a duda, muy valiosa para poder mejorar sus procesos y su rentabilidad. Normalmente, esta información está distribuida en diversas bases de datos o incluso de forma no estructurada, lo que dificulta el cruce de esta y la búsqueda de correlaciones entre las diferentes fuentes de datos. El analista de datos es la persona que se va a encargar de centralizar toda esa información y organizarla de forma que pueda ser explotada para aportar valor a la empresa. Cada vez más las empresas recurren a este tipo de perfiles y crean departamentos específicos de minería de datos.</p>
          <h2>Tecnico en redes</h2>
          <p>El técnico de microinformática y redes es aquel que se responsabiliza del correcto funcionamiento de los equipos de los usuarios y usuarias, ya sea instalando y configurando los equipos, o bien resolviendo las incidencias que puedan surgir. Pensemos en la importancia de este personal, ya que, dado que todas las empresas están informatizadas, si no hay una plantilla capaz de resolver problemas a nivel informático, la empresa puede llegar al colapso.</p>
          <h2>Ingeniero de Software / Desarrollador</h2>
          <p>La rama de la programación siempre ha contado con excelentes salidas laborales. El programador es aquel profesional que desarrolla código para la ejecución de aplicaciones de diversa naturaleza que permiten el uso de equipos informáticos o tecnológicos. La programación abarca dentro de ella misma diferentes áreas de actuación, ya que cada vez el perfil del programador se especializa más. Tenemos programadores de front-end, programadores de back-end, programadores de aplicaciones móviles, programadores de aplicaciones multiplataformas… Especializarte en formaciones como el Grado Superior en Desarrollo de Aplicaciones Web o el Grado Superior en Desarrollo de Aplicaciones Multiplataforma te dotará de un perfil profesional muy atractivo, con condiciones de trabajo muy ventajosas.</p>
          <h2>Tecnico ciberseguridad</h2>
          <p>Desgraciadamente, la ciberseguridad está últimamente muy de moda por el gran volumen de ataques que día a día sufren las empresas, lo cual hace necesario que se doten de profesionales capaces de gestionar toda la seguridad de esta. Estos expertos deben ser capaces de definir planes de seguridad que garanticen la mínima exposición al riesgo sufrir un ataque cibernético. Es un perfil relativamente nuevo y hay pocos profesionales formados si lo comparamos con las necesidades que presentan las empresas en este ámbito. Sin duda es una de las especialidades de informática con más salida laboral.</p>
        </section>
        <section class="formulario">
          <h2>Contáctanos para más información</h2>
          <form action="app/controlAcceso.php" method="POST">
          <form action="app/controlAcceso.php" method="POST">
            <label>Correo electrónico:</label>
            <input id = "correo" type="email" name="email" placeholder="Correo Electrónico" required>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" required> 
            <label>Apellido:</label>
            <input type="text" name="apellido" placeholder="Apellidos" required>
            <label>Número de teléfono:</label>
            <input type="number" name="telefono">
            <select name="grados">
    <option value="">Obtener información del siguiente grado:</option>
    <option value="DAW">DAW</option>
    <option value="DAM">DAM</option>
    <option value="ASIR">ASIR</option>
    <option value="SMR">SMR</option>
</select> <input type="submit" value="Enviar" id="botonenviar">
          </form>
        </section>
      </div>
    </div>
    <div class="empresas">
      <div class="empresastitulo">
        <h1>Descubre las mejores empresas del sector:</h1>
      </div>
     <div class="carrusel" id="carrusel">
  <div class="elemento">
    <img src="web/imagenesempresas/APPLE.webp" alt="ASIR">
    <span class="empresa-texto">APPLE</span>
  </div>
      <div class="elemento">
        <img src="web/imagenesempresas/nvidia.jpg" alt="ASIR">
        <span class="empresa-texto">NVIDIA</span>
      </div>
      <div class="elemento">
        <img src="web/imagenesempresas/KPMG.jpg" alt="ASIR">
        <span class="empresa-texto">KPMG</span>
      </div>
      <div class="elemento">
        <img src="web/imagenesempresas/MICROSOFT.jpg" alt="ASIR">
        <span class="empresa-texto">MICROSOFT</span>
      </div>
      <div class="elemento">
        <img src="web/imagenesempresas/TELEFONICA.jpg" alt="ASIR">
        <span class="empresa-texto">TELEFONICA</span>
      </div>
      <div class="elemento">
        <img src="web/imagenesempresas/OPENAI.webp" alt="ASIR">
        <span class="empresa-texto">OPEN AI</span>
      </div>
      <div class="elemento">
        <img src="web/imagenesempresas/AMAZON.webp" alt="ASIR">
        <span class="empresa-texto">AMAZON</span>
      </div>
     </div>
    </div>
  </article>
  <script>
  const carrusel = document.getElementById('carrusel');
  let velocidad = 1; // pixeles por intervalo
  let direccion = 1; // 1 = derecha, -1 = izquierda

  function moverCarrusel() {
    // Si llega al final, cambia de dirección
    if (carrusel.scrollLeft + carrusel.clientWidth >= carrusel.scrollWidth) direccion = -1;
    if (carrusel.scrollLeft <= 0) direccion = 1; 

    carrusel.scrollLeft += velocidad * direccion;
  }

  setInterval(moverCarrusel, 20); // cada 20ms se mueve
</script>
 <footer class="footer">
  <div class="footer-container">
    <div class="footer-logo">
      <a>Camino Profesional</a>
      <img src="#" alt="" class="footer-img">
      <p>Formación Profesional en Informática — Construye tu futuro en programación, ciberseguridad e inteligencia artificial.</p>
    </div>

    <div class="footer-links">
      <div class="footer-column">
        <h4>Formaciones</h4>
        <ul>
          <li><a href="asir.html">ASIR - Administración de Sistemas</a></li>
          <li><a href="daw.html">DAW - Aplicaciones Web</a></li>
          <li><a href="dam.html">DAM - Aplicaciones Multiplataforma</a></li>
          <li><a href="smr.html">SMR - Microinformática y Redes</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Especialidades</h4>
        <ul>
          <li><a href="ciberseguridad.html">Ciberseguridad</a></li>
          <li><a href="bigdata.html">Big Data</a></li>
          <li><a href="ia.html">Inteligencia Artificial</a></li>
          <li><a href="#">Diseño Gráfico</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Contacto</h4>
        <ul>
          <li>Email: <a href="mailto:caminoprofesional@ies.com">caminoprofesional@ies.com</a></li>
          <li>Tel: +34 623 456 789</li>
          <li>Dirección: Tres Cantos, Madrid</li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Síguenos</h4>
        <div class="social-icons">
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Camino Profesional · Todos los derechos reservados</p>
  </div>
</footer>
</body>
</html>