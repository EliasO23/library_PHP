<?php
require_once './classes/biblioteca.php';

session_start();

if (!isset($_SESSION['biblioteca'] )) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];

// Limpiar la lista de resultados de búsqueda al cargar la página
if (isset($_GET['libros'])){
    unset($_SESSION['resultados_busqueda']);
}

$libros = [];

if (isset($_POST['search'])) {
    $valor = trim($_POST['valor']);
    $criterio = $_POST['criterio'];

    $libros = $biblioteca->buscarLibros($valor, $criterio);
    
    if ($libros) {
        $_SESSION['mensaje'] = "Resultados de busqueda";
    } else {
        $_SESSION['mensaje'] = "Libro no encontrado. Intente nuevamente";
    }


    $_SESSION['resultados_busqueda'] = $libros;

}elseif(isset($_SESSION['resultados_busqueda'])){
    $libros = $_SESSION['resultados_busqueda'];
}

// Obtener mensaje de la sesión, si existe
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : null;
unset($_SESSION['mensaje']); // Limpiar el mensaje después de mostrarlo

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <?php include './shared/navbar.php'; ?>
    
    <main class="margin">

        <section class="inicio">
            <h1>Prestar Libros</h1>
            <p>Ingresa el nombre de un libro, autor o categoria, luego selecciona el criterio correspondiente</p>
            
            <form class="form_search" method="POST">
                <input type="hidden" name="search">

                <input type="text" name="valor">
                <select name="criterio">
                    <option value="titulo">Titulo</option>
                    <option value="autor">Autor</option>
                    <option value="categoria">Categoria</option>
                </select>
                <button class="btn" type="submit">Buscar</button>
            </form>

        </section>

        <section class="center_col">
            
            <?php if ($mensaje) : ?>
                <p class="message"><?= $mensaje; ?></p>
            <?php endif; ?>
            
            <?php if ($libros != null): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($libros as $libro): ?>
                            <tr>
                                <td><?= $libro->getIdLibro(); ?></td>
                                <td><?= $libro->getTitulo(); ?></td>
                                <td><?= $libro->getAutor(); ?></td>
                                <td><?= $libro->getCategoria(); ?></td>
                                <td>
                                    <?php if($libro->isDisponible()) {?>
                                        <a class="btn" href="./prestarLibro.php?id=<?= $libro->getIdLibro(); ?>">Prestar</a>
                                    <?php } else {?>
                                        <span>Prestado</span>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </section>

        <section class="final">
            <a class="btn" href="./index.php">Regresar</a>
        </section>
        
    </main>
</body>

</html>