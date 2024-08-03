<?php
class Ciudad{
    private $nombre;
    private $codigoPostal;

    public function __construct($nombre, $codigoPostal)
    {
        $this->nombre = $nombre;
        $this->codigoPostal = $codigoPostal;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setCodigoPostal(string $codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;
    }
}
