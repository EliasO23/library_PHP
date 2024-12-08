<?php

class Libro{
    private $idLibro;
    private $titulo;
    private $autor;
    private $categoria;
    private $disponible;

    public function __construct($idLibro, $titulo, $autor, $categoria, $disponible = true) {
        $this->idLibro = $idLibro;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->disponible = $disponible;
    }

    // Getters
    public function getIdLibro() {
        return $this->idLibro;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function isDisponible() {
        return $this->disponible;
    }


    // Setters
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setDisponible($disponible) {
        $this->disponible = $disponible;
    }
}
?>