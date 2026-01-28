<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $medico_id = intval($_POST['medico_id']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $hora = $conn->real_escape_string($_POST['hora']);
    $motivo = $conn->real_escape_string($_POST['motivo']);

    $sql = "INSERT INTO citas (paciente_nombre, paciente_email, paciente_telefono, medico_id, fecha, hora, motivo, estado, fecha_registro)
            VALUES ('$nombre', '$email', '$telefono', $medico_id, '$fecha', '$hora', '$motivo', 'pendiente', NOW())";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "✅ Cita agendada exitosamente";
        header("Location: mis-citas.php?mensaje=" . urlencode($mensaje));
        exit;
    } else {
        $error = "❌ Error al agendar la cita: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Citas Médicas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="assets/css/stylesindex.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">🏥 Citas Médicas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="agendar-cita.php">Agendar Cita</a></li>
                <li class="nav-item"><a class="nav-link" href="mis-citas.php">Mis Citas</a></li>
                <li class="nav-item"><a class="nav-link" href="medicos.php">Médicos</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero text-white text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Tu salud, nuestra prioridad</h1>
        <p class="lead">Agenda citas médicas de forma rápida, segura y profesional</p>
        <a href="agendar-cita.php" class="btn btn-light btn-lg mt-3">Agendar Cita</a>
    </div>
</section>

<!-- ESPECIALIDADES -->
<section class="container my-5">
    <h2 class="text-center mb-4">Especialidades Médicas</h2>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-center h-100">
                <img src="assets/img/cardiologia.jpg" class="card-img-top" alt="Cardiología">
                <div class="card-body">
                    <h5 class="card-title">Cardiología</h5>
                    <p class="card-text">Cuidado integral del corazón.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center h-100">
                <img src="assets/img/pediatria.jpg" class="card-img-top" alt="Pediatría">
                <div class="card-body">
                    <h5 class="card-title">Pediatría</h5>
                    <p class="card-text">Atención médica infantil.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center h-100">
                <img src="assets/img/ginecologia.jpg" class="card-img-top" alt="Ginecología">
                <div class="card-body">
                    <h5 class="card-title">Ginecología</h5>
                    <p class="card-text">Salud integral de la mujer.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center h-100">
                <img src="assets/img/medicina-general.jpg" class="card-img-top" alt="Medicina General">
                <div class="card-body">
                    <h5 class="card-title">Medicina General</h5>
                    <p class="card-text">Consulta médica primaria.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MÉDICOS -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Nuestros Médicos</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="assets/img/doctor1.jpg" class="card-img-top" alt="Doctor">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Carlos López</h5>
                        <p class="card-text">Cardiólogo con más de 10 años de experiencia.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="assets/img/doctor2.jpg" class="card-img-top" alt="Doctor">
                    <div class="card-body">
                        <h5 class="card-title">Dra. Ana Martínez</h5>
                        <p class="card-text">Especialista en Pediatría.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100">
                    <img src="assets/img/doctor3.jpg" class="card-img-top" alt="Doctor">
                    <div class="card-body">
                        <h5 class="card-title">Dr. Luis Hernández</h5>
                        <p class="card-text">Médico General.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer bg-dark text-white pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Contacto</h5>
                <p>📍 Tegucigalpa, Honduras</p>
                <p>📞 +504 9999-9999</p>
                <p>✉ contacto@citasmedicas.com</p>
            </div>

            <div class="col-md-4">
                <h5>Enlaces</h5>
                <ul class="list-unstyled">
                    <li><a href="agendar-cita.php" class="footer-link">Agendar Cita</a></li>
                    <li><a href="mis-citas.php" class="footer-link">Mis Citas</a></li>
                    <li><a href="medicos.php" class="footer-link">Médicos</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5>Síguenos</h5>
                <p>Facebook | Instagram | WhatsApp</p>
            </div>
        </div>

        <hr class="border-light">
        <p class="text-center mb-0">&copy; 2026 Sistema de Citas Médicas</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



