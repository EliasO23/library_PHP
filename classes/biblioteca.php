<?php
require_once 'libros.php';
require_once 'librosPrestados.php';

class Biblioteca
{
    private $libros = [];
    private $librosPrestados = [];

    public function agregarLibro($libro)
    {
        $this->libros[] = $libro;
    }

    public function getLibros()
    {
        return $this->libros;
    }

    public function buscarLibro($id)
    {
        foreach ($this->libros as $libro) {
            if ($libro->getIdLibro() == $id) {
                return $libro;
            }
        }
        return null;
    }

    public function actualizarLibro($id, $titulo, $autor, $categoria)
    {
        foreach ($this->libros as $libro) {
            if ($libro->getIdLibro() == $id) {
                $libro->setTitulo($titulo);
                $libro->setAutor($autor);
                $libro->setCategoria($categoria);
                return true;
            }
        }
        return false;
    }

    public function eliminarLibro($id)
    {
        foreach ($this->libros as $key => $libro) {
            if ($libro->getIdLibro() == $id) {
                unset($this->libros[$key]);
                break;
            }
        }
    }

    public function buscarLibros($valor, $criterio)
    {
        $libros = [];
        foreach ($this->libros as $libro) {
            if ($criterio == 'titulo') {
                if ($libro->getTitulo() == $valor) {
                    $libros[] = $libro;
                }
            } elseif ($criterio == 'autor') {
                if ($libro->getAutor() == $valor) {
                    $libros[] = $libro;
                }
            } elseif ($criterio == 'categoria') {
                if ($libro->getCategoria() == $valor) {
                    $libros[] = $libro;
                }
            }
        }
        return $libros;
    }

    public function prestarLibro($id, $fechaPrestamo, $fechaDevolucion, $estudiante) {
        $libro = $this->buscarLibro($id);
        if ($libro) {
            $libroPrestado = LibrosPrestados::prestarLibro($libro, $fechaPrestamo, $fechaDevolucion, $estudiante);
            if ($libroPrestado) {
                $this->librosPrestados[] = $libroPrestado;
                return true;
            }
        }
        return false; 
    }

    public function devolverLibro($id) {
        $libro = $this->buscarLibro($id);
        
        if ($libro) {
            $this->librosPrestados = LibrosPrestados::devolverLibro($libro, $this->librosPrestados, $id); 
            return true;
        }
        return false; 
    }

    public function getLibrosPrestados(){
        return $this->librosPrestados;
    }
}
