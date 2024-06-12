<?php
// Incluir archivo de conexión a la base de datos
include 'db_connection.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Preparar la sentencia SQL para insertar los datos
    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES (?, ?, ?)";

    // Preparar y ejecutar la declaración
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $name, $email, $message);
        
        if ($stmt->execute()) {
            // Redirigir a una página de agradecimiento o mostrar un mensaje de éxito
            header("Location: contacto.php?success=1");
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
