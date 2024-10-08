<?php
$inicio = true;
require 'includes/funciones.php';
incluirTemplate('header', true);
?>


    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error culpa corporis tenetur sequi saepe quasi tempora, dolore nemo impedit est repellat corrupti, accusamus mollitia voluptatum veritatis natus reprehenderit porro eligendi?</p>
            </div>
            <div class="icono">
                <img src="/build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error culpa corporis tenetur sequi saepe quasi tempora, dolore nemo impedit est repellat corrupti, accusamus mollitia voluptatum veritatis natus reprehenderit porro eligendi?</p>
            </div>
            <div class="icono">
                <img src="/build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error culpa corporis tenetur sequi saepe quasi tempora, dolore nemo impedit est repellat corrupti, accusamus mollitia voluptatum veritatis natus reprehenderit porro eligendi?</p>
            </div>
        </div>
    </main>


    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>


        <?php
            $limite = 3;
            include './includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton boton-verde" >Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y asesor se pondrá en contacto contigo a la brevedad.</p>
        <a href="anuncios.html" class="boton-amarillo">
            Contactános
        </a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
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
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención.
                </blockquote>
                <p>-Napo Piovano</p>
            </div>
        </section>
    </div>

<?php
    $inicio = true;
    incluirTemplate('footer');
?>