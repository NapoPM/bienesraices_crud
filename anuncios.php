<?php
require './includes/funciones.php';

incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Casas y Depas en Venta</h1>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture srcset="/build/img/anuncio1.webp" type="image/webp"></picture>
                <picture srcset="/build/img/anuncio1.jpeg" type="image/jpeg"></picture>
                <img src="build/img/anuncio1.jpg" loading="lazy" alt="">

                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, excelente precio.</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" loading="lazy" alt="">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" loading="lazy" alt="">
                            <p>4</p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" loading="lazy" alt="">
                            <p>2</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
            <div class="anuncio">
                <picture srcset="/build/img/anuncio1.webp" type="image/webp"></picture>
                <picture srcset="/build/img/anuncio1.jpeg" type="image/jpeg"></picture>
                <img src="build/img/anuncio1.jpg" loading="lazy" alt="">

                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, excelente precio.</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" loading="lazy" alt="">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" loading="lazy" alt="">
                            <p>4</p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" loading="lazy" alt="">
                            <p>2</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
            <div class="anuncio">
                <picture srcset="/build/img/anuncio1.webp" type="image/webp"></picture>
                <picture srcset="/build/img/anuncio1.jpeg" type="image/jpeg"></picture>
                <img src="build/img/anuncio1.jpg" loading="lazy" alt="">

                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, excelente precio.</p>
                    <p class="precio">$3,000,000</p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" loading="lazy" alt="">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" loading="lazy" alt="">
                            <p>4</p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" loading="lazy" alt="">
                            <p>2</p>
                        </li>
                    </ul>

                    <a href="anuncios.html" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
        </div>
        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton boton-verde">Ver Todas</a>
        </div>
    </main>

    <?php
    incluirTemplate('footer');
    ?>