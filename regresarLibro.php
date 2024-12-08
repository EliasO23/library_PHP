<?php
require_once './classes/biblioteca.php';

session_start();

if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];
$libros = $biblioteca->getLibrosPrestados();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $regresar = $biblioteca->devolverLibro($id);

    $_SESSION['biblioteca'] = $biblioteca;
    header('Location: /FSJ24B/TareasSemanas/biblioteca/regresarLibro.php');
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
    
    <main class="margin">
        <section class="inicio">
            <h1>Libros Prestados</h1>
            <p>Lista de libros prestados por los estudiantes</p>
        </section>

        <section class="center">
            <?php if ($libros) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoría</th>
                            <th>Fecha Prestamo</th>
                            <th>Fecha Devolucion</th>
                            <th>Estudiante</th>
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
                                <td><?= $libro->getFechaPrestamo(); ?></td>
                                <td><?= $libro->getFechaDevolucion(); ?></td>
                                <td><?= $libro->getEstudiante(); ?></td>
                                <td>
                                    <a class="btn" href="?id=<?= $libro->getIdLibro(); ?>">Regresado</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php }else{ ?>
                <p>No hay libros prestados</p>
            <?php } ?>
        </section>

        <section class="final">
            <a class="btn"href="./index.php">Regresar</a>
        </section>
    </main>

</body>

</html>