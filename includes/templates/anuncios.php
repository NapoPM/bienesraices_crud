<?php
// Importar la conexión
require __DIR__ . '/../config/database.php';
$db = conectarDB();
// Consultar
$query = "SELECT * FROM propiedades LIMIT {$limite}";
$resultado = mysqli_query($db, $query);
?>
 
<div class="contenedor-anuncios">
    <?php
        while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
    <div class="anuncio">
        <img src="/imagenes/<?php echo $propiedad['imagen'];  ?>" loading="lazy" alt="">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo'];?></h3>
            <p><?php echo $propiedad['descripcion'];?></p>
            <p class="precio"><?php echo $propiedad['precio'];?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" loading="lazy" alt="">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" loading="lazy" alt="">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" loading="lazy" alt="">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php

mysqli_close($db);

?>