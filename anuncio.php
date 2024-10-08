<?php
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /');
}

// Importar la conexión
require __DIR__ . '/includes/config/database.php';
$db = conectarDB();
// Consultar
$query = "SELECT * FROM propiedades WHERE id = {$id}";

$resultado = mysqli_query($db, $query);

if ($resultado->num_rows = 0) {
    header('Location: /');
}

$propiedad = mysqli_fetch_assoc($resultado);

require './includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad['titulo']; ?></h1>
    <img src="/imagenes/<?php echo $propiedad['imagen'];?>" loading="lazy" alt="">


    <div class="resumen-propiedad">
        <p class="precio"><?php echo $propiedad['precio'] ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img src="build/img/icono_wc.svg" loading="lazy" alt="">
                <p><?php echo $propiedad['wc']?></p>
            </li>
            <li>
                <img src="build/img/icono_dormitorio.svg" loading="lazy" alt="">
                <p><?php echo $propiedad['habitaciones']?></p>
            </li>
            <li>
                <img src="build/img/icono_estacionamiento.svg" loading="lazy" alt="">
                <p><?php echo $propiedad['estacionamiento'] ?></p>
            </li>
        </ul>
        <p><?php echo $propiedad['descripcion'] ?></p>
    </div>
</main>

<?php
incluirTemplate('footer');
mysqli_close($db);
?>