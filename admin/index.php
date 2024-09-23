<?php
// Importar la conexión
require '../includes/config/database.php';
$db = conectarDB();
// Escribir Query
$consulta = "SELECT * FROM propiedades";
// Consultar la BD
$resultadopropiedades = mysqli_query($db, $consulta);

$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // Eliminar el archivo
        $query = "SELECT imagen FROM propiedades WHERE id = {$id}";

        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $propiedad['imagen'] . '.jpg');

        $query = "DELETE FROM propiedades WHERE id = {$id}";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /admin?resultado=3');
        }
    }
}

require '../includes/funciones.php';

incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador Bienes Raices</h1>
        <?php if ($resultado == 1) : ?>
            <p class="alerta exito">Propiedad creada correctamente</p>
        <?php elseif ($resultado == 2) : ?>
            <p class="alerta exito">Propiedad actualizada correctamente</p>
        <?php elseif ($resultado == 3) : ?>
            <p class="alerta error">Propiedad eliminada correctamente</p>
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
                        <form action="" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
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