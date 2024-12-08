<?php

require_once 'libros.php';

class LibrosPrestados extends Libro {
    private $fechaPrestamo;
    private $fechaDevolucion;
    private $estudiante; 

    // Constructor
    public function __construct($idLibro, $titulo, $autor, $categoria, $fechaPrestamo, $fechaDevolucion, $estudiante) {
        parent::__construct($idLibro, $titulo, $autor, $categoria, false);
        $this->fechaPrestamo = $fechaPrestamo;
        $this->fechaDevolucion = $fechaDevolucion;
        $this->estudiante = $estudiante;
    }

    // Getters
    public function getFechaPrestamo() {
        return $this->fechaPrestamo;
    }

    public function getFechaDevolucion() {
        return $this->fechaDevolucion;
    }

    public function getEstudiante() {
        return $this->estudiante;
    }

    // Setters
    public function setFechaPrestamo($fechaPrestamo) {
        $this->fechaPrestamo = $fechaPrestamo;
    }

    public function setFechaDevolucion($fechaDevolucion) {
        $this->fechaDevolucion = $fechaDevolucion;
    }

    public function setEstudiante($estudiante) {
        $this->estudiante = $estudiante;
    }
}
?>
