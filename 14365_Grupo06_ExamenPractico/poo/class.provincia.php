<?php
class Provincia{
    public $nombre;
    public  $numCiudades;
    public  $ObjCiudad;

    public function __construct( $nombre,  $numCiudades,  $ObjCiudad)
    {
        $this->nombre = $nombre;
        $this->numCiudades = $numCiudades;
        $this->ObjCiudad = $ObjCiudad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNumCiudades()
    {
        return $this->numCiudades;
    }

    public function getObjCiudad()
    {
        return $this->ObjCiudad;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setNumCiudades(int $numCiudades)
    {
        $this->numCiudades = $numCiudades;
    }

    public function setObjCiudad(Ciudad $ObjCiudad)
    {
        $this->ObjCiudad = $ObjCiudad;
    }

    
}
