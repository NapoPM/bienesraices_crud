<?php
require '../../includes/funciones.php';
require '../../includes/config/database.php';
$db = conectarDB();

// OBTENER vendedores

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);
// if (!$resultado || mysqli_num_rows($resultado) == 0) {
//     echo "No se encontraron vendedores.";
//     exit;
// }
// Arreglo con mensajes de errores
$errores = [];

$titulo = '';
$precio = '';
$imagen = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedor_id = '';

// Ejecuta el código después de enviar el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    // $imagen = mysqli_real_escape_string($db, $_POST['imagen']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedor_id = isset($_POST['vendedor_id']) ? $_POST['vendedor_id'] : null;
    $creado = date('Y/m/d');

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];
    // Validaciones
    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }
    if (!$imagen['name'] || $imagen['error']) {
        $errores[] = "Debes añadir una imagen";
    }
    if (strlen($descripcion) < 50) {  // Corregido el paréntesis en la validación de descripción
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

    // Validar por tamaño 2MB máximo.
    $medida = 2000 * 1000;
    if ($imagen['size'] > $medida) {
        echo "La imagen es muy pesada";
    }

    // Revisar que el array de errores esté vacío
    if (empty($errores)) {

        /* Subida de archivos */
        // Crear Carpeta
        // Crear Carpeta de imágenes si no existe
        $carpetaImagenes = '../../imagenes';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes, 0755, true); // Carpeta con permisos seguros
        }

        // Validar tamaño del archivo (máximo 2MB)
        $tamañoMaximo = 2 * 1024 * 1024; // 2 MB
        if ($imagen['size'] > $tamañoMaximo) {
            echo "El archivo es demasiado grande.";
            exit;
        }

        // Validar tipo MIME del archivo
        $tipoArchivo = mime_content_type($imagen['tmp_name']);
        $extensionesPermitidas = ['image/jpeg', 'image/png', 'image/gif'];

        if (!in_array($tipoArchivo, $extensionesPermitidas)) {
            echo "Formato de archivo no permitido.";
            exit;
        }

        // Generar un nombre de archivo único
        $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
        $nombreArchivo = uniqid() . '.' . $extension;

        // Mover el archivo subido a la carpeta segura
        if (move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreArchivo)) {
            echo "Subido correctamente";
        } else {
            echo "Hubo un error al subir el archivo.";
        }


        // exit;

        // INSERTAR DATOS
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreArchivo', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedor_id')";

        $resultado = mysqli_query($db, $query);
        if (!$resultado) {
            echo "No se pudo insertar";
        } else {
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Título Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min="1" value="<?php echo $habitaciones ?>">

            <label for="baños">Baños:</label>
            <input type="number" name="wc" id="baños" placeholder="Ej: 2" min="1" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 4" min="1" value="<?php echo $estacionamiento ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor_id">
                <option value="" selected disabled>--Seleccionar Vendedor--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedor_id === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>">
                        <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>


        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>