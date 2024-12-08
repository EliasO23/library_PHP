<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <?php include './shared/navbar.php'; ?>

    <main>
        <section class="info-container">
            <h1 class="animated-title">Bienvenido a la Biblioteca</h1>
            <h3 class="animated-subtitle">Un lugar ideal para aprender, investigar y disfrutar de la lectura.</h3>
            <p>Ofreciendo acceso a una amplia variedad de libros y materiales de lectura, además de servicios como préstamo, devolución, búsqueda personalizada y espacios para el estudio.</p>
            <section class="center">
                <a class="btn" href="./home.php">Administrar Libros</a>
                <a class="btn" href="./buscarLibros.php?libros">Prestar Libro</a>
                <a class="btn" href="./regresarLibro.php">Regresar Libros</a>
            </section>
        </section>

        
        <section class="secction-services">
            <h2>Nuestros Servicios</h2>
        </section>

        <section class="services">
            <div class="service-card">
                <img src="https://www.comunidadbaratz.com/wp-content/uploads/Sabes-cuales-son-los-libros-mas-vendidos-de-2017-a-traves-de-Internet-en-Espana.jpg" alt="Catálogo Virtual">
                <h3>Catálogo Virtual</h3>
                <p>Explora una amplia colección de libros digitales, revistas y recursos académicos desde cualquier lugar.</p>
            </div>
            <div class="service-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ751PtOLRic7JO9XCYqQnS6tddPSjgaT82zw&s" alt="Préstamo de libros">
                <h3>Préstamo de libros</h3>
                <p>Accede a nuestro catálogo en linea y lleva tus libros favoritos a casa.</p>
            </div>
            <div class="service-card">
                <img src="https://archello.s3.eu-central-1.amazonaws.com/images/2019/10/10/CMU-Sorrells-11.1570671829.5734.jpg" alt="Espacios de lectura">
                <h3>Espacios de lectura</h3>
                <p>Ofrecemos ambientes tranquilos y cómodos para disfrutar de la lectura.</p>
            </div>
            <div class="service-card">
                <img src="https://www.tubiblioteca.com.uy/wp-content/uploads/2024/06/Visita-Marcos-y-sandra-2-1024x768.jpg" alt="Talleres Virtuales">
                <h3>Talleres Virtuales</h3>
                <p>Participa en talleres y eventos educativos en línea, diseñados para mejorar tus habilidades.</p>
            </div>
        </section>

        <section class="gallery">
            <h2>Galería</h2>
            <div class="gallery-grid">
                <img src="https://diarioelsalvador.com/wp-content/uploads/2023/11/photo_2023-11-15_09-15-49-2-1024x682.jpg" alt="Biblioteca Interior">
                <img src="https://biblioteca.uniandes.edu.co/sites/default/files/Noticias/sala-rubik-.-640.png" alt="Zona de Lectura">
                <img src="https://us.123rf.com/450wm/edmond77/edmond772001/edmond77200100013/136693108-mujer-elige-un-libro-en-la-biblioteca-y-estudia.jpg?ver=6" alt="Estantería de Libros">
                <img src="https://steelcase-res.cloudinary.com/image/upload/v1471867926/www.steelcase.com/eu-en/2016/08/22/D3593.jpg" alt="Zona de estudio">
            </div>
        </section>

    </main>

    <?php include './shared/footer.php'; ?>
    
</body>
</html>