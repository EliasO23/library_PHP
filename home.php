<?php
require_once './classes/biblioteca.php';

session_start();

if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];
$libros = $biblioteca->getLibros();

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $biblioteca->eliminarLibro($id);

    $_SESSION['biblioteca'] = $biblioteca;
    header('Location: /FSJ24B/TareasSemanas/biblioteca/home.php');
}
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
    <!-- <form method="POST">
        <button class="btn" type="submit" name="generar_libros">Generar Libros</button>
    </form> -->

    <main class="margin">
        <section class="inicio">
            <h1>Lista de Libros</h1>
            <a class="btn" href="agregarLibro.php">Agregar Libro</a>
        </section>

        <section class="table center">
            <?php if ($libros) { ?>
                
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoría</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($libros as $libro): ?>
                                <tr>
                                    <td><?= $libro->getIdLibro(); ?></td>
                                    <td><?= $libro->getTitulo(); ?></td>
                                    <td><?= $libro->getAutor(); ?></td>
                                    <td><?= $libro->getCategoria(); ?></td>
                                    <td><?= $libro->isDisponible() ? "Disponible" : "No disponible"; ?></td>
                                    <td>
                                        <a class="btn-edit" href="editarLibro.php?edit=<?= $libro->getIdLibro(); ?>">Editar</a>
                                        <a class="btn-delete" href="?delete=<?= $libro->getIdLibro(); ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                
            <?php }else{ ?>
                <p class="message">No se encontraron libros</p>
            <?php } ?>
        </section>

        <section class="final">
            <a class="btn" href="./index.php">Regresar</a>
        </section>

    </main>
    
</body>
</html>


