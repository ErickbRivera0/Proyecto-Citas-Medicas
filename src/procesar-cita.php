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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Citas Médicas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar">
                <div class="logo">
                    <h1>🏥 Citas Médicas</h1>
                </div>
                <ul class="nav-menu">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="agendar-cita.php">Agendar Cita</a></li>
                    <li><a href="mis-citas.php">Mis Citas</a></li>
                    <li><a href="medicos.php">Médicos</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section class="resultado-section">
                <?php
                if (isset($mensaje)) {
                    echo "<div class='alert alert-success'>$mensaje</div>";
                }
                if (isset($error)) {
                    echo "<div class='alert alert-error'>$error</div>";
                }
                ?>
            </section>
        </main>

        <footer>
            <p>&copy; 2026 Sistema de Citas Médicas. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>

//sea serio compa

//tres tristes tigres
