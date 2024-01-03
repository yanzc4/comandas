<?php
// crear la clase Plato

class Plato
{
    //atributos
    private $id;
    private $nombre;
    private $precio;
    private $categoria;
    private $estado;

    //constructor
    public function __construct($id, $nombre, $precio, $categoria, $estado)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->estado = $estado;
    }

    //metodos
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function __toString()
    {
        return "id: " . $this->id . " nombre: " . $this->nombre . " precio: " . $this->precio . " categoria: " . $this->categoria . " estado: " . $this->estado;
    }
}