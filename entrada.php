<?php
require './includes/funciones.php';

incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Titulo Página</h1>
        <section class="contenedor seccion contenido-centrado">
            <h1>Casa de Lujo en el Lago</h1>
            <picture>
                <source srcset="/build/img/destacada.webp" type="image/webp">
                <source srcset="/build/img/destacada.jpeg" type="image/jpeg">
                <img src="build/img/destacada.jpg" loading="lazy" alt="">
            </picture>
            <p class="informacion-meta">Escrito el <span>2/09/2024</span> por: <span>Admin</span></p>

            <div class="resumen-propiedad">
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est animi cumque eligendi explicabo deserunt ratione id reiciendis eos, quod veritatis nisi odit quae saepe nostrum inventore cupiditate corporis deleniti consequatur!
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est animi cumque eligendi explicabo deserunt ratione id reiciendis eos, quod veritatis nisi odit quae saepe nostrum inventore cupiditate corporis deleniti consequatur!
                </p>
            </div>
        </section>
    </main>

    <?php
    incluirTemplate('footer');
    ?>