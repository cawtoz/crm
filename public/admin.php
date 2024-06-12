<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Admin Panel</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="admin.php"><img src="../imgs/logo.png" width="50px"></a>
        </div>
        <nav class="top-nav">
            <ul>
                <li><a href="nosotros_admin.php">Nosotros</a></li>
                <li><a href="/management/dashboard">Salir</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        $content = json_decode(file_get_contents('content.json'), true);
        ?>

        <form action="save_changes.php" method="POST">
            <section class="hero">
                <div class="hero-content">
                    <h1><input type="text" name="hero_title" value="<?php echo $content['hero']['title']; ?>"></h1>
                    <p><textarea name="hero_description"><?php echo $content['hero']['description']; ?></textarea></p>
                    <input type="text" name="hero_button" value="<?php echo $content['hero']['button']; ?>">
                </div>
            </section>

            <section class="features">
                <h2><input type="text" name="features_title" value="<?php echo $content['features']['title']; ?>"></h2>
                <div class="container">
                    <div class="feature-cards">
                        <?php foreach ($content['features']['cards'] as $index => $card): ?>
                        <div class="card">
                            <input type="text" name="feature_image_<?php echo $index; ?>" value="<?php echo $card['image']; ?>">
                            <h3><input type="text" name="feature_title_<?php echo $index; ?>" value="<?php echo $card['title']; ?>"></h3>
                            <p><textarea name="feature_description_<?php echo $index; ?>"><?php echo $card['description']; ?></textarea></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="benefits">
                <div class="container">
                    <div class="benefits-content">
                        <div class="text">
                            <h2><input type="text" name="benefits_title" value="<?php echo $content['benefits']['title']; ?>"></h2>
                            <p><textarea name="benefits_description"><?php echo $content['benefits']['description']; ?></textarea></p>
                            <ul>
                                <?php foreach ($content['benefits']['list'] as $index => $item): ?>
                                <li><input type="text" name="benefits_list_<?php echo $index; ?>" value="<?php echo $item; ?>"></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="image">
                            <input type="text" name="benefits_image" value="<?php echo $content['benefits']['image']; ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section class="cta-section">
                <div class="container">
                    <div class="cta-section-content">
                        <div class="cta-image">
                            <input type="text" name="cta_image" value="<?php echo $content['cta']['image']; ?>">
                        </div>
                        <div class="cta-text">
                            <h2><input type="text" name="cta_title" value="<?php echo $content['cta']['title']; ?>"></h2>
                            <p><textarea name="cta_description"><?php echo $content['cta']['description']; ?></textarea></p>
                            <input type="text" name="cta_button" value="<?php echo $content['cta']['button']; ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-us">
                <div class="container">
                    <div class="about-us-content">
                        <div class="text">
                            <h2><input type="text" name="about_title" value="<?php echo $content['about']['title']; ?>"></h2>
                            <p><textarea name="about_description"><?php echo $content['about']['description']; ?></textarea></p>
                            <ul>
                                <?php foreach ($content['about']['list'] as $index => $item): ?>
                                <li><input type="text" name="about_list_<?php echo $index; ?>" value="<?php echo $item; ?>"></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="image">
                            <input type="text" name="about_image" value="<?php echo $content['about']['image']; ?>">
                        </div>
                    </div>
                </div>
            </section>

            <button type="submit">Guardar Cambios</button>
        </form>
    </main>

    <footer>
        <div class="footer">
            <p>2024 Carlos y Juan. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
