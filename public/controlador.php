<?php

include("db_connection.php");

$usuario = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND contraseña = '$pass'";

$result = mysqli_query($conn, $sql);
$cont = mysqli_num_rows($result);

if ($cont == 1) {
    header("Location: admin.php");
} else {
    echo "<div>Usuario o contraseña incorrectos</div>";
}

?>