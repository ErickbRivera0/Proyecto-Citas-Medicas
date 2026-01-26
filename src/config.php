<?php
// Archivo de configuración principal
define('BASE_URL', 'http://localhost');
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'root123');
define('DB_NAME', getenv('DB_NAME') ?: 'citas_medicas');

// Crear conexión
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establecer charset
$conn->set_charset("utf8");

?>
