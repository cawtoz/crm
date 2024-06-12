<?php
// Incluir archivo de conexión a la base de datos
include 'db_connection.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $plan = $_POST['plan'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encriptar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la sentencia SQL para insertar los datos
    $sql = "INSERT INTO pagos (plan, first_name, last_name, username, password) VALUES (?, ?, ?, ?, ?)";

    // Preparar y ejecutar la declaración
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $plan, $first_name, $last_name, $username, $hashed_password);

        if ($stmt->execute()) {
            // Redirigir a una página de éxito o mostrar un mensaje de éxito
            header("Location: home.php");
        } else {
            // Manejo de errores
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }

    // Cerrar la conexión
    $conn->close();
}
?>
