<?php
require './includes/funciones.php';

incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa de Lujo en el Lago</h1>
        <picture>
            <source srcset="/build/img/destacada.webp" type="image/webp">
            <source srcset="/build/img/destacada.jpeg" type="image/jpeg">
            <img src="build/img/destacada.jpg" loading="lazy" alt="">
        </picture>

        <div class="resumen-propiedad">
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
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est animi cumque eligendi explicabo deserunt ratione id reiciendis eos, quod veritatis nisi odit quae saepe nostrum inventore cupiditate corporis deleniti consequatur!
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est animi cumque eligendi explicabo deserunt ratione id reiciendis eos, quod veritatis nisi odit quae saepe nostrum inventore cupiditate corporis deleniti consequatur!
            </p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
    ?>