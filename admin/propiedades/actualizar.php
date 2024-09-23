<?php
// Validar ID valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
    exit;
}

require '../../includes/funciones.php';
require '../../includes/config/database.php';
$db = conectarDB();

// Obtener datos de la propiedad
$consultaPropiedad = "SELECT * FROM propiedades WHERE id = {$id}";
$resultadoPropiedad = mysqli_query($db, $consultaPropiedad);
$propiedad = mysqli_fetch_assoc($resultadoPropiedad);

// OBTENER vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$imagenPropiedad = $propiedad['imagen'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedor_id = $propiedad['vendedores_id'];

// Ejecuta el código después de enviar el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedor_id = isset($_POST['vendedor_id']) ? $_POST['vendedor_id'] : null;

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    // Validaciones
    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir el número de habitaciones";
    }
    if (!$wc) {
        $errores[] = "Debes añadir el número de baños";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes añadir el número de estacionamientos";
    }
    if (!$vendedor_id) {
        $errores[] = "Debes seleccionar un vendedor";
    }

    if ($imagen['name']) {
        // Validar tamaño del archivo (máximo 2MB)
        $tamañoMaximo = 2 * 1024 * 1024; // 2 MB
        if ($imagen['size'] > $tamañoMaximo) {
            $errores[] = "El archivo es demasiado grande.";
        }

        // Validar tipo MIME del archivo
        $tipoArchivo = mime_content_type($imagen['tmp_name']);
        $extensionesPermitidas = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($tipoArchivo, $extensionesPermitidas)) {
            $errores[] = "Formato de archivo no permitido.";
        }
    }

    // Revisar que el array de errores esté vacío
    if (empty($errores)) {
        $imagenDB = $propiedad['imagen']; // Mantener la imagen existente por defecto

        if ($imagen['name']) {
            // Crear Carpeta de imágenes si no existe
            $carpetaImagenes = '../../imagenes';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes, 0755, true);
            }

            // Eliminar la imagen previa si existe
            if ($propiedad['imagen']) {
                unlink($carpetaImagenes . '/' . $propiedad['imagen']);
            }

            // Generar un nombre de archivo único
            $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
            $nombreArchivo = uniqid() . '.' . $extension;

            // Mover el archivo subido a la carpeta segura
            if (move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreArchivo)) {
                $imagenDB = $nombreArchivo;
            } else {
                $errores[] = "Hubo un error al subir el archivo.";
            }
        }

        if (empty($errores)) {
            // INSERTAR DATOS
            $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = '{$precio}', imagen = '{$imagenDB}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedor_id} WHERE id = {$id}";

            $resultado = mysqli_query($db, $query);
            if (!$resultado) {
                $errores[] = "No se pudo actualizar la propiedad.";
            } else {
                // Redireccionar al usuario
                header('Location: /admin?resultado=2');
                exit;
            }
        }
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Título Propiedad" value="<?php echo htmlspecialchars($titulo); ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo htmlspecialchars($precio); ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png, image/gif">

            <img src="/imagenes/<?php echo htmlspecialchars($imagenPropiedad); ?>" alt="Imagen de la propiedad" class="imagen-small">
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?php echo htmlspecialchars($descripcion); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" value="<?php echo htmlspecialchars($habitaciones); ?>">

            <label for="baños">Baños:</label>
            <input type="number" name="wc" id="baños" placeholder="Ej: 2" min="1" value="<?php echo htmlspecialchars($wc); ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 4" min="1" value="<?php echo htmlspecialchars($estacionamiento); ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor_id">
                <option value="" selected disabled>--Seleccionar Vendedor--</option>
                <?php 
                // Reiniciar el puntero del resultado de vendedores
                mysqli_data_seek($resultado, 0);
                while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo ($vendedor_id == $vendedor['id']) ? 'selected' : '' ?> value="<?php echo htmlspecialchars($vendedor['id']); ?>">
                        <?php echo htmlspecialchars($vendedor['nombre'] . " " . $vendedor['apellido']); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>
