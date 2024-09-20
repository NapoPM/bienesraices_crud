<?php
require './includes/funciones.php';

incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpeg" type="image/jpeg">
                    <img src="build/img/blog1.jpg" alt="" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu Casa</h4>
                    <p>Escrito el: <span>29/08/2024</span> por: <span>ADMIN</span></p>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa.
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpeg" type="image/jpeg">
                    <img src="build/img/blog2.jpg" alt="" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu Casa</h4>
                    <p>Escrito el: <span>29/08/2024</span> por: <span>ADMIN</span></p>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa.
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpeg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu Casa</h4>
                    <p>Escrito el: <span>29/08/2024</span> por: <span>ADMIN</span></p>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa.
                    </p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpeg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="" loading="lazy">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu Casa</h4>
                    <p>Escrito el: <span>29/08/2024</span> por: <span>ADMIN</span></p>

                    <p>
                        Consejos para construir una terraza en el techo de tu casa.
                    </p>
                </a>
            </div>
        </article>
    </main>

    <?php
    incluirTemplate('footer');
    ?>