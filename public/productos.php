<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM - Home</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="productos.css">
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
            </ul>
        </nav>
    </header>

    <section class="pricing-plans">
        <div class="container">
            <h2>Conoce Nuestros Planes</h2>
            <div class="cards">
                <div class="card">
                    <h3>Prueba Gratis</h3>
                    <p class="price"><span class="old-price">$10.00</span> <span class="new-price">Gratis</span></p>
                    <ul>
                        <li>Acceso limitado a características</li>
                        <li>Soporte por 7 días</li>
                        <li>1 GB de almacenamiento</li>
                        <li class="not-included">Acceso a estadísticas avanzadas</li>
                        <li class="not-included">Personalización de perfil</li>
                        <li class="not-included">Soporte telefónico</li>
                        <li class="not-included">Integración con herramientas externas</li>
                        <li class="not-included">Actualizaciones automáticas</li>
                        <li class="not-included">Acceso a contenido exclusivo</li>
                        <li class="not-included">Sin anuncios</li>
                        <li class="not-included">Acceso a la comunidad premium</li>
                        <li class="not-included">Descuentos en eventos</li>
                        <li class="not-included">Consultoría personalizada</li>
                    </ul>
                    <form action="pasareladepago.php">
                        <button class="buy-button">Prueba Ahora</button>
                    </form>
                </div>
                <div class="card">
                    <h3>Plan Premium</h3>
                    <p class="price"><span class="old-price">$50.00</span> <span class="new-price">$30.00</span></p>
                    <ul>
                        <li>Acceso a todas las características</li>
                        <li>Soporte prioritario 24/7</li>
                        <li>100 GB de almacenamiento</li>
                        <li>Acceso a estadísticas avanzadas</li>
                        <li>Personalización de perfil</li>
                        <li>Soporte telefónico</li>
                        <li>Integración con herramientas externas</li>
                        <li>Actualizaciones automáticas</li>
                        <li>Acceso a contenido exclusivo</li>
                        <li>Sin anuncios</li>
                        <li>Acceso a la comunidad premium</li>
                        <li>Descuentos en eventos</li>
                        <li>Consultoría personalizada</li>
                    </ul>
                    <form action="pasareladepago.php">
                     <button class="buy-button">Comprar Ahora</button>
                    </form>
                </div>
                <div class="card">
                    <h3>Plan Estándar</h3>
                    <p class="price"><span class="old-price">$30.00</span> <span class="new-price">$20.00</span></p>
                    <ul>
                        <li>Acceso a la mayoría de características</li>
                        <li>Soporte 24/7</li>
                        <li>50 GB de almacenamiento</li>
                        <li>Acceso a estadísticas avanzadas</li>
                        <li>Personalización de perfil</li>
                        <li>Soporte telefónico</li>
                        <li class="not-included">Integración con herramientas externas</li>
                        <li class="not-included">Actualizaciones automáticas</li>
                        <li class="not-included">Acceso a contenido exclusivo</li>
                        <li>Sin anuncios</li>
                        <li>Acceso a la comunidad premium</li>
                        <li>Descuentos en eventos</li>
                        <li>Consultoría personalizada</li>
                    </ul>
                    <form action="pasareladepago.php">
                        <button class="buy-button">Comprar Ahora</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="footer">
            <p>2024 Carlos y Juan. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
