<?php
require_once './classes/biblioteca.php';

session_start();

if (!isset($_SESSION['biblioteca'])) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];

if (isset($_POST['updateForm'])){

    $id = $_GET['edit'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];

    $actualizacion = $biblioteca->actualizarLibro($id, $titulo, $autor, $categoria);

    if ($actualizacion) {
        $mensaje = "El libro ha sido actualizado exitosamente.";
    } else {
        $mensaje = "No se pudo actualizar el libro.";
    }

    $_SESSION['biblioteca'] = $biblioteca;
    // header('Location: /FSJ24B/TareasSemanas/biblioteca/home.php');

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
            <h1>Actualizar Libro</h1>
        </section>

        <?php
            if (isset($_GET['edit'])) {

                $id = $_GET['edit'];
                $libro = $biblioteca->buscarLibro($id);
                // print_r($libro);    
        ?>

        <form class="form" method="POST" action="">
            <input type="hidden" name="updateForm" value="Formulario Actualizar Libro">
            
            <label>Titulo</label>
            <input type="text" name="titulo" value="<?php echo $libro->getTitulo() ?>">

            <label>Autor</label>
            <input type="text" name="autor" value="<?php echo $libro->getAutor() ?>">

            <label>Categoria</label>
            <input type="text" name="categoria" value="<?php echo $libro->getCategoria() ?>">
            
            <section class="center">
                <button class="btn" type="submit">Actualizar</button>
                <a class="btn" href="./home.php">Cancelar</a>
            </section>
        </form>

        <?php }?>

        <!-- Mostrar mensaje -->
        <?php if ($mensaje) {
            echo "
            <script>
                alert('$mensaje');
                window.location.href = 'home.php';
            </script>
            ";
        } ?>
    </main>
    
</body>
</html>