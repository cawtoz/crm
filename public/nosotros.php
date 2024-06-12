<?php
// Ruta al archivo JSON
$jsonPath = 'nosotros.json';
$aboutUsData = json_decode(file_get_contents($jsonPath), true);

// Convertir las listas de cadenas a arrays para el formulario
$aboutUsData['lista_quienes_somos'] = explode(',', $aboutUsData['lista_quienes_somos']);
$aboutUsData['lista_ayuda_empresa'] = explode(',', $aboutUsData['lista_ayuda_empresa']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
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
                <li><a href="contacto.php">Contáctanos</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="/login" class="nav-btn">Iniciar Sesión</a></li>
                <li><a href="productos.php" class="nav-btn2">Prueba Gratis</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1><?php echo htmlspecialchars($aboutUsData['titulo_hero']); ?></h1>
                <p><?php echo htmlspecialchars($aboutUsData['descripcion_hero']); ?></p>
                <a href="singin.php" class="cta-button"><?php echo htmlspecialchars($aboutUsData['cta_hero']); ?></a>
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <div class="benefits-content">
                    <div class="text">
                        <h2><?php echo htmlspecialchars($aboutUsData['titulo_quienes_somos']); ?></h2>
                        <p><?php echo htmlspecialchars($aboutUsData['descripcion_quienes_somos']); ?></p>
                        <ul>
                            <?php foreach ($aboutUsData['lista_quienes_somos'] as $item): ?>
                            <li><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($aboutUsData['imagen_quienes_somos']); ?>" width="400">
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-section-content">
                    <div class="cta-image">
                        <img src="../imgs/hombrepregunta.png" width="400px">
                    </div>
                    <div class="cta-text">
                        <h2><?php echo htmlspecialchars($aboutUsData['titulo_cta']); ?></h2>
                        <p><?php echo htmlspecialchars($aboutUsData['descripcion_cta']); ?></p>
                        <a href="<?php echo htmlspecialchars($aboutUsData['link_cta']); ?>" class="cta-register-button">Regístrate Ahora</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <div class="benefits-content">
                    <div class="text">
                        <h2><?php echo htmlspecialchars($aboutUsData['titulo_ayuda_empresa']); ?></h2>
                        <p><?php echo htmlspecialchars($aboutUsData['descripcion_ayuda_empresa']); ?></p>
                        <ul>
                            <?php foreach ($aboutUsData['lista_ayuda_empresa'] as $item): ?>
                            <li><?php echo htmlspecialchars($item); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($aboutUsData['imagen_ayuda_empresa']); ?>" width="400">
                    </div>
                </div>
            </div>
        </section>

        <section class="features">
            <h2><?php echo htmlspecialchars($aboutUsData['titulo_crm']); ?></h2>
            <div class="container">
                <div class="feature-cards">
                    <?php foreach ($aboutUsData['cards_crm'] as $card): ?>
                    <div class="card">
                        <img src="<?php echo htmlspecialchars($card['imagen']); ?>" width="400px" height="230px">
                        <h3><?php echo htmlspecialchars($card['titulo']); ?></h3>
                        <p><?php echo htmlspecialchars($card['descripcion']); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer">
            <p><?php echo htmlspecialchars($aboutUsData['texto_footer']); ?></p>
        </div>
    </footer>
</body>
</html>
