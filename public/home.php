<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Home</title>
    <link rel="stylesheet" href="index.css">
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

    <main>
        <?php
        $content = json_decode(file_get_contents('content.json'), true);
        ?>

        <section class="hero">
            <div class="hero-content">
                <h1><?php echo $content['hero']['title']; ?></h1>
                <p><?php echo $content['hero']['description']; ?></p>
                <a href="loging.php" class="cta-button"><?php echo $content['hero']['button']; ?></a>
            </div>
        </section>

        <section class="features">
            <h2><?php echo $content['features']['title']; ?></h2>
            <div class="container">
                <div class="feature-cards">
                    <?php foreach ($content['features']['cards'] as $card): ?>
                    <div class="card">
                        <img src="<?php echo $card['image']; ?>" width="400px" height="230px">
                        <h3><?php echo $card['title']; ?></h3>
                        <p><?php echo $card['description']; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="benefits">
            <div class="container">
                <div class="benefits-content">
                    <div class="text">
                        <h2><?php echo $content['benefits']['title']; ?></h2>
                        <p><?php echo $content['benefits']['description']; ?></p>
                        <ul>
                            <?php foreach ($content['benefits']['list'] as $item): ?>
                            <li><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="<?php echo $content['benefits']['image']; ?>" width="400">
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="container">
                <div class="cta-section-content">
                    <div class="cta-image">
                        <img src="<?php echo $content['cta']['image']; ?>" width="400px">
                    </div>
                    <div class="cta-text">
                        <h2><?php echo $content['cta']['title']; ?></h2>
                        <p><?php echo $content['cta']['description']; ?></p>
                        <a href="registro.php" class="cta-register-button"><?php echo $content['cta']['button']; ?></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-us">
            <div class="container">
                <div class="about-us-content">
                    <div class="text">
                        <h2><?php echo $content['about']['title']; ?></h2>
                        <p><?php echo $content['about']['description']; ?></p>
                        <ul>
                            <?php foreach ($content['about']['list'] as $item): ?>
                            <li><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="image">
                        <img src="<?php echo $content['about']['image']; ?>" width="400">
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
