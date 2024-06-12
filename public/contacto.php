<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos</title>
    <link rel="stylesheet" href="contacto.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="home.php"><img src="../imgs/logo.png" width="50px"></a>
        </div>
        <nav class="top-nav">
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="/login" class="nav-btn">Iniciar Sesión</a></li>
                <li><a href="productos.php" class="nav-btn2">Prueba Gratis</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contact-us">
            <div class="container">
                <h1>Contáctanos</h1>
                <div class="contact-content">
                    <div class="contact-form">
                        <h2>Envíanos un mensaje</h2>
                        <form action="home.php" method="post">
                            <label for="name">Nombre:</label>
                            <input type="text" id="name" name="name" required>

                            <label for="email">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required>

                            <label for="message">Mensaje:</label>
                            <textarea id="message" name="message" rows="5" required></textarea>

                            <button type="submit" class="contact-button">Enviar</button>
                        </form>
                    </div>
                    <div class="contact-info">
                        <h2>Información de Contacto</h2>
                        <p><strong>Dirección:</strong> Calle 123, Ciudad, País</p>
                        <p><strong>Teléfono:</strong> +123 456 7890</p>
                        <p><strong>Email:</strong> contacto@tuempresa.com</p>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0191437881547!2d-122.42193848434518!3d37.774929279759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858064e55f6e1f%3A0x7c8ffcfb8d16c369!2sCalle%20Falsa%20123%2C%20Ciudad%2C%20Pa%C3%ADs!5e0!3m2!1ses!2ses!4v1620281084055!5m2!1ses!2ses" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer">
            <p>2024 Carlos y Juan. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
