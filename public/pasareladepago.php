<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Home</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="pasareladepago.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="home.php"><img src="../imgs/logo.png" width="50px"></a>
        </div>
        <nav class="top-nav">
            <ul>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contáctanos</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="/login" class="nav-btn">Iniciar Sesión</a></li>
                <li><a href="productos.php" class="nav-btn2">Prueba Gratis</a></li>
            </ul>
        </nav>
    </header>

    <section class="payment-gateway">
        <div class="container">
            <h2>Realiza tu pago</h2>
            <form action="home.php" method="post">
                <div class="form-group">
                    <label for="plan">Plan Seleccionado:</label>
                    <select id="plan" name="plan" required>
                        <option value="prueba-gratis">Prueba Gratis</option>
                        <option value="plan-premium">Plan Premium</option>
                        <option value="plan-estandar">Plan Estándar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="first-name">Nombre:</label>
                    <input type="text" id="first-name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Apellido:</label>
                    <input type="text" id="last-name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-button">Pagar Ahora</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="footer">
            <p>2024 Carlos y Juan. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
