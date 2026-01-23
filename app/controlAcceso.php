<?php
// Usamos __DIR__ para asegurar que PHP encuentre el archivo AccesoDatos.php
// Como enviar_consulta.php está en /app/ y AccesoDatos está en /app/dat/
require_once __DIR__ . '/../dat/AccesoDatos.php';

// Capturamos los datos del formulario que vienen por POST
$email    = $_POST['email'] ?? '';
$nombre   = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$grados   = $_POST['grados'] ?? '';

if (!empty($email) && !empty($nombre)) {
    try {
        $db = AccesoDatos::getModelo();
        $conn = $db->getConexion(); // Obtiene la conexión PDO

        $sql = "INSERT INTO USUARIOS (EMAIL, NOMBRE, APELLIDO, TELEFONO, GRADOS, CLAVE) 
                VALUES (:email, :nombre, :apellido, :telefono, :grados, :clave)";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':email'    => $email,
            ':nombre'   => $nombre,
            ':apellido' => $apellido,
            ':telefono' => $telefono,
            ':grados'   => $grados,
            ':clave'    => password_hash('1234', PASSWORD_DEFAULT) // Se guarda cifrada
        ]);

        // Redirigir al index (subimos un nivel con ../ porque estamos en /app/)
header("Location: ../index.php?registro=ok");        exit();

    } catch (PDOException $e) {
        // Si hay un error (ej: email duplicado), lo mostramos
        die("Error al guardar los datos: " . $e->getMessage());
    }
} else {
    echo "Por favor, rellena los campos obligatorios.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Camino Profesional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../web/style.css">
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
                        <li><a href="#">BIG DATA</a></li>
                        <li><a href="#">INTELIGENCIA ARTIFICIAL</a></li>
                    </ul>
                </li>
                </ul>
        </nav>

        <div class="actions">
            <div class="search-box">
                <input type="text" placeholder="Buscar">
                <span class="search-icon">🔍</span>
            </div>
            <button class="cta-button">Infórmate</button>
        </div>
    </div>
</header>
<?php if ($mensaje): ?>
<div class="textosencillo">
    <section class="estilo">
        <h1>¡Solicitud enviada!</h1>
        <p><?= $mensaje ?></p>
    </section>
</div>
<?php endif; ?>
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
          <li><a href="#">Ciberseguridad</a></li>
          <li><a href="#">Big Data</a></li>
          <li><a href="#">Inteligencia Artificial</a></li>
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
