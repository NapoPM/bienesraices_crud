<?php
// Importar la conexión
require '../includes/config/database.php';
$db = conectarDB();
// Escribir Query
$consulta = "SELECT * FROM propiedades";
// Consultar la BD
$resultadopropiedades = mysqli_query($db, $consulta);

$resultado = $_GET['resultado'] ?? null;

require '../includes/funciones.php';

incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador Bienes Raices</h1>
        <?php if ($resultado == 1) : ?>
            <p class="alerta exito">Propiedad creada correctamente</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($propiedad = mysqli_fetch_assoc($resultadopropiedades)): ?>
                <tr>
                    <td><?php echo $propiedad['id'];  ?></td>
                    <td><?php echo $propiedad['titulo'];  ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'];  ?>" alt="" srcset="" class="imagen-tabla"></td>
                    <td> $ <?php echo $propiedad['precio'];  ?></td>
                    <td>
                        <a href="/admin/propiedades/borrar.php" class="boton-rojo-block">Eliminar</a>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];  ?>" class="boton-amarillo-block">Editar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </main>

    <?php

    // Cerrar Conexion
    mysqli_close($db);
    incluirTemplate('footer');
    ?>