<?php

class Pais{
    public $nombre;
    public  $platoTipico;
    public  $moneda;
    public  $bandera;

    public function __construct( $nombre,  $platoTipico,  $moneda,  $bandera)
    {
        $this->nombre = $nombre;
        $this->platoTipico = $platoTipico;
        $this->moneda = $moneda;
        $this->bandera = $bandera;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPlatoTipico()
    {
        return $this->platoTipico;
    }

    public function getMoneda() 
    {
        return $this->moneda;
    }

    public function getBandera()
    {
        return $this->bandera;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setPlatoTipico(string $platoTipico) 
    {
        $this->platoTipico = $platoTipico;
    }

    public function setMoneda(string $moneda) 
    {
        $this->moneda = $moneda;
    }

    public function setBandera(string $bandera) 
    {
        $this->bandera = $bandera;
    }

}