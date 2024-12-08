<?php
require_once './classes/biblioteca.php';

session_start();

if (!isset($_SESSION['biblioteca']) ) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

if (!isset($_SESSION['last_id'])) {
    $_SESSION['last_id'] = 0;
}


$biblioteca = $_SESSION['biblioteca'];

// Agregar Libro
if (isset($_POST['createForm'])) {
    if (isset($_POST['titulo'], $_POST['autor'], $_POST['categoria'])) {
      
        $_SESSION['last_id']++;
        $id = $_SESSION['last_id'];

        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $categoria = $_POST['categoria'];

        $libro = new Libro($id, $titulo, $autor, $categoria);
        $biblioteca->agregarLibro($libro);

        $_SESSION['biblioteca'] = $biblioteca;
        header('Location: /FSJ24B/TareasSemanas/biblioteca/home.php');
    }
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
            <h1>Agregar Libro</h1>  
        </section>

        <form class="form" method="POST" action="">
            <input type="hidden" name="createForm" value="Formulario Agregar Libros">

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" placeholder="Ingrese el nombre del libro" required>

            <label for="autor">Autor:</label>
            <input type="text" name="autor" placeholder="Ingrese el autor del libro" required>

            <label for="categoria">Categoría:</label>
            <input type="text" name="categoria" placeholder="Ingrese la categoria del libro" required>

            <div class="center">
                <button class="btn" type="submit">Agregar</button>
                <a class="btn"href="./home.php">Cancelar</a>
            </div>
            
        </form>
    </main>

</body>
</html>

