<?php
require_once './classes/biblioteca.php';

session_start();

if (!isset($_SESSION['biblioteca'] )) {
    $_SESSION['biblioteca'] = new Biblioteca();
}

$biblioteca = $_SESSION['biblioteca'];

if (isset($_POST['registrarPrestamo'])){
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $fechaPrestamo = date("Y-m-d");
        $fechaDevolucion = $_POST['fechaDevolucion'];
        $estuduante = $_POST['codigoEstudiante'];

        $prestamo = $biblioteca->prestarLibro($id, $fechaPrestamo, $fechaDevolucion, $estuduante);

        if ($prestamo) {
            $_SESSION['mensaje'] = "El libro ha sido prestado exitosamente.";
        } else {
            $_SESSION['mensaje'] = "No se pudo prestar el libro. Es posible que ya esté prestado.";
        }

        $_SESSION['biblioteca'] = $biblioteca;
        // header('Location: /FSJ24B/TareasSemanas/biblioteca/prestarLibro.php');
        
    }
}

// Obtener mensaje de la sesión, si existe
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : null;
unset($_SESSION['mensaje']);

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
            <h1>Prestamo de Libros</h1>
        </section>
         
        <form class="form" method="POST">

            <input type="hidden" name="registrarPrestamo" value="Formulario Registrar Prestamo Libros">

            <!-- <label for="fechaPrestamo">Fecha de Préstamo:</label>
            <input type="date" name="fechaPrestamo" required> -->

            <label for="fechaDevolucion">Fecha de Devolución:</label>
            <input type="date" name="fechaDevolucion" required>

            <label for="codigoEstudiante">Código del Estudiante:</label>
            <input type="text"  name="codigoEstudiante" placeholder="Ingrese el código del estudiante" required>

            <section class="center">
                <button class="btn" type="submit">Prestar</button>
                <a class="btn"href="./buscarLibros.php">Cancelar</a>
            </section>
        </form>

        <!-- Mostrar mensaje -->
        <?php if ($mensaje) {
            echo "
            <script>
                alert('$mensaje');
                window.location.href = 'buscarLibros.php';
            </script>
            ";
        } ?>
    </main>
</body>
</html>