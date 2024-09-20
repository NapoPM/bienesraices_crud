<?php
require './includes/funciones.php';

incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpeg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobre Nosotros" loading="lazy">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia.
                </blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ipsum repudiandae animi deserunt commodi nisi incidunt sit? Et temporibus totam quidem. Incidunt tempore quaerat debitis nihil deserunt voluptas rerum cupiditate!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ipsum repudiandae animi deserunt commodi nisi incidunt sit? Et temporibus totam quidem. Incidunt tempore quaerat debitis nihil deserunt voluptas rerum cupiditate!</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="src/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error culpa corporis tenetur sequi saepe quasi tempora, dolore nemo impedit est repellat corrupti, accusamus mollitia voluptatum veritatis natus reprehenderit porro eligendi?</p>
            </div>
            <div class="icono">
                <img src="src/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error culpa corporis tenetur sequi saepe quasi tempora, dolore nemo impedit est repellat corrupti, accusamus mollitia voluptatum veritatis natus reprehenderit porro eligendi?</p>
            </div>
            <div class="icono">
                <img src="src/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error culpa corporis tenetur sequi saepe quasi tempora, dolore nemo impedit est repellat corrupti, accusamus mollitia voluptatum veritatis natus reprehenderit porro eligendi?</p>
            </div>
        </div>f
    </section>
    <?php
    incluirTemplate('footer');
?>