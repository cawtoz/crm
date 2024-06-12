<?php
$jsonPath = 'nosotros.json';

// Cargar el archivo JSON
$aboutUsData = json_decode(file_get_contents($jsonPath), true);

// Convertir listas a arrays
$aboutUsData['lista_quienes_somos'] = explode(',', $aboutUsData['lista_quienes_somos']);
$aboutUsData['lista_ayuda_empresa'] = explode(',', $aboutUsData['lista_ayuda_empresa']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y recoger datos del formulario
    $aboutUsData['titulo_hero'] = $_POST['titulo_hero'];
    $aboutUsData['descripcion_hero'] = $_POST['descripcion_hero'];
    $aboutUsData['cta_hero'] = $_POST['cta_hero'];
    $aboutUsData['titulo_quienes_somos'] = $_POST['titulo_quienes_somos'];
    $aboutUsData['descripcion_quienes_somos'] = $_POST['descripcion_quienes_somos'];
    $aboutUsData['lista_quienes_somos'] = implode(",", $_POST['lista_quienes_somos']);
    $aboutUsData['imagen_quienes_somos'] = $_POST['imagen_quienes_somos'];
    $aboutUsData['titulo_ayuda_empresa'] = $_POST['titulo_ayuda_empresa'];
    $aboutUsData['descripcion_ayuda_empresa'] = $_POST['descripcion_ayuda_empresa'];
    $aboutUsData['lista_ayuda_empresa'] = implode(",", $_POST['lista_ayuda_empresa']);
    $aboutUsData['imagen_ayuda_empresa'] = $_POST['imagen_ayuda_empresa'];
    $aboutUsData['titulo_crm'] = $_POST['titulo_crm'];
    foreach ($_POST['cards_crm'] as $index => $card) {
        $aboutUsData['cards_crm'][$index] = [
            'titulo' => $_POST['card_titulo'][$index],
            'descripcion' => $_POST['card_descripcion'][$index],
            'imagen' => $_POST['card_imagen'][$index]
        ];
    }
    $aboutUsData['titulo_cta'] = $_POST['titulo_cta'];
    $aboutUsData['descripcion_cta'] = $_POST['descripcion_cta'];
    $aboutUsData['link_cta'] = $_POST['link_cta'];
    $aboutUsData['texto_footer'] = $_POST['texto_footer'];

    // Guardar en el archivo JSON
    file_put_contents($jsonPath, json_encode($aboutUsData, JSON_PRETTY_PRINT));

    // Redirigir después de guardar los cambios
    header("Location: nosotros.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nosotros</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="nosotros_admin.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="../imgs/logo.png" width="50px"></a>
        </div>
        <nav class="top-nav">
            <ul>
                <li><a href="admin.php">Inicio</a></li>
                <li><a href="/management/dashboard">Salir</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Editar Sección "Nosotros"</h1>
        <form action="nosotros_admin.php" method="post">
            <fieldset>
                <legend>Sección Hero</legend>
                <label for="titulo_hero">Título:</label>
                <input type="text" id="titulo_hero" name="titulo_hero" value="<?php echo htmlspecialchars($aboutUsData['titulo_hero']); ?>"><br>
                <label for="descripcion_hero">Descripción:</label>
                <textarea id="descripcion_hero" name="descripcion_hero"><?php echo htmlspecialchars($aboutUsData['descripcion_hero']); ?></textarea><br>
                <label for="cta_hero">Texto del CTA:</label>
                <input type="text" id="cta_hero" name="cta_hero" value="<?php echo htmlspecialchars($aboutUsData['cta_hero']); ?>"><br>
            </fieldset>

            <fieldset>
                <legend>Quiénes Somos</legend>
                <label for="titulo_quienes_somos">Título:</label>
                <input type="text" id="titulo_quienes_somos" name="titulo_quienes_somos" value="<?php echo htmlspecialchars($aboutUsData['titulo_quienes_somos']); ?>"><br>
                <label for="descripcion_quienes_somos">Descripción:</label>
                <textarea id="descripcion_quienes_somos" name="descripcion_quienes_somos"><?php echo htmlspecialchars($aboutUsData['descripcion_quienes_somos']); ?></textarea><br>
                <label for="lista_quienes_somos">Lista:</label>
                <?php foreach ($aboutUsData['lista_quienes_somos'] as $item): ?>
                <input type="text" id="lista_quienes_somos" name="lista_quienes_somos[]" value="<?php echo htmlspecialchars($item); ?>"><br>
                <?php endforeach; ?>
                <label for="imagen_quienes_somos">Imagen:</label>
                <input type="text" id="imagen_quienes_somos" name="imagen_quienes_somos" value="<?php echo htmlspecialchars($aboutUsData['imagen_quienes_somos']); ?>"><br>
            </fieldset>

            <fieldset>
                <legend>Cómo Podemos Ayudar a tu Empresa</legend>
                <label for="titulo_ayuda_empresa">Título:</label>
                <input type="text" id="titulo_ayuda_empresa" name="titulo_ayuda_empresa" value="<?php echo htmlspecialchars($aboutUsData['titulo_ayuda_empresa']); ?>"><br>
                <label for="descripcion_ayuda_empresa">Descripción:</label>
                <textarea id="descripcion_ayuda_empresa" name="descripcion_ayuda_empresa"><?php echo htmlspecialchars($aboutUsData['descripcion_ayuda_empresa']); ?></textarea><br>
                <label for="lista_ayuda_empresa">Lista:</label>
                <?php foreach ($aboutUsData['lista_ayuda_empresa'] as $item): ?>
                <input type="text" id="lista_ayuda_empresa" name="lista_ayuda_empresa[]" value="<?php echo htmlspecialchars($item); ?>"><br>
                <?php endforeach; ?>
                <label for="imagen_ayuda_empresa">Imagen:</label>
                <input type="text" id="imagen_ayuda_empresa" name="imagen_ayuda_empresa" value="<?php echo htmlspecialchars($aboutUsData['imagen_ayuda_empresa']); ?>"><br>
            </fieldset>

            <fieldset>
                <legend>Soluciones CRM</legend>
                <label for="titulo_crm">Título:</label>
                <input type="text" id="titulo_crm" name="titulo_crm" value="<?php echo htmlspecialchars($aboutUsData['titulo_crm']); ?>"><br>
                <?php foreach ($aboutUsData['cards_crm'] as $index => $card): ?>
                <div class="card-edit">
                    <label for="card_titulo_<?php echo $index; ?>">Título de la Tarjeta:</label>
                    <input type="text" id="card_titulo_<?php echo $index; ?>" name="card_titulo[]" value="<?php echo htmlspecialchars($card['titulo']); ?>"><br>
                    <label for="card_descripcion_<?php echo $index; ?>">Descripción de la Tarjeta:</label>
                    <textarea id="card_descripcion_<?php echo $index; ?>" name="card_descripcion[]"><?php echo htmlspecialchars($card['descripcion']); ?></textarea><br>
                    <label for="card_imagen_<?php echo $index; ?>">Imagen de la Tarjeta:</label>
                    <input type="text" id="card_imagen_<?php echo $index; ?>" name="card_imagen[]" value="<?php echo htmlspecialchars($card['imagen']); ?>"><br>
                </div>
                <?php endforeach; ?>
            </fieldset>

            <fieldset>
                <legend>CTA</legend>
                <label for="titulo_cta">Título:</label>
                <input type="text" id="titulo_cta" name="titulo_cta" value="<?php echo htmlspecialchars($aboutUsData['titulo_cta']); ?>"><br>
                <label for="descripcion_cta">Descripción:</label>
                <textarea id="descripcion_cta" name="descripcion_cta"><?php echo htmlspecialchars($aboutUsData['descripcion_cta']); ?></textarea><br>
                <label for="link_cta">Link:</label>
                <input type="text" id="link_cta" name="link_cta" value="<?php echo htmlspecialchars($aboutUsData['link_cta']); ?>"><br>
            </fieldset>

            <fieldset>
                <legend>Footer</legend>
                <label for="texto_footer">Texto del Footer:</label>
                <input type="text" id="texto_footer" name="texto_footer" value="<?php echo htmlspecialchars($aboutUsData['texto_footer']); ?>"><br>
            </fieldset>

            <input type="submit" value="Guardar Cambios">
        </form>
    </main>
</body>
</html>
