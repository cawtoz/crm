<?php
$host = 'localhost';
$dbname = 'crm_admin';
$username = 'root';
$password = '';

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
